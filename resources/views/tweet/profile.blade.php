@extends('layouts.admin')
@section('title', 'プロフィール編集')

@section('content')
<div class="container">
    
    <div class="twitter__container">
    <!-- タイトル -->
    @component('component.navbar')
    @endcomponent
    
    <div class="twitter__contents scroll">
        
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール変更</h2>
                <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
                    
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
                    <input type="file" name="image">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
        
    </div>
    
@endsection