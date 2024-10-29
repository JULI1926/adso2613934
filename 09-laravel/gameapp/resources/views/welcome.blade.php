@extends('layouts.app')
@section('title', 'GameApp - Welcome')
@section('classMain', 'welcome')

@section('content')
<header>
    <img src="../images/logo-welcome.svg" alt="logo">
</header>
<section class="slider owl-carousel owl-theme">
    @foreach ($sliders as $slider)  
        <img src="{{ asset($slider->image)}}" alt="{{$slider->title}}">
    @endforeach
    
    

</section>

<footer>
    <a href="/catalogue" class="btn btn-explore">
        <img src="../images/content-btn-welcome.svg" width=100px height=auto alt="explore">
    </a>

</footer>


@endsection

@section('js')

<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                }

            }
        })
    })
</script>

@endsection