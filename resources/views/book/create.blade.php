@extends('book.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/book" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Book Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="">Author</label>
                            <textarea name="author" id="" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">ISBN</label>
                            <textarea name="ISBN" id="" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
