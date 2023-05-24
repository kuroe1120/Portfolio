@extends('layouts.admin')
@section('title', 'ツイート一覧')

@section('content')
  <div class="container">
    
    <!-- ▼twitter風ここから -->
  <div class="twitter__container">
    <!-- タイトル -->
  @component('component.navbar')
  @endcomponent

    <!-- ▼タイムラインエリア scrollを外すと高さ固定解除 -->
    <div class="twitter__contents scroll">
        
    @foreach($posts as $tweet)

      <!-- 記事エリア -->
      <div class="twitter__block">
        <figure>
          <img src="{{ secure_asset('image/icon.jpg') }}" />
        </figure>
        <div class="twitter__block-text">
          <div class="name">{{$tweet->name}}</div>
          <div class="date">{{($tweet->created_at) }}</div>
          <div class="text">
            {{($tweet->body)}}<br>
          </div>
          <div class="twitter__icon">
            <span class="twitter-bubble"></span>
            <span class="twitter-loop"></span>
            <span class="twitter-heart"></span>
          </div>
        </div>
      </div>
      
    @endforeach
    
    <!--　▲タイムラインエリア ここまで -->
  </div>
  
  <div class="row">
            <div class="col-md-8 mx-auto">
                <p>ツイート投稿</p>
                <form action="{{ route('tweet.store') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <div class="col-md-20">
                            <textarea class="form-control" name="body" rows="2">{{ old('body') }}</textarea>
                        </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
  <!--　▲twitter風ここまで -->

@endsection