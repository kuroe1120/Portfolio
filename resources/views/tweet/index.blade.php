@extends('layouts.admin')
@section('title', 'ツイート一覧')

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
            <h2>ツイート一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('tweet.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_body" value="{{ $cond_body }}">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="row">
            
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">ユーザーID</th>
                                <th width="50%">本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $tweet)
                                <tr>
                                    <th>{{ $tweet->id }}</th>
                                    <td>{{ Str::limit($tweet->user_id, 100) }}</td>
                                    <td>{{ Str::limit($tweet->body, 250) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection