@extends('layouts.app')
@section('title', 'GameApp - Categories Module')
@section('classMain', 'add-category')

@section('content')
<header>
            <a href="users.html" class="btn-back">
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
            <form action="06-dashboard.html" method="get">
                <div class="photo">
                    <div class="form-group">
                        <img id="upload" class="mask" src="../images/bg-upload-photo.svg" alt="Photo">
                        <img class="border" src="../images/borde.svg" alt="Photo">
                        <input id="photo" type="file" name="photo" >
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label class="title-content-register" for="fullname">
                            <span class="icon"><img src="../images/name-icon.png" alt="Icono de Nombre Completo"></span>
                            Name:
                        </label>
                    </div>
                    <div class="title-input">
                        <input type="text" id="fullname" name="fullname" placeholder="Introduzca su Nombre" required>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label class="title-content-register" for="fullname">
                            <span class="icon"><img src="../images/category-add-game.png" alt="Icono de Nombre Completo"></span>
                            Category:
                        </label>
                    </div>
                    <select name="category_id">
                        <option value="">Select...</option>
                        @foreach ($cats as cat)
                            <option value="{{cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
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
                        <textarea class="description" id="description-category" name="description-category" placeholder="" style="width: 320px; height: 130px; resize: none;" value = "lorem ipsum">&#10;</textarea>
                    </div>
                </div>                
                <footer>
                    <a href="games.html" class="btn btn-register" >
                        <img src="../images/add-user.svg" width = "60px" height = "auto" alt="explore" width = "100px" height = "auto" class="image-name-login">
                    </a>

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