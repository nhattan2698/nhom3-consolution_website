@extends('layout.master')

@section('title', config("app.name"))
@section('bg', asset('static-html/assets/img/home-bg.jpg'))
@section('h1', setting('site.title'))
@section('desc', setting('site.description'))

@section('content')
<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <h2 style="text-align: center;color: blue;">Tin tức mới nhất</h2>
            @foreach($posts as $post)
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{ route('posts.show', $post->id) }}">
                    <h2 class="post-title">{{ $post->title }}</h2>
                    <h3 class="post-subtitle">{{ Str::limit($post->excerpt, 50, '...') }}</h3>
                </a>
                <p class="post-meta">
                    Posted on {{ $post->created_at }}
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            @endforeach
        </div>
    </div>
</div>
@endsection