@extends('layouts.app');
@section('title','GameApp - Create User')
@section('classMain', 'adduser')

@section('content')
<header>
    <div class="empty-div"></div>
    <h1 class="title-register">Add User</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom" d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>

<nav id="menu-login" class="nav"></nav>

</nav>
<section class="scroll">
    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="photo">
            <div class="form-group">
                <img id="upload" class="mask" src="{{ asset('../images/bg-upload-photo.svg')}}" alt="Photo">
                <img class="border" src="../images/borde.svg" alt="Photo">
                <input id="photo" type="file" name="photo">
            </div>
        </div>

        <!-- document -->
        <div class="form-group">
            <div>
                <x-input-label for="document" :value="__('Document')" />
                <x-text-input id="document" class="block mt-1 w-full" type="text" name="document" :value="old('document')" required autofocus autocomplete="document" />
                <x-input-error :messages="$errors->get('document')" class="mt-2" />
            </div>


        </div>

        <!-- Name -->
        <div class="form-group">
            <div>
                <label class="title-content-register" for="fullname">
                    <span class="icon"><img src="{{ asset('../images/name-icon.png')}}" alt="Icono de Nombre Completo"></span>
                    FullName:
                </label>
            </div>

            <div class="mt-4">
                <x-input-label for="fullname" :value="__('')" />
                <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname')" required autofocus autocomplete="fullname" />
                <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
            </div>

        </div>

        <!-- gender -->
        <div class="form-group">
            <div class="mt-4">
                <x-input-label for="gender" :value="__('Gender')" />
                <select id="gender" name="gender" class="input_gender" required>
                    <option value="Male">Male</option>
                    <option value="Women">Women</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>
        </div>



        <!-- Birthdate -->
        <div class="form-group">
            <div>
                <label class="title-content-register" for="birth date">
                    <span class="icon"><img src="{{ asset('../images/icon-date.png')}}" alt="Icono de Correo Electrónico"></span>
                    Birth Date:
                </label>
            </div>
            <div class="mt-4">
                <x-input-label for="birthdate" :value="__('')" />
                <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required autofocus autocomplete="birthdate" />
                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
            </div>
        </div>


        <!-- Phone -->
        <div class="form-group">
            <div>
                <label class="title-content-register" for="phone number">
                    <span class="icon"><img src="{{ asset('../images/phone-icon.png')}}" alt="Icono de Correo Electrónico"></span>
                    Phone Number:
                </label>
            </div>
            <div class="mt-4">
                <x-input-label for="phone" :value="__('')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
        </div>


        <!-- Email Address -->
        <div class="form-group">
            <div>
                <label class="title-content-register" for="email">
                    <span class="icon"><img src=" {{ asset('../images/email-icon.png')}}" alt="Icono de Correo Electrónico"></span>
                    Email:
                </label>
            </div>
            <div class="mt-4">
                <x-input-label for="email" :value="__('')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

        </div>

        <div class="form-group">
            <div>
                <label class="title-content-register" for="password">
                    <span class="icon"><img src="../images/password-icon.png" alt="Icono de Contraseña"></span>

                    Password:
                </label>
            </div>
            <div class="mt-4">
                <x-input-label for="password" :value="__('')" />

                <div class="password-input-container">
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <img src="../images/view-password-icon.png" alt="Icono de Ver Contraseña" class="password-icon" onclick="togglePasswordVisibility('password')" />
                </div>


                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>


        <!-- Confirm Password -->
        <div class="form-group">
            <div>
                <label class="title-content-register" for="password">
                    <span class="icon"><img src="../images/password-icon.png" alt="Icono de Contraseña"></span>
                    Confirm Password
                </label>
            </div>
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('')" />
                <div class="password-input-container">
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <img src="../images/view-password-icon.png" alt="Icono de Ver Contraseña" class="password-icon" onclick="togglePasswordVisibility('password_confirmation')" />
                </div>


                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <footer>
            <button type="submit" class="btn btn-register">
                <img src="{{ asset('images/add-user.svg')}}" width="60px" height="auto" alt="explore" width="100px" height="auto" class="image-name-login">
            </button>
            
        </footer>
    </form>


</section>
@endsection

@section('js')
<script>
    $("header").on("click", ".btn-burger", function() {
        $(this).toggleClass("active");
        $(".nav").toggleClass("active");
    });


    //----------------------------

    $('.border').click(function(e) {
        $('#photo').click()
    })
    $('#photo').change(function(e) {
        e.preventDefault()
        let reader = new FileReader()
        reader.onload = function(evt) {
            $('#upload').attr('src', event.target.result)
        }
        reader.readAsDataURL(this.files[0])
    })





    $(document).ready(function() {
        $("#menu-login").load("/menu");
    });

    function togglePasswordVisibility(fieldId, iconSelector) {
        var passwordInput = document.getElementById(fieldId);
        var passwordIcon = document.querySelector(iconSelector);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.src = "../images/hide-password-icon.png"; // Cambia a icono de "ocultar contraseña"
        } else {
            passwordInput.type = "password";
            passwordIcon.src = "../images/view-password-icon.png"; // Cambia a icono de "ver contraseña"
        }
    }
</script>
@endsection