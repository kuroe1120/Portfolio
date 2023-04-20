@extends('layouts.admin')
@section('title', 'ユーザー一覧')

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
        </div>
    </div>

@endsection