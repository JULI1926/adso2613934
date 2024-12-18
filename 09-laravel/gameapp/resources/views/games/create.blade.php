@extends('layouts.app')
@section('title', 'GameApp - Games Module')
@section('classMain', 'addgame')

@section('content')
<header>
    <a href="{{ url('dashboard') }}" class="btn-back">
        <img src="../images/btn-back.svg" alt="Back">
    </a>
    <h1 class="title-register">ADD GAME</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top"
            d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>

<nav id="menu-login" class="nav"></nav>

</nav>

<section class="scroll">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('games.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="photo">
            <div class="form-group">
                <img id="upload" class="mask" src="../images/bg-upload-photo.svg" alt="Photo">
                <img class="border" src="../images/borde.svg" alt="Photo">
                <input id="photo" type="file" name="image">
            </div>
        </div>
        <div class="form-group">
            <div>
                <label class="title-content-register" for="fullname">
                    <span class="icon"><img src="../images/name-icon.png" alt="Icono de Nombre Completo"></span>
                    Title:
                </label>
            </div>
            <div class="title-input">
                <input type="text" id="title" name="title" placeholder="Introduzca el titulo" required>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label class="title-content-register" for="category_id">
                    <span class="icon"><img src="{{ asset('images/category-add-game.png') }}" alt="Icono de Nombre Completo"></span>
                    Category:
                </label>
            </div>
            <div class="title-input">
                <select class="category_id" name="category_id" id="category_id">
                    <option value="">Select...</option>
                    @foreach ($cats as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label class="title-content-register" for="email">
                    <span class="icon"><img src="../images/description-icon.png"
                            alt="Icono de Correo Electrónico"></span>
                    Release Date:
                </label>
            </div>
            <div class="title-input">
                <input class="releasedate" type="date" id="releasedate" name="releasedate" placeholder="" value="">
                <x-input-error :messages="$errors->get('releasedate')" class="mt-2" />
            </div>
        </div>
        <div class="form-group">
            <div>
                <label class="title-content-register" for="developer">
                    <span class="icon"><img src="../images/developer.png" alt="Icono de Desarrollador"></span>
                    Developer:
                </label>
            </div>
            <div class="title-input">
                <input type="text" id="developer" name="developer" placeholder="Enter the developer name">
            </div>
        </div>
        <div class="form-group">
            <div>
                <label class="title-content-register" for="genre">
                    <span class="icon"><img src="../images/genre.png" alt="Icono de Género"></span>
                    Genre:
                </label>
            </div>
            <div class="title-input">
                <input type="text" id="genre" name="genre" placeholder="Enter the genre">
            </div>
        </div>
        <div class="form-group">
            <div>
                <label class="title-content-register" for="email">
                    <span class="icon"><img src="../images/description-icon.png"
                            alt="Icono de Correo Electrónico"></span>
                    Description:
                </label>
            </div>
            <div class="title-input">
                <textarea class="description" id="description-category" name="description" placeholder="" style="width: 320px; height: 130px; resize: none;" value="lorem ipsum">&#10;</textarea>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label class="title-content-register" for="email">
                    <span class="icon"><img src="../images/price.png"
                            alt="Icono de Correo Electrónico"></span>
                    Price:
                </label>
            </div>
            <div class="title-input">
                <input class="releasedate" type="price" id="price" name="price" placeholder="" value="">
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
        </div>
        <div class="form-group">
            <div>
                <label class="title-content-register" for="slider">
                    <span class="icon"><img src="../images/slider-icon.png" alt="Icono de Slider"></span>
                    Slider:
                </label>
            </div>
            <div class="title-input">
                <input type="checkbox" id="slider" name="slider" value="1">
            </div>
        </div>
        <footer>
            <button type="submit" class="btn btn-register">
                <img src="{{ asset('images/add-user.svg')}}" width="60px" height="auto" alt="explore" width="100px" height="auto" class="image-name-login">
            </button>

        </footer>
    </form>
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
            $("#menu-dashboard").load("/menudashboard");
        });
    </script>
    @endsection