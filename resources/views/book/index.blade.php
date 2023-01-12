@extends('book.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-12">
                <a href="book/create" class="btn btn-primary mb-2">Create New Book</a>
                <br>

                   @if ($message = Session::get('success'))
                     <div class="alert alert-success">
                         <p>{{ $message }}</p>
                     </div>
                   @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($book as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->ISBN }}</td>
                            <td>
                            <a href="{{ route('book.show', $book)}}" class="btn btn-primary">Show</a>
                        <a href="{{ route('book.edit', $book)}}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('book.destroy', $book)}}" method="post" class="d-inline">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div>

<a href="logout">
<button class="btn btn-danger" type="submit" style="margin: 15px;">LOG OUT</button>
</a>

@endsection
