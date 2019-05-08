@forelse ($replies as $reply)
  <div class="card w-100 mb-2">
    <div class="card-body">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <div>
          <span class="mr-2 text-muted">{{ $reply->created_at->diffForHumans() }}</span>
          <span class="mr-2">回复</span>
          <a class="font-weight-bold" href="{{ route('topics.show', $reply->topic->id) }}">{{ $reply->topic->title }}</a>
        </div>
        <div>
          @can('destroy', $reply)
            <a class="text-muted small float-right" for="#delete-reply-form"
              onclick="if (confirm('确定要删除评论！')) document.getElementById('delete-reply-form-{{ $reply->id }}').submit(); return false;"
            >
              <i class="far fa-trash-alt"></i>
            </a>
            <form class="d-none" action="{{ route('topics.replies.destroy', ['topic' => $reply->topic->id, 'reply' => $reply->id]) }}" method="POST" id="delete-reply-form-{{ $reply->id }}">
              @csrf
              @method('DELETE')
            </form>
          @endcan
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

