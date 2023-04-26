@extends('layouts.admin')
@section('title', 'プロフィール編集')

@section('content')
<div class="container">
    
    <div class="twitter__container">
    <!-- タイトル -->
    <div class="twitter__title">
      <!--<span class="twitter-logo"></span>-->
            
    
                    <span><a class="" href="{{ route('tweet.index') }}">ツイート一覧</a></span>
                    <span><a class="" href="{{ route('tweet.create') }}">ツイート投稿</a></span>
                    <span><a class="" href="{{ route('tweet.user') }}">ユーザー一覧</a></span>
    </div>
    
    <div class="twitter__contents scroll">
        
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ユーザー名変更</h2>
                <form action="{{ route('tweet.update') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <div class="col-md-20">
                            <label for="name">名前</label>
                            <input type="text" id="name" name="name" requiredminlength="4" maxlength="8" size="10" value="{{ $user->name }}">
                        </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
        
    </div>
    
@endsection