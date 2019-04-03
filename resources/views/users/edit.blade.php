@extends('layouts.app')

@section('title', '编辑资料')

@section('content')
  <div class="container">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header">
          <h4>
            <i class="fa fa-edit"></i> 编辑个人资料
          </h4>
        </div>
        <div class="card-body">
          @include('shared._form_errors')
          <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <div class="form-group">
              <label for="name">用户名</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}">
            </div>
            <div class="form-group">
              <label for="email">邮 箱</label>
              <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}">
            </div>
            <div class="form-group">
              <label for="introduction">简介</label>
              <textarea type="text" class="form-control" name="introduction" id="introduction" rows="3">{{ old('introduction', $user->introduction) }}</textarea>
            </div>
            <div class="form-group">
              <label for="avatar">头像</label>
              <input type="file" class="form-control" name="avatar" id="avatar" value="{{ old('avatar', $user->avatar) }}">
              @if ($user->avatar)
                <br>
                <img class="rounded" src="{{ $user->avatar }}" alt="" width="200px">
              @endif
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">保存</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
