@extends('layouts.app')

@section('title', (isset($category) ? $category->name : '') . '话题列表')

@section('content')

<div class="row">
  <div class="col-md-9">
    @if (isset($category))
      <div class="card mb-3">
        <div class="card-body">
          <h3 class="text-center">{{ $category->name }}</h3>
          <p class="text-center">{{ $category->description }}</p>
        </div>
      </div>
    @endif

    <div class="card">
      <div class="card-header bg-transparent">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a href="#" class="nav-link active">最后回复</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">最新发布</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        @include('topics._topic_list', ['topics' => $topics])

        <div class="mt-5">
          {!! $topics->appends(Request::except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    @include('topics._sidebar')
  </div>
</div>

@endsection
