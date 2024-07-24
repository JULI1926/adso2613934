@extends('layouts.app')
@section('title', 'GameApp - Profile')
@section('classMain', 'profile')

@section('content')
<header>
    <a href="javascript:history.back()" class="btn-back">
        <img src="../images/btn-back.svg" alt="Back" />
    </a>
    <h1 class="title-register">Profile</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom" d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>

<nav id="menu-dashboard" class="nav">

</nav>

<section class="scroll">
    <div class="photo">
        <div class="form-group">
            <img id="upload" class="mask" src="{{$user->photo}}" alt="Photo">
            <img class="border" src="../images/borde.svg" alt="Photo">
        </div>
    </div>
    <div class="personalDate">
        <div class="name">
            {{$user->fullname}}
        </div>        
        <div class="email">
            {{$user->email}}
        </div>

        <div class="rol">
            {{$user->role}}
        </div>
    </div>

    <div class="profileData">
        <div>
            <div>{{$user->document}}</div>
            <div>123 456 7890</div>
        </div>
        <div>
            <div>Active</div>
            <div>{{$user->gender}}</div>
        </div>
        <div>
            <div>{{$user->birthdate}}</div>
            <div>Str 84-86</div>
        </div>
        
    </div>
</section>
@endsection

@section('js')
<script>
        $("header").on("click", ".btn-burger", function () {
            $(this).toggleClass("active");
            $(".nav").toggleClass("active");
        });

        $(document).ready(function () {
            $("#menu-dashboard").load("/menudashboard");
        });
</script>

@endsection