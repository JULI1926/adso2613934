@extends('layouts.app')
@section('title', 'GameApp - Categories Module')
@section('classMain', 'add-category')

@section('content')
<header>
    <a href="{{url('dashboard')}}" class="btn-back">
        <img src="{{ asset('images/btn-back.svg')}}" alt="Back" />
    </a>
    <h1 class="title-register">Edit Category</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top"
            d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>

<nav id="menu-dashboard" class="nav"></nav>

<section class="scroll">
    <form method="POST" action="{{ route('categories.update', $category->id) }}"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$category->id}}">
        <div class="photo">
            <div class="form-group">
                <img id="upload" class="mask" src="{{asset($category->photo)}}" alt="Photo">
                <img class="border" src="{{ asset('images/borde.svg')}}" alt="Photo">
                <input id="photo" type="file" name="photo">
                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
            </div>
        </div>
        <!-- Name -->
        <div class="form-group">
            <div>
                <label class="title-content-register" for="name">
                    <span class="icon"><img src="{{ asset('images/name-icon.png')}}" alt="Icono de Nombre Completo"></span>
                    Name:
                </label>
            </div>
            <div class="title-input">
                <input class="name" type="text" id="name" name="name" placeholder="" value="{{$category->name}}">
                <x-input-error :messages="$errors->get('name',$category->name)" class="mt-2" />
            </div>
        </div>
        <!-- Description -->
        <div class="form-group">
            <div>
                <label class="title-content-register" for="email">
                    <span class="icon"><img src="{{ asset('images/description-icon.png')}}"
                            alt="Icono de Description"></span>
                    Description:
                </label>
            </div>
            <div class="title-input">
                <textarea class="description" id="description" name="description" placeholder="" style="width: 320px; height: 130px; resize: none;" value="lorem ipsum">{{ $category->description }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
        </div>
        <!-- Manufacturer -->
        <div class="form-group">
            <div>
                <label class="title-content-register" for="manufacturer">
                    <span class="icon"><img src="{{ asset('images/manufacturer-icon.png')}}"
                            alt="Icono de Description"></span>
                    Manufacturer:
                </label>
            </div>
            <div class="title-input">
                <select class="manufacturer" id="manufacturer" name="manufacturer">
                    <option value="Microsoft" @if(old('manufacturer', $category->manufacturer) == "Microsoft") selected @endif>Microsoft</option>
                    <option value="Nintendo" @if(old('manufacturer', $category->manufacturer) == "Nintendo") selected @endif>Nintendo</option>
                    <option value="Sony" @if(old('manufacturer', $category->manufacturer) == "Sony") selected @endif>Sony</option>
                </select>
                <x-input-error :messages="$errors->get('manufacturer')" class="mt-2" />
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
                    <input class="releasedate" type="date" id="releasedate" name="releasedate" value="{{ $category->releasedate }}">
                    <x-input-error :messages="$errors->get('releasedate')" class="mt-2" />
                </div>
            </div>
            <!-- Footer -->
            <footer>
                <button type="submit" class="btn btn-register">
                    <img src="{{ asset('images/save.svg')}}" width="60px" height="auto" alt="explore" width="100px" height="auto" class="image-name-login">
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
        $("#menu-dashboard").load("/menudashboard");
    });
</script>
@endsection