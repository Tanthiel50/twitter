{{-- resources/views/post/show.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            {{ $post->title }}
        </div>
        <img src="{{ $post->image }}" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">{{ $post->content }}</p>
            <p class="card-text"><small class="text-muted">{{ $post->updated_at->format('d-m-Y') }}</small></p>
            <p class="card-text"><small class="text-muted">{{ $post->tags }}</small></p>
        </div>
    </div>
    @if (auth()->user()->id == $post->user_id)
    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-secondary">Éditer</a>
    <form action="{{route('post.destroy', $post)}}" method="post">
        @csrf
        @method("delete")
        <button class="btn btn-danger" type="submit">Supprimer</button>
    </form>
    @endif
    @if (auth()->user()->role_id == 2)
    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-secondary">Éditer</a>
    <form action="{{route('post.destroy', $post)}}" method="post">
        @csrf
        @method("delete")
        <button class="btn btn-danger" type="submit">Supprimer</button>
    </form>
    @endif
</div>
@endsection