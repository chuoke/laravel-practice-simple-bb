<div class="mx-md-5">
  @include('shared._form_errors')
  <form action="{{ route('topics.replies', ['id' => $topic->id]) }}" method="post">
    @csrf
    <textarea class="form-control" name="content" id="content" cols="30" rows="5" placeholder="你有什么见解，写下来吧">{{ old('content') }}</textarea>
    <button type="submit" class="btn btn-sm btn-primary mt-2 float-right">评 论</button>
  </form>
</div>
