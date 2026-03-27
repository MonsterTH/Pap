@extends('layouts')
@section('title', 'Identity Fraud - Login')
@section('content')
    <main>
        <div>
            <fieldset>
                <form id="login" onsubmit="erro_login(event)">
                    @csrf
                    <h2>Login</h2>

                    <div>
                        <input type="text" class="loginInput" id="email" name="email" maxlength="30" placeholder="Email" required>
                    </div>

                    <div>
                        <input type="password" class="loginInput" id="pass" name="pass" maxlength="20" placeholder="Palavra-passe" required><br>
                    </div>

                    <div>
                        <input type="checkbox">
                        <label for="">Remember Me</label>
                    </div>

                    <span id="erro"></span><br>

                    <div>
                        <button class="loginButton">Login</button>
                    </div>

                    <p style="text-align:center; margin-top:15px;">
                        Não tem uma conta? <a href="../register/register.html"><b>Registe-se</b></a>
                    </p>
                </form>
            </fieldset>
        </div>
    </main>
@endsection
