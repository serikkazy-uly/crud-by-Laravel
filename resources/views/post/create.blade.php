@extends('layouts.layout')

@section('content')

    <body>
        <form action="{{ route('post.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="{{ old('title') }}" type="text" class="form-control" id="title" name="title"
                    placeholder="Enter title">
                @error('title')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea value="{{ old('content') }}" class="form-control" id="content" name="content" rows="3"
                    placeholder="Enter content"></textarea>
                @error('content')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image URL</label>
                <input value="{{ old('image') }}" type="text" class="form-control" id="image" name="image"
                    placeholder="Enter image URL">
                @error('image')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach ($categories as $category)
                        <option 
                        {{ old('category_id') ==  $category->id ? 'selected' : ''}}
                        value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tags">Tags</label>
                <select id="tags" multiple class="form-control" name="tags[]">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach

                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>




    </body>

    </html>
@endsection
