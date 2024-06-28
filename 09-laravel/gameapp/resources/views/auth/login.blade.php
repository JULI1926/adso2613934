@extends('layouts.app')
@section('title', 'GameApp - Login')
@section('classMain', 'login')

@section('content')

<header>
    <div class="empty-div"></div>
    <h1 class="title-register">Login</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>
<!--menu-login-->
<nav id="menu-login" class="nav"></nav>

</nav>
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div class="form-group">
        <div>
            <label for="email">
                <span class="icon"><img src="../images/email-icon.png" alt="Icono de Nombre Completo" /></span>
                Email:
            </label>
        </div>

        <div>
            <x-input-label for="email" :value="__('')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

    </div>


    <!-- Password -->
     <div class="form-group">

     <div>
          <label for="password">
            <span class="icon"><img src="../images/password-icon.png" alt="Icono de Contraseña" /></span>
            Password:
          </label>
        </div>

     <div class="mt-4">
        <x-input-label for="password" :value="__('')" />

        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
            autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

     </div>
    <footer>

    <div class="flex items-center justify-end mt-4">
        <button type="submit">Login</button>
    </div>

    </footer>
    
</form>
@endsection

@section('js')
<script>
    $("header").on("click", ".btn-burger", function () {
        $(this).toggleClass("active");
        $(".nav").toggleClass("active");
    });

    $(document).ready(function () {
        $("#menu-login").load("menu-login.html");
    });

    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var passwordIcon = document.querySelector(".password-icon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.src = "../images/view-password-icon.png"; // Cambia a icono de "ocultar contraseña"
        } else {
            passwordInput.type = "password";
            passwordIcon.src = "../images/view-password-icon.png"; // Cambia a icono de "ver contraseña"
        }
    }
</script>

@endsection