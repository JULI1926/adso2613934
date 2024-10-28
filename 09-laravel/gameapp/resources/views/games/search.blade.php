@forelse($games as $game)
<article class="record">
    <figure class="avatar">
        <img class="mask" src="{{ $game->image }}" alt="Photo">
        <img class="border" src="{{asset('images/shape-border-smalls-category.svg')}}" alt="Border">
    </figure>
    <aside>
        <h3>{{ $game->title }}</h3>
        <h4>{{ $game->developer }}</h4>
    </aside>
    <figure class="actions">
        <a href="{{ url('games/' .$game->id )}}">
            <img src="{{asset('images/ico-search.svg')}}" alt="Show">
        </a>
        <a href="{{ route('games.edit',$game->id)}}">
            <img src="{{asset('images/ico-edit.svg')}}" alt="Edit">
        </a>                    
        <a href="javascript:;" class="delete" data-fullname="{{ $game->title}}">
            <img src="{{asset('images/ico-delete.svg')}}" alt="Delete">
        </a>
        <form action="{{ url('games/' .$game->id)}}" method="post" style="display:none">
            @csrf
            @method('DELETE')
        </form>
    </figure>
</article>
@empty
Not found 😒
@endforelse

@section('js')

@endsection