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
  @endforeach
</div>

