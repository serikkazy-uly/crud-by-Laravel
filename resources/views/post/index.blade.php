@extends('layouts.layout')

@section('content')

    <body>
        <div>
            <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">Add one</a>
        </div>

        @foreach ($posts as $post)
            <div>
                
                <a href="{{ route('post.show', $post->id) }}">
                    {{ $post->id }}
                    . {{ $post->title }}
                </a>
            </div>
        @endforeach

    </body>

    </html>
@endsection
