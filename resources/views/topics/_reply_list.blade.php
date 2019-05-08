<div class="mx-md-5">
  @foreach ($replies as $reply)
    <div class="card w-100 mb-2">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <div>
            <a href="{{ route('users.show', $reply->user->id) }}">
              <img src="{{ $reply->user->avatar() }}" alt="" width="32px" height="32px">
            </a>
            <a class="font-weight-bold ml-2" href="{{ route('users.show', $reply->user->id) }}">
              {{ $reply->user->name }}
            </a>
            <span class="ml-2 small text-muted">{{ $reply->created_at->diffForHumans() }}</span>
          </div>
          <div>
            @can('destroy', $reply)
              <a class="text-muted small float-right" href="{{ route('topics.replies.destroy', ['topic' => $topic->id, 'reply' => $reply->id]) }}"
                onclick="if (confirm('确定要删除评论！')) document.getElementById('delete-reply-form-{{ $reply->id }}').submit(); return false;"
              >
                <i class="far fa-trash-alt"></i>
              </a>
              <form class="d-none" action="{{ route('topics.replies.destroy', ['topic' => $topic->id, 'reply' => $reply->id]) }}" method="POST" id="delete-reply-form-{{ $reply->id }}">
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
  @endforeach
</div>

