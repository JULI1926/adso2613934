@extends('layouts.app')
@section('title', 'GameApp - Catalogue')
@section('classMain', 'catalogue')

@section('content')
<header class="logo-catalogue">
    <a href="/" class="btn-back">
        <img src="../images/btn-back.svg" alt="Back">
    </a>
    <img src="../images/logo-welcome.svg" alt="Logo" class="logo-top">
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom" d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>
<nav id="menu-login" class="nav">    
</nav>
<section class="scroll">
    <form action="" method="POST">
        <input type="text" id="fcat" list="lcat" placeholder="Filter" maxlength="18">
        <datalist id="lcat">
            <option value="All"></option>
            @foreach ($categories as $category)
                <option value="{{ $category->name }}"></option>
            @endforeach
        </datalist>

    </form>

    <div class="content">
        @foreach ($categories as $category)
            @if(count($category->games) > 0)
            <article>
                <h2><img src="../images/ico-category.svg" alt="">
                    {{ $category->name }}
                </h2>
                <div class="owl-carousel owl-theme">
                    @foreach ($games as $game)
                        @if($category->id == $game->category_id)
                            <a href="{{ url('catalogue/'.$game->id)}}">
                                <figure>
                                    <img src="{{$game->image}}" alt="" class="slide">
                                    {{$game->title}}
                                </figure>
                            </a>
                        @endif
                    @endforeach           
                </div>
            </article>
            @endif    
        @endforeach
    </div>

    {{-- <a href="../frames/03-view-game.html">
        <figure>
            <img src="../images/slide-c1-01.png" alt="" class="slide">
            FC 24 Mobile
        </figure>
    </a>          --}}

    
    
</section>

@endsection

@section('js')

<script>
    $(document).ready(function () {
        // - - - - - - - - - - - - - - -
        $('.owl-carousel').owlCarousel({
            center: false,
            loop: true,
            margin: 0,
            nav: true,
            dots: false,
            responsive:{
                0:{
                    items: 2
                }
            }
        })
        // - - - - - - - - - - - - - - -
        $('header').on('click', '.btn-burger', function () {
            $(this).toggleClass('active')
            $('.nav').toggleClass('active')
        })
        // - - - - - - - - - - - - - - -
        $('body').on('change', '#fcat', function(event) {
            event.preventDefault()
            $fcat = $(this).val()
            $tk   = $('input[name="_token"]').val()
            $('.loader').removeClass('hidden')
            $('#content').hide()
            $sto = setTimeout(() => {
                clearTimeout($sto)
                $.post("gamesbycat", {
                    fcat: $fcat,
                    _token: $tk
                },
                    function (data) {
                        $('.loader').addClass('hidden')
                        $('#content').html(data).fadeIn('slow')
                        $('.owl-carousel').owlCarousel({
                            center: false,
                            loop: true,
                            margin: 0,
                            nav: true,
                            dots: false,
                            responsive:{
                                0:{
                                    items: 2
                                }
                            }
                        })
                    })
            }, 1500)
        })
 
        // - - - - - - - - - - - - - - -
    })
</script>

@endsection

