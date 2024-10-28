@extends('layouts.app')
@section('title', 'GameApp - Categories Module')
@section('classMain', 'addgame')

@section('content')
<header>
    <a href="javascript:history.back()" class="btn-back">
        <img src="../images/btn-back.svg" alt="Back" />
    </a>
    <h1 class="title-register">View Game</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>

<nav id="menu-dashboard" class="nav"></nav>



<section class="scroll">
    <form action="06-dashboard.html" method="get">
        <!-- Photo -->
        <div class="photo readonly">
            <div class="form-group">
                <img id="upload" class="mask" src="{{asset($game->image)}}" alt="Photo">
                <img class="border" src="{{asset('images/borde.svg')}}" alt="Photo">
            </div>
        </div>
        
        <!-- Title -->
        <div class="form-group">
            <div>
                <label class="title-content-register" for="fullname">
                    <span class="icon"><img src="{{ asset('images/name-icon.png')}}" alt="Icono de Nombre Completo"></span>
                    Title:
                </label>
            </div>
            <div class="title-input">
                <input class="title" type="text" id="title" name="title" placeholder="" value="{{ $game->title }}" readonly>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
        </div>

        <!-- Developer -->
        <div class="form-group">
            <div>
                <label class="title-content-register" for="fullname">
                    <span class="icon"><img src="{{ asset('images/name-icon.png')}}" alt="Icono de Nombre Completo"></span>
                    developer:
                </label>
            </div>
            <div class="title-input">
                <input class="developer" type="text" id="developer" name="developer" placeholder="" value="{{ $game->developer }}" readonly>
                <x-input-error :messages="$errors->get('developer')" class="mt-2" />
            </div>
        </div>

        <!-- Release date -->
        <div class="form-group">
            <div>
                <label class="title-content-register" for="releasedate">
                    <span class="icon"><img src="{{ asset('images/releasedate-icon.png')}}" alt="Icono de Release Date"></span>
                    Release Date:
                </label>
            </div>
            <div class="title-input">
                <input class="releasedate" type="date" id="releasedate" name="releasedate" value="{{ $game->releasedate }}" readonly>
                <x-input-error :messages="$errors->get('releasedate')" class="mt-2" />
            </div>
        </div>
        <!-- Price -->
        <div class="form-group">
            <div>
                <label class="title-content-register" for="fullname">
                    <span class="icon"><img src="{{ asset('images/name-icon.png')}}" alt="Icono de Nombre Completo"></span>
                    Price:
                </label>
            </div>
            <div class="title-input">
                <input class="price" type="text" id="price" name="price" placeholder="" value="{{ $game->price }}" readonly>
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
        </div>
        <div class="form-group">
            <!-- Description -->
            <div>
                <label class="title-content-register" for="email">
                    <span class="icon"><img src="{{ asset('images/description-icon.png')}}"
                            alt="Icono de Description"></span>
                    Description:
                </label>
            </div>
            <div class="title-input">
                <textarea class="description" id="description" name="description" placeholder="" style="width: 320px; height: 130px; resize: none;" readonly>{{ $game->description }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
        </div>
    </form>
</section>
@endsection

@section('js')
<script>
    $("header").on("click", ".btn-burger", function() {
        $(this).toggleClass("active");
        $(".nav").toggleClass("active");
    });

    $(document).ready(function() {
        $("#menu-dashboard").load("/menudashboard");
        $('.loader').hide();
    });
</script>

@endsection