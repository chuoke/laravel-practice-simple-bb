@extends('layouts.app')

@section('title', $topic->title)
@section('description', $topic->excerpt)

@section('content')

<div class="row my-5">
  <div class="col-sm-12">
    <div class="mx-md-5">

      <h2 class="text-center">
        {{ $topic->title }}
      </h2>

      <div class="d-flex justify-content-center align-items-center my-4 d-none">
        <a href="{{ route('users.show', $topic->user->id) }}">
          <img class="" src="{{ $topic->user->avatar() }}" alt="" width="32px" height="32px">
        </a>
        <a class="ml-2" href="{{ route('users.show', $topic->user->id) }}">
          <strong>{{ $topic->user->name }}</strong>
        </a>
      </div>

      <div class="">
        <p class="text-center small">
          <span>发布于 {{ $topic->created_at->diffForHumans() }}</span>
          •
          <span> <i class="far fa-comment"></i> {{ $topic->reply_count }}</span>
        </p>
        <p class="text-center">
          <a href="{{ route('categories.show', $topic->category->id) }}">#{{ $topic->category->name }}</a>
        </p>
      </div>

      <div class="mt-4">
        {!! $topic->body !!}
      </div>

      <div class="mt-4">
        <hr>
        <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-sm btn-outline-warning">
          <i class="far fa-edit"></i> 编辑
        </a>
        <a href="" class="btn btn-outline-danger btn-sm ml-2">
          <i class="far fa-trsh-alt"></i> 删除
        </a>
      </div>
    </div>

  </div>
</div>

@endsection
