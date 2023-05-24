@extends('layouts.admin')
@section('title', 'ユーザー一覧')

@section('content')
    <div class="container">
        
        <div class="twitter__container">
    <!-- タイトル -->
    @component('component.navbar')
    @endcomponent

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
              　    @if(in_array ($user->id , $follow_ids))
              　    <th><a href="{{ url('unfollow/'.$user->id) }}" class="btn btn-danger btn-sm">unfollow</a></th>
              　    @else
                    <th><a href="{{ url('follow/'.$user->id) }}" class="btn btn-primary btn-sm">follow</a></th>
                   @endif
            　　@else
            　　    <th><a href="{{ url('user/') }}" class="btn btn-success btn-sm">編集</a></th>
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