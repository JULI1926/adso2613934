@extends('layouts.app')
@section('title', 'GameApp - Categories Module')
@section('classMain', 'category')

@section('content')
<header>
    <a href="{{url('dashboard')}}" class="btn-back">
        <img src="../images/btn-back.svg" alt="Back">
    </a>
    <h1 class="title-register">CATEGORIES</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>

<nav id="menu-dashboard" class="nav"></nav>

</nav>
<section>
    <div class="area">
        <a class="add" href=" {{ url('categories/create')}} ">
            <img src="{{ url('images/content-btn-add.svg')}}" alt="Add">
        </a>
        @foreach($categories as $categorie)
            <article class="record">  
                <figure class="avatar">
                    <img class="mask" src="{{asset('images/sports-category.gif')}}" alt="Photo">
                    <img class="border" src="{{asset('images/shape-border-smalls-category.svg')}}" alt="Border">
                </figure>     
                <aside>
                    <h3>{{ $categorie->name}}</h3> 
                    <h4></h4>
                </aside>
                <figure class="actions">
                    <a href="{{ url('categories/' .$categorie->id )}}">
                        <img src="{{asset('images/ico-search.svg')}}" alt="Show">
                    </a>
                    <a href="edit-category.html">
                        <img src="{{asset('images/ico-edit.svg')}}" alt="Edit">
                    </a>
                    <a href="javascript:;">
                        <img src="{{asset('images/ico-delete.svg')}}" alt="Delete">
                    </a>
                </figure>
            </article>   
        @endforeach



        <div class="paginate">
            {{ $categories->links('layouts.navigation') }}
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
        $('.loader').hide();
    });
</script>

<script>
    $('figure').on('click', '.delete', function () {
        $fullname = $(this).attr('data-fullname')

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).next().submit();
            }
        });
    });
</script>

<script>
    $('#qsearch').on('keyup', function () {
        $query = $(this).val()
        $token = $('input[name=_token]').val()
        $model = 'categories'

        $('.loader').show();
        $('.list').hide();

        $.post($model + "/search", {
            q: $query,
            _token: $token
        },
            function (data) {
                $('.loader').hide();
                $('.list').show();
                $('.list').empty().append(data)
            }

        )
    })
</script>