@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h3 class="mb-0">
          @if($topic->id)
            编辑话题： <small>{{ $topic->title }}</small>
          @else
            创建话题
          @endif
        </h3>
      </div>

      <div class="card-body">
        @if($topic->id)
          <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
            <input class="form-control" type="text" name="title" id="title-field" placeholder="请填写标题" value="{{ old('title', $topic->title ) }}" required/>
          </div>

          <div class="form-group">
            <select name="category_id" id="category_id" required class="form-control">
              <option value="" hidden disabled selected>请选择分类</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <textarea name="body" id="body-field" placeholder="请填写内容" class="form-control" rows="5" required>{{ old('body', $topic->body ) }}</textarea>
          </div>

          <div class="w-100 text-center">
            <button type="submit" class="btn btn-primary">保 存</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
