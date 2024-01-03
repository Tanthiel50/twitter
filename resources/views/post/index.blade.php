@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Quacks</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($posts->sortByDesc('updated_at') as $post)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ $post->image }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="{{ route('post.show', $post->id) }}" class="stretched-link">{{ $post->title }}</a>
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="card-text"><small class="text-muted">{{ $post->tags }}</small></p>
                        <p class="card-text"><small class="text-muted">{{ $post->updated_at->format('d-m-Y') }}</small></p>
                        <p class="card-text"><small class="text-muted">{{ $post->user->pseudo }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-between align-items-center my-4">
        <div>{{ $posts->onEachSide(1)->links() }}</div>
    </div>
</div>
@endsection

