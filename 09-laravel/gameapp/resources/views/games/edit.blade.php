@extends('layouts.app')
@section('title', 'GameApp - Edit Game')
@section('classMain', 'addgame')

@section('content')
<header>
    <a href="{{url('dashboard')}}" class="btn-back">
        <img src="{{ asset('images/btn-back.svg')}}" alt="Back">
    </a>
    <h1 class="title-register">EDIT GAME</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top"
            d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>

<nav id="menu-login" class="nav"></nav>

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
    <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="photo">
            <div class="form-group">
                <img id="upload" class="mask" src="{{ asset($game->image) }}" alt="Photo">
                <img class="border" src="{{ asset('images/borde.svg')}}" alt="Photo">
                <input id="photo" type="file" name="image">
            </div>
        </div>
        <div class="form-group">
            <div>
                <label class="title-content-register" for="title">
                    <span class="icon"><img src="{{ asset('images/name-icon.png') }}" alt="Icono de Nombre Completo"></span>
                    Title:
                </label>    
            </div>
            <div class="title-input">
                <input type="text" id="title" name="title" placeholder="Introduzca el titulo" value="{{ $game->title }}" required>
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
                    <option value="{{ $cat->id }}" {{ $cat->id == $game->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label class="title-content-register" for="releasedate">
                    <span class="icon"><img src="{{ asset('images/description-icon.png') }}" alt="Icono de Correo Electrónico"></span>
                    Release Date:
                </label>                
            </div>
            <div class="title-input">
                <input class="releasedate" type="date" id="releasedate" name="releasedate" value="{{ $game->releasedate }}">
                <x-input-error :messages="$errors->get('releasedate')" class="mt-2" />
            </div>
        </div>
        <div class="form-group">
            <div>
                <label class="title-content-register" for="developer">
                    <span class="icon"><img src="{{ asset('images/developer.png') }}" alt="Icono de Desarrollador"></span>
                    Developer:
                </label>            
            </div>
            <div class="title-input">
                <input type="text" id="developer" name="developer" placeholder="Enter the developer name" value="{{ $game->developer }}">
            </div>
        </div>
        <div class="form-group">
            <div>
                <label class="title-content-register" for="genre">
                    <span class="icon"><img src="{{ asset('images/genre.png') }}" alt="Icono de Género"></span>
                    Genre:
                </label>
            </div>
            <div class="title-input">
                <input type="text" id="genre" name="genre" placeholder="Enter the genre" value="{{ $game->genre }}">
            </div>
        </div>
        <div class="form-group">
            <div>
                <label class="title-content-register" for="description">
                    <span class="icon"><img src="{{ asset('images/description-icon.png') }}" alt="Icono de Correo Electrónico"></span>
                    Description:
                </label>
            </div>
            <div class="title-input">
                <textarea class="description" id="description-category" name="description" placeholder="" style="width: 320px; height: 130px; resize: none;">{{ $game->description }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label class="title-content-register" for="price">
                    <span class="icon"><img src="{{ asset('images/price.png') }}" alt="Icono de Correo Electrónico"></span>
                    Price:
                </label>
            </div>
            <div class="title-input">
                <input class="releasedate" type="number" id="price" name="price" placeholder="" value="{{ $game->price }}">
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
                <input type="checkbox" id="slider" name="slider" value="1" {{ $game->slider ? 'checked' : '' }}>
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

    $('.border').click(function(e) {
        $('#photo').click()
    })

    $('#photo').change(function(e) {
        e.preventDefault()
        let reader = new FileReader()
        reader.onload = function(evt) {
            $('#upload').attr('src', evt.target.result)
        }
        reader.readAsDataURL(this.files[0])
    })

    $(document).ready(function() {
        $("#menu-dashboard").load("/menudashboard");
    });
</script>
@endsection