<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eviction;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;

class EvictionController extends Controller
{
    /**
     * Página pública de votação
     */
    public function index()
    {
        // Jogadores em votação (distintos)
        $evictions = Eviction::with('player')
            ->select('player_id')
            ->selectRaw('SUM(CASE WHEN user_id != ? THEN 1 ELSE 0 END) as votes_count', [Auth::id()]) // ou checar admin
            ->groupBy('player_id')
            ->get();

        // Verifica se o utilizador autenticado já votou
        $votedPlayerId = null;
        if (Auth::check() && !Auth::user()->is_admin) {
            $vote = Eviction::where('user_id', Auth::id())->first();
            $votedPlayerId = $vote?->player_id;
        }

        return view('eviction.index', compact('evictions', 'votedPlayerId'));
    }

    /**
     * Painel admin - gerir eviction
     */
    public function adminIndex()
    {
        $evictions = Eviction::with('player')
            ->select('player_id')
            ->selectRaw('COUNT(*) as votes_count')
            ->groupBy('player_id')
            ->get();

        $availablePlayers = Player::whereNotIn('id', $evictions->pluck('player_id'))->get();

        return view('admin.evictions.gerenciar', compact('evictions', 'availablePlayers'));
    }

    /**
     * Adicionar jogador à votação (admin)
     */
    public function store(Request $request)
    {
        $request->validate(['player_id' => 'required|exists:players,id']);

        $emVotacao = Eviction::distinct('player_id')->count('player_id');

        if ($emVotacao >= 4) {
            return back()->with('error', 'Máximo de 4 jogadores atingido.');
        }

        if (Eviction::where('player_id', $request->player_id)->exists()) {
            return back()->with('error', 'Este jogador já está em votação.');
        }

        // Adiciona o jogador sem voto (admin não vota)
        // Usamos user_id do admin apenas para registar quem adicionou
        Eviction::create([
            'player_id' => $request->player_id,
            'user_id'   => Auth::id(),
        ]);

        return back()->with('success', 'Jogador adicionado à votação.');
    }

    /**
     * Votar num jogador (utilizador)
     */
    public function vote(Request $request, string $playerId)
    {
        if (Eviction::where('user_id', Auth::id())->exists()) {
            return back()->with('error', 'Já votaste nesta ronda.');
        }

        if (!Eviction::where('player_id', $playerId)->exists()) {
            return back()->with('error', 'Jogador não está em votação.');
        }

        Eviction::create([
            'player_id' => $playerId,
            'user_id'   => Auth::id(),
        ]);

        return back()->with('success', 'Voto registado com sucesso!');
    }

    /**
     * Remover jogador da votação (admin)
     */
    public function removePlayer(string $playerId)
    {
        Eviction::where('player_id', $playerId)->delete();
        return back()->with('success', 'Jogador removido da votação.');
    }

    /**
     * Resetar toda a votação (admin)
     */
    public function reset()
    {
        Eviction::truncate();
        return back()->with('success', 'Votação resetada com sucesso.');
    }
}
