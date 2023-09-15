@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 800px">
        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif
        <div class="card mb-3" style="font-size: 1.3em">
            <div class="card-body">
                <h4 class="card-title">{{ $article->title }}</h4>
                <div style="font-size: 0.8em" class="text-muted">
                    <b class="text-success">{{$article->user->name}}</b>
                    {{ $article->created_at->diffForHumans() }}
                </div>
                <div class="mb-3">
                    {{ $article->body }}
                </div>
               @auth
                @can('delete-article', $article)
                    <a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-danger btn-sm">Delete</a>
                    <a href="{{ url("/articles/edit/$article->id") }}" class="btn btn-success btn-sm">Edit</a>
                @endcan
               @endauth
            </div>
        </div>
        <hr>
        <ul class="list-group">
            <li class="list-group-item active">
                <b>Comments</b>
                <span class="badge bg-dark">
                    {{ count($article->comments) }}
                </span>
            </li>
            @foreach($article->comments as $comment)
                <li class="list-group-item">
                    {{ $comment->content }}
                   @auth

                   @can('delete-article', $article)
                            <a href="{{ url("/comments/delete/$comment->id")}}"
                            class="btn-close float-end">
                            </a>
                            <div class="small mt-2">
                                By <b>{{ $comment->user->name }}</b>,
                                {{ $comment->created_at->diffForHumans() }}
                            </div>
                       @endcan
                       <b class="text-success">{{ $comment->user->name }}</b>
                   @endauth
                </li>
            @endforeach
        </ul>
        @auth
            <form action="{{ url('/comments/add') }}" method="post">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <textarea name="content"  class="form-control mb-2" placeholder="New Comment"></textarea>
                <input type="submit" value="Add Comment" class="btn btn-warning">
            </form>
        @endauth
    </div>
@endsection
