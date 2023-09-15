@extends('layouts.app')
@section('content')

    <div class="container" style="max-width: 800px">

        @if($errors->any())
            <div class="alert alert-warning">
                @foreach($errors->all() as $err)
                    {{ $err }}
                @endforeach
            </div>
        @endif

        <form action="" method="post">
            @csrf
            <div class="mb-2">
                <label>Title</label>
                <input type="hidden" class="form-control" name="title" value="{{ $article->id }}">
                <input type="hidden" class="form-control" name="user_id" value="{{ $article->user_id }}">
                <input type="text" class="form-control" name="title" value="{{ $article->title }}">
            </div>
            <div class="mb-2">
                <label>Body</label>
                <textarea name="body" class="form-control">{{ $article->body }}</textarea>
            </div>
            <div class="mb-2">
                <label>Category</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                    @if ($category->id == $article->category_id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary">Update Article</button>

        </form>

    </div>
    @endsection
