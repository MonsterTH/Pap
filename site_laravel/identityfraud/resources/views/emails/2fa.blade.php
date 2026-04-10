<div style="font-family: Arial, sans-serif; background:#0f0f14; padding:30px; border-radius:12px; color:#fff; text-align:center;">

<div class="flex items-center justify-center py-12 md:py-16">
        <img class="h-20 md:h-28 drop-shadow-[0_0_30px_rgba(230,57,70,0.3)] transition-transform duration-500 hover:scale-105" src="{{ asset('images/LogoTipo.png') }}" alt="Identity Fraud Logo">
    </div>

    <h2 style="color:#ff4da6; margin-bottom:10px;">🔐 Verificação de Segurança</h2>

    <p style="font-size:14px; color:#cfcfcf; margin-bottom:20px;">
        Usámos este código para confirmar a tua identidade
    </p>

    <div style="display:inline-block; padding:15px 30px; background:#1c1c25; border:1px solid #2a2a3a; border-radius:10px;">
        <span style="font-size:28px; letter-spacing:6px; font-weight:bold; color:#ffffff;">
            {{ $code }}
        </span>
    </div>

    <p style="font-size:12px; color:#999; margin-top:20px;">
        Este código expira em <b style="color:#ff4da6;">10 minutos</b>.
    </p>

    <hr style="border:none; border-top:1px solid #2a2a3a; margin:25px 0;">

    <p style="font-size:11px; color:#777;">
        Se não foste tu a pedir este código, ignora este email.
    </p>

</div>
