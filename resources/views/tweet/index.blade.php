@extends('layouts.admin')
@section('title', 'ツイート一覧')

@section('content')
    <div class="container">
    
        <!--<div class="row">-->
        <!--    <h2>ツイート一覧</h2>-->
        <!--</div>-->
        <!--<div class="row">-->
        <!--    <div class="col-md-8">-->
        <!--        <form action="{{ route('tweet.index') }}" method="get">-->
        <!--            <div class="form-group row">-->
        <!--                <label class="col-md-2">本文</label>-->
        <!--                <div class="col-md-8">-->
        <!--                    <input type="text" class="form-control" name="cond_body" value="{{ $cond_body }}">-->
        <!--                </div>-->
        <!--                <div class="col-md-2">-->
        <!--                    @csrf-->
        <!--                    <input type="submit" class="btn btn-primary" value="検索">-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </form>-->
        <!--    </div>-->
        <!--</div>-->
        
    <!--    <div class="row">-->
            
    <!--    <div class="row">-->
    <!--        <div class="list-news col-md-12 mx-auto">-->
    <!--            <div class="row">-->
    <!--                <table class="table table-dark">-->
    <!--                    <thead>-->
    <!--                        <tr>-->
    <!--                            <th width="10%">ID</th>-->
    <!--                            <th width="20%">ユーザーID</th>-->
    <!--                            <th width="50%">本文</th>-->
    <!--                        </tr>-->
    <!--                    </thead>-->
    <!--                    <tbody>-->
    <!--                        @foreach($posts as $tweet)-->
    <!--                            <tr>-->
    <!--                                <th>{{ $tweet->id }}</th>-->
    <!--                                <td>{{ Str::limit($tweet->user_id, 100) }}</td>-->
    <!--                                <td>{{ Str::limit($tweet->body, 250) }}</td>-->
    <!--                            </tr>-->
    <!--                        @endforeach-->
    <!--                    </tbody>-->
    <!--                </table>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
    <!-- ▼twitter風ここから -->
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

    </div>
    
    <!--　▲タイムラインエリア ここまで -->
  </div>
  <!--　▲twitter風ここまで -->

@endsection