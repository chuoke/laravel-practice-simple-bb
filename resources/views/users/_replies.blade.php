@forelse ($replies as $reply)
  <div class="card w-100 mb-2">
    <div class="card-body">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <div>
          <span class="mr-2 text-muted">{{ $reply->created_at->diffForHumans() }}</span>
          <span class="mr-2">回复</span>
          <a class="font-weight-bold" href="{{ route('topics.show', $reply->topic->id) }}">{{ $reply->topic->name }}</a>
        </div>
        <div>
          <a class="text-muted small float-right" for="#delete-reply-form"><i class="far fa-trash-alt"></i></a>
          <form class="d-none" action="" method="POST" id="delete-reply-form">
            @csrf
            @method('DELETE')
            <input type="hidden" name="reply_id" value="{{ $reply->id }}">
          </form>
        </div>
      </div>

      <div class="">
        {{ nl2br($reply->content) }}
      </div>
    </div>
  </div>
@empty
  <p>暂无数据 (ง •_•)ง</p>
@endforelse

<div class="mt-4">
  {{ $replies->appends(Request::except('page'))->links() }}
</div>

