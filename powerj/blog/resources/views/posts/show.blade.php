@extends('layout')

@section('content')
<div class="col-md-8 blog-main">
    <h1> {{$post->title}} </h1>

    @if(count($post->tags))
        <ul>
            @foreach ($post->tags as $tag)
                <a href="/posts/tags/{{$tag->name}}"><li>{{$tag->name}}</li></a>
            @endforeach
        </ul>
    @endif

    {{$post->body}}
    <hr>
    <div class="comments">
        <ul class="list-group">
                @foreach ($post->comments as $comment)
                <li class="list-group-item">
                    <strong>
                        {{ $comment->created_at->diffForHumans()  }}: &nbsp;
                    </strong>
                        {{$comment->body}}
                </li>
                @endforeach
        </ul>
    </div>

    <hr>

    <div class="card">
        <div class="card-block">
            <form method="POST" action="/posts/{{$post->id}}/comments">
                {{-- {{method_field('PATCH')}} --}}
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" placeholder="Your Comment" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>

            @include ('layouts.errors')
        </div>
    </div>
</div>
@endsection