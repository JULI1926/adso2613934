@forelse($categories as $category)
<article class="record">
    <figure class="avatar">
        <img class="mask" src="{{ $category->photo }}" alt="Photo">
        <img class="border" src="{{asset('images/shape-border-smalls-category.svg')}}" alt="Border">
    </figure>
    <aside>
        <h3>{{ $category->name}}</h3>
        <h4></h4>
    </aside>
    <figure class="actions">
        <a href="{{ url('categories/' .$category->id )}}">
            <img src="{{asset('images/ico-search.svg')}}" alt="Show">
        </a>
        <a href="{{ url('categories/' .$category->id .'/edit') }}">
            <img src="{{asset('images/ico-edit.svg')}}" alt="Edit">
        </a>
        <a href="javascript:;">
            <img src="{{asset('images/ico-delete.svg')}}" alt="Delete">
        </a>
        <form action="{{ url('categories/' .$category->id)}}" method="post" style="display:none">
            @csrf
            @method('DELETE')
        </form>
    </figure>
</article>
@empty
Not found 😒
@endforelse
