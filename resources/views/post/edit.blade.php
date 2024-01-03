{{-- resources/views/post/edit.blade.php --}}

@extends('layouts.app')

@section('title', 'Éditer le Post')

@section('content')
<main class="container">
    <h1>Éditer le Post</h1>

    <div class="row">
        <form action="{{ route('post.update', $post) }}" method="POST" class="col-md-8 mx-auto">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="content">Contenu du post</label>
                <textarea id="content" name="content" required class="form-control" rows="5">{{ $post->content }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="image">Image du post</label>
                <input type="text" id="image" name="image" required class="form-control" value="{{ $post->image }}">
            </div>

            <div class="form-group mb-3">
                <label for="tags">Tags du post</label>
                <input type="text" id="tags" name="tags" required class="form-control" value="{{ $post->tags }}">
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</main>
@endsection
