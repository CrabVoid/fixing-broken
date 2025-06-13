<x-layout>
<h1>Edit book</h1>

<form action="{{ route('update', $book ) }}" method="post">
    @csrf
    @method('put')

    <input type="text" name="title" placeholder="title goes here" value="{{ old('title') }}">
    @error('title')
        <div style="color: red;">{{ $message }}</div>
    @enderror
    <input type="text" name="author" placeholder="author goes here" value="{{ old('author') }}">
    @error('author')
        <div style="color: red;">{{ $message }}</div>
    @enderror
    <input type="date" name="released_at" placeholder="date goes here" value="{{ old('released_at') }}">
    @error('released_at')
        <div style="color: red;">{{ $message }}</div>
    @enderror
    <input type="submit" value="Update">
</form>
</x-layout>