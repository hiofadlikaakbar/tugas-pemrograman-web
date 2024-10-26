@extends('layout')

@section('content')
    <div class="container">
        <h1>All Contents</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('posts.create') }}" class="btn btn-primary">{{ __('messages.common.create') }}</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="30%">{{ __('messages.posts.title') }}</th>
                    <th width="43%">{{ __('messages.posts.content') }}</th>
                    <th >{{ __('messages.common.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" 
                                class="btn btn-info">{{ __('messages.common.view') }}</a>
                            <a href="{{ route('posts.edit', $post->id) }}" 
                                class="btn btn-warning">{{ __('messages.common.edit') }}</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" 
                                method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('messages.common.delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

