@if (count($topics))
  <ul class="list-unstyled">
    @foreach ($topics as $topic)
      <li class="media">
        <div class="media-left mr-2">
          <a href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}">
            <img class="rounded border border-light img-thumbnail" src="{{ $topic->user->avatar() }}" width="32px" height="32px">
          </a>
        </div>
        <div class="media-body">
          <div class="media-heading">
            <a href="{{ $topic->link() }}" title="{{ $topic->title }}">
              {{ $topic->title }}
            </a>
            <a class="float-right" href="{{ $topic->link() }}">
              <span class="badge badge-light badge-pill text-muted">{{ $topic->reply_count }}</span>
            </a>
          </div>

          <small class="media-body meta text-secondary">
            <a class="text-secondary" href="{{ route('categories.show', [$topic->category->id]) }}" title="{{ $topic->category->name }}">
              <i class="far fa-folder"></i>
              {{ $topic->category->name }}
            </a>

            <span> • </span>

            <i class="far fa-user"></i>
            <a class="text-secondary" href="{{ route('users.show', [$topic->user->id]) }}">
              {{ $topic->user->name }}
            </a>
            <span> • </span>

            <i class="far fa-clock"></i>
            <span class="timeago" title="最后活跃：{{ $topic->updated_at }}">{{ $topic->updated_at->diffForHumans() }}</span>
          </small>
        </div>
      </li>

      @if (!$loop->last)
        <hr class="border-light">
      @endif
    @endforeach
  </ul>

@else

<div class="empty-block">暂无数据 (ಥ _ ಥ)</div>

@endif
