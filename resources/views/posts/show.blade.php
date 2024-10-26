@extends('layout')

@section('content')
    <div class="container">
        <h1>{{ __('messages.posts.show') }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input readonly="readonly" type="text" 
                class="form-control" id="title" name="title" 
                value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea readonly="readonly" class="form-control" 
                id="content" name="content">{{ $post->content }}</textarea>
            </div>
            
        </div>
    </div>
@endsection

