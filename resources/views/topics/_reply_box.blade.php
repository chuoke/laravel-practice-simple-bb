<div class="mx-md-5">
  <form action="" method="post">
    @csrf
    <input type="hidden" name="tipic_id" value="{{ $topic->id }}">
    <textarea class="form-control" name="reply" id="reply" cols="30" rows="5" placeholder="你有什么见解，写下来吧"></textarea>
    <button type="submit" class="btn btn-sm btn-primary mt-2 float-right">评 论</button>
  </form>
</div>
