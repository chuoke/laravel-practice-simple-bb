@extends('layouts.app')

@section('title', $user->name . '的个人中心')

@section('content')
  <div class="row">
    <div class="col-lg-3 col-md-3 hidden-xs user-info">
      <div class="card">
        <img src="{{ $user->avatar() }}" width="100%" alt="{{ $user->name . '的头像' }}">
        <div class="card-body">
          <h5><strong>个人简介</strong></h5>
          <p>{{ $user->introduction }}</p>
          <hr>
          <h5><strong>注册于</strong></h5>
          <p>{{ $user->created_at->diffForHumans() }}</p>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-9">
      <div class="card">
        <div class="card-body">
          <h4 class="mb-0">
            {{ $user->name }} <small class="text-muted">{{ $user->email }}</small>
          </h4>
        </div>
      </div>
      <div class="card mt-3">
        <div class="card-body">
          <ul class="nav nav-tabs">
            <li class="nav-item"><a href="#" class="nav-link active">Ta 的话题</a></li>
            <li class="nav-item"><a href="" class="nav-link">Ta 的回复</a></li>
          </ul>
          @include('users._topics', ['topics' => $topics])
        </div>
      </div>
    </div>
  </div>
@endsection
