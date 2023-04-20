@extends('layouts.admin')
@section('title', 'ツイート投稿')

@section('content')
<div class="container">
    
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
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
            <div class="col-md-8 mx-auto">
                <h2>ツイート投稿</h2>
                <form action="{{ route('tweet.post') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection