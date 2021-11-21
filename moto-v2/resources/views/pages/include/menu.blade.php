<div class="menu"
     id="menu">
    <ul>
        @foreach($categories as $category)
        <li>
            <a href="/category/{{ $category->id }}">
                {{ $category->name }}
            </a>
        </li>
        @endforeach
    </ul>
</div>
