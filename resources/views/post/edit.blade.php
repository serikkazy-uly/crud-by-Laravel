@extends('layouts.layout')

@section('content')

    <body>
      <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="3" placeholder="Enter content">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image URL</label>
            <input type="text" class="form-control" id="image" name="image" placeholder="Enter image URL" value="{{ $post->image }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    </body>

    </html>
@endsection
