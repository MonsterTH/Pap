<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class ProfileController extends Controller
{
    public function index(Request $request): View
    {
        return view('profile.index', [
            'user' => $request->user(),
            'posts' => Post::where('user_id', $request->user()->id)->paginate(20),
        ]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validated();

        // 🗑️ Remover foto e voltar à default
        if ($request->input('remove_picture') == '1') {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $data['profile_picture'] = null;

        // 📸 Upload de nova foto
        } elseif ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $data['profile_picture'] = $request->file('profile_picture')->store('profiles', 'public');
        } else {
            // ✅ mantém a foto atual se não vier nenhuma
            unset($data['profile_picture']);
        }

        // 🔐 Password
        if ($request->filled('password')) {

            // ✅ só valida a password atual se quiser mudar a password
            if (!$request->filled('current_password')) {
                return back()->withErrors([
                    'current_password' => 'Introduz a password atual para a alterar.'
                ]);
            }

            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors([
                    'current_password' => 'Password atual incorreta.'
                ]);
            }

            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        // ✅ remove campos que não existem na tabela users
        unset($data['current_password']);
        unset($data['remove_picture']);

        // 📧 Reset verificação email
        if (isset($data['email']) && $user->email !== $data['email']) {
            $data['email_verified_at'] = null;
        }

        $data['has_2fa'] = $request->boolean('has_2fa');

        $user->update($data);

        return Redirect::route('profile.edit')
            ->with('status', 'Perfil atualizado com sucesso!');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // ✅ apaga a foto do storage antes de apagar o utilizador
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
