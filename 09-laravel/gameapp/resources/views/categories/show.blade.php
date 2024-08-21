@extends('layouts.app')
@section('title', 'GameApp - Categories Module')
@section('classMain', 'view-category')

@section('content')
<header>
    <a href="javascript:history.back()" class="btn-back">
        <img src="../images/btn-back.svg" alt="Back" />
    </a>
    <h1 class="title-register">View Category</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>

<nav id="menu-dashboard" class="nav"></nav>

</nav>

<section class="scroll">
    <form action="06-dashboard.html" method="get">
        <div class="photo">
            <div class="form-group">
                <img id="upload" class="mask" src="../images/sports-category.gif" alt="Photo">
                <img class="border" src="{{asset('images/borde.svg')}}" alt="Photo">
            </div>
        </div>
        <div class="form-group">  
            <div>
                <label class="title-content-register" for="fullname">
                    <span class="icon"><img src="{{asset('images/name-icon.png')}}" alt="Icono de Nombre Completo"></span>
                    Name:
                </label>   
            </div>
            <div class="title-input">
                <!-- <input class="name" type="text" id="name" name="name" placeholder="" value="Sports" readonly> -->
                <label class="name" type="text" id="name" name="name" placeholder="">
                    {{ $category->name }}
                </label>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label class="title-content-register" for="email">
                    <span class="icon"><img src="{{asset('images/description-icon.png')}}"
                            alt="Icono de Correo Electrónico"></span>
                    Description:
                </label>    
            </div>
            <div class="title-input">
                <textarea class="description" id="description-category" name="description-category" placeholder=""
                    style="width: 320px; height: 130px; resize: none;"
                    readonly>{{ $categorie->description}}</textarea>
            </div>
        </div>

    </form>
</section>
@endsection