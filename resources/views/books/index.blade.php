<h1>Books</h1>
<a href="{{ route('create') }}">Create a book</a>
<ul>
    @foreach($books as $book)
        <li>
            <h2>{{ $book->title }}</h2>
            <div>
                <a href="{{ route('show', $book) }}">Show</a>
                <a href="{{ route('edit', $book) }}">Edit</a>
            </div>
        </li>
    @endforeach
</ul>