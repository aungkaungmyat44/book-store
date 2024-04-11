<a href="{{ route('books.show', ['book' => $book->id]) }}" class="btn btn-info">
    Detail
</a>

<a href="{{ route('books.edit', ['book' => $book->id]) }}" class="btn btn-warning">
    Edit
</a>

<button type="submit" form="form_destroy_{{$book->id}}" class="btn btn-danger">
    Delete
</button>
<form id="form_destroy_{{$book->id}}" method="POST" action="{{ route('books.destroy', ['book' => $book->id]) }}">
    @method('DELETE')
    @csrf
</form>