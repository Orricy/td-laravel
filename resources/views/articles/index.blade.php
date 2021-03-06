@extends('layouts.app')

@section('content')
<div class="panel-heading">Dashboard</div>

<div class="panel-body">
    Liste des articles
    <a href="{{ route('articles.create') }}" class="btn btn-primary btn-lg btn-block" role="button">Poster un article</a>
    @foreach($posts as $post)
        <h2>{{$post->title}}</h2>
        <p>{{$post->description}}</p>
        <a href="{{route('articles.show', $post->id)}}">
            <button class="btn btn-info">
                Voir l'article
            </button>
        </a>
        @if(Auth::check() && Auth::user()->is_admin == 1)
            <a href="{{route('articles.edit', $post->id)}}">
                <button class="btn btn-success">
                    Editer l'article
                </button>
            </a>
            <span class="delete-article-btn">
            {{ Form::model($post, array('route' => array('articles.destroy', $post->id), 'method' => 'DELETE',)) }}
                {!! Form::submit('Supprimer', array('class' => 'btn btn-danger')) !!}
            {{ Form::close() }}
            </span>
        @endif
    @endforeach
</div>
@endsection
