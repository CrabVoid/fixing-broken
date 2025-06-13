<x-layout>
<h2>{{ $book->title }}</h2>
<h3>{{ $book->author }}</h3>
<p>{{ $book->released_at }}</p>

@if (session('success'))
<div class="color: yellow">
    {{ session('success')}}
</div>
@endif
<a href="{{ route('index') }}">All books</a>
</x-layout>