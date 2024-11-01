@extends('layouts.app')
@section('title', 'GameApp - Users Module')
@section('classMain', 'users')

@section('content')
<header>
    <a href="{{url('dashboard')}}" class="btn-back">
        <img src="../images/btn-back.svg" alt="Back">
    </a>
    <h1 class="title-register">USERS</h1>
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom" d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>

<nav id="menu-dashboard" class="nav"></nav>

<section>
    <div class="area">
        <form action="{{ url('import/users') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" id="file" class="hidden" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                <button type="button" class="btn-import">
                    <img src="{{asset('images/content-btn-import-excel.jpeg')}}" alt="Import">
                </button>
        </form>    
        <a class="add" href="{{ url('users/create')}}">
            <img src="../images/content-btn-add.svg" alt="Add">
        </a>
        <div class="options">
            <a href="{{ url('exports/users/excel')}}">
                <img src="{{asset('images/excel.png')}}" alt="">
            </a>
            <input type="text" name="qsearch" id="qsearch" placeholder="Search">
            <a href="{{ url('exports/users/pdf')}}">
                <img src="{{asset('images/pdf.png')}}" alt="">
            </a>
        </div>

        <div class="loader"></div>
        <div class="list">
            @foreach($users as $user)
            <article class="record">
                <figure class="avatar">
                    <img class="mask" src="{{ $user->photo }}" alt="Photo">
                    <img class="border" src="../images/shape-border-small.svg" alt="Border">
                </figure>
                <aside>
                    <h3>{{ $user->fullname }}</h3>
                    <h4>{{ $user->role }}</h4>
                </aside>
                <figure class="actions">
                    <a href="{{ url('users/' .$user->id )}}">
                        <img src="../images/ico-search.svg" alt="Show">
                    </a>
                    <a href="{{ url('users/' .$user->id .'/edit') }}">
                        <img src="../images/ico-edit.svg" alt="Edit">
                    </a>
                    <a href="javascript:;" class="delete" data-fullname="{{ $user->fullname}}">
                        <img src="{{ asset('../images/ico-delete.svg')}}" alt="Delete">
                    </a>
                    <form action="{{ url('users/' .$user->id)}}" method="post" style="display:none">
                        @csrf
                        @method('DELETE')
                    </form>
                </figure>
            </article>
            @endforeach
        </div>
    </div>



    <div class="paginate">
        {{ $users->links('layouts.navigation') }}
    </div>
</section>
@endsection


@section('js')
<script>
    $("header").on("click", ".btn-burger", function() {
        $(this).toggleClass("active");
        $(".nav").toggleClass("active");
    })

    $(".btn-import").on("click", function(e) {        
        $("#file").click();
    })

    $('#file').change(function(event) {
        $(this).parent().submit();        
    });
</script>

<script>
    $('figure').on('click', '.delete', function() {
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
    $('#qsearch').on('keyup', function() {
        $query = $(this).val()
        $token = $('input[name=_token]').val()
        $model = 'users'

        $('.loader').show();
        $('.list').hide();

        $.post($model + "/search", {
                q: $query,
                _token: $token
            },
            function(data) {
                $('.loader').hide();
                $('.list').show();
                $('.list').empty().append(data)
            }

        )
    })
</script>
@endsection