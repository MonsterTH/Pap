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
use PragmaRX\Google2FA\Google2FA;
use BaconQrCode\Writer;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;


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
        $user = $request->user();

    $qrCode = null;

    if (!$user->two_factor_enabled) {
        $google2fa = new Google2FA();

        $secret = $google2fa->generateSecretKey();
        $user->two_factor_secret = $secret;
        $user->save();

        $qrCodeUrl = $google2fa->getQRCodeUrl(
            'IdentityFraud',
            $user->email,
            $secret
        );

        $renderer = new ImageRenderer(
            new RendererStyle(200),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);
        $qrCode = base64_encode($writer->writeString($qrCodeUrl));
    }

    return view('profile.edit', [
        'user' => $user,
        'qrCode' => $qrCode
    ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validated();

        // FOTO
        if ($request->input('remove_picture') == '1') {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $data['profile_picture'] = null;

        } elseif ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $data['profile_picture'] = $request->file('profile_picture')->store('profiles', 'public');
        } else {
            unset($data['profile_picture']);
        }

        // PASSWORD SÓ SE EXISTIR
        if ($request->filled('password')) {

            if (!$request->filled('current_password')) {
                return back()->withErrors([
                    'current_password' => 'Introduz a password atual.'
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

        // limpar campos que não existem
        unset($data['current_password']);
        unset($data['remove_picture']);

        // update normal (nome funciona sempre)
        $user->update($data);

        return back()->with('status', 'Perfil atualizado com sucesso!');
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
