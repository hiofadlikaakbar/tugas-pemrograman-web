@extends('layout')

@section('content')
    <div class="container">
        <h1>{{ __('messages.posts.newContent') }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">{{ __('messages.posts.title') }}</label>
                <input type="text" class="form-control" id="title" 
                    name="title" value="{{ old('title') }}" required>
            </div>
            <div class="form-group">
                <label for="content">{{ __('messages.posts.content') }}</label>
                <textarea class="form-control" id="content" 
                    name="content" rows="5" required>{{ old('content') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
