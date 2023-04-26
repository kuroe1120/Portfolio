@extends('layouts.admin')
@section('title', 'ユーザー一覧')

@section('content')
    <div class="container">
        <!--<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('tweet.index') }}">ツイート一覧</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tweet.create') }}">ツイート投稿</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tweet.user') }}">ユーザー一覧</a>
                </li>
            </ul>
        </div>
    </nav>    
        <div class="row">
            <h2>ユーザー一覧</h2>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-white">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">名前</th>
                                <th width="10%"></th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th>{{ $user->id }}</th>
                                    <th>{{ $user->name }}</th>
                                    
                                    @if(Auth::user()->id!= $user->id)
                                    <th><a href="{{ url('tweet/follow/'.$user->id) }}" class="btn btn-primary btn-sm">follow</a></th>
                                    <th><a href="{{ url('tweet/unfollow/'.$user->id) }}" class="btn btn-danger btn-sm">unfollow</a></th>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>-->
        
        <div class="twitter__container">
    <!-- タイトル -->
    <div class="twitter__title">
      <!--<span class="twitter-logo"></span>-->
            
    
                    <span><a class="" href="{{ route('tweet.index') }}">ツイート一覧</a></span>
                    <span><a class="" href="{{ route('tweet.create') }}">ツイート投稿</a></span>
                    <span><a class="" href="{{ route('tweet.user') }}">ユーザー一覧</a></span>
    </div>

    <!-- ▼タイムラインエリア scrollを外すと高さ固定解除 -->
    <div class="twitter__contents scroll">
        
        @foreach($users as $user)

      <!-- 記事エリア -->
      <div class="twitter__block">
        <figure>
          <img src="{{ secure_asset('image/icon.jpg') }}" />
        </figure>
        <div class="twitter__block-text">
          <div class="name">{{ $user->name }}</div>
            {{$user->follow_count}}<span class="pagado">フォロー</span>
            {{$user->follower_count}}<span class="pagado">フォロワー</span>
          　<div class="date">
              　@if(Auth::user()->id!= $user->id)
                    <th><a href="{{ url('tweet/follow/'.$user->id) }}" class="btn btn-primary btn-sm">follow</a></th>
                    <th><a href="{{ url('tweet/unfollow/'.$user->id) }}" class="btn btn-danger btn-sm">unfollow</a></th>
            　　@else
            　　    <th><a href="{{ url('tweet/profile/') }}" class="btn btn-success btn-sm">編集</a></th>
            　　@endif
            </div>
          <div class="twitter__icon">
            <span class="twitter-bubble"></span>
            <span class="twitter-loop"></span>
            <span class="twitter-heart"></span>
          </div>
        </div>
      </div>
    @endforeach
        
    </div>

@endsection