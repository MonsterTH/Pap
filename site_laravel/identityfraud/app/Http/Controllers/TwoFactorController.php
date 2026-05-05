<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;
use BaconQrCode\Writer;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    public function setup()
{
    $user = auth()->user();

    $google2fa = new Google2FA();

    // se já existe secret, usa o mesmo
    if (!$user->two_factor_secret) {
        $secret = $google2fa->generateSecretKey();
        $user->two_factor_secret = encrypt($secret);
        $user->save();
    } else {
        $secret = decrypt($user->two_factor_secret);
    }

    $qrUrl = $google2fa->getQRCodeUrl(
        'Identity Fraud',
        $user->email,
        $secret
    );

    $renderer = new ImageRenderer(
        new RendererStyle(200),
        new SvgImageBackEnd()
    );

    $writer = new Writer($renderer);

    $qrImage = base64_encode($writer->writeString($qrUrl));

    return view('2fa.setup', [
        'qrImage' => $qrImage,
        'secret' => $secret
    ]);
}

    // 📍 CONFIRMAR ATIVAÇÃO DO 2FA
    public function confirm(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);

        $user = auth()->user();

        $google2fa = new Google2FA();

        $secret = decrypt($user->two_factor_secret);

        $valid = $google2fa->verifyKey($secret, $request->code);

        if (!$valid) {
            return back()->withErrors([
                'code' => 'Código inválido'
            ]);
        }

        $user->two_factor_enabled = true;
        $user->save();

        return redirect(route('profile.index'))->with('success', '2FA ativado 🔐');
    }

    // 📍 FORM DE VERIFICAÇÃO NO LOGIN
    public function verifyForm()
    {
        return view('2fa.verify');
    }

    // 📍 VERIFICAR NO LOGIN
    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);

        $user = \App\Models\User::find(session('2fa_user'));

        if (!$user) {
            return redirect('/login');
        }

        $google2fa = new Google2FA();

        $secret = decrypt($user->two_factor_secret);

        if ($google2fa->verifyKey($secret, $request->code)) {
            auth()->login($user);
            session()->forget('2fa_user');

            return redirect(route('profile.index'));
        }

        return back()->withErrors([
            'code' => 'Código inválido'
        ]);
    }
}
