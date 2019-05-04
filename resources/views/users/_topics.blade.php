@if (count($topics))
  <ul class="list-group mt-4 border-0">
    @foreach ($topics as $topic)
      <li class="list-group-item border-left-0 border-right-0{{ $loop->first ? ' border-top-0' : '' }}">
        <a href="{{ $topic->link() }}">{{ $topic->title }}</a>
        <span class="float-right text-muted small">
          {{ $topic->reply_count }} 回复
          <span> • </span>
          {{ $topic->created_at->diffForHumans() }}
        </span>
      </li>
    @endforeach
  </ul>
  <div class="mt-4">
    {!! $topics->render() !!}
  </div>
@else
  <p>暂无数据 (ง •_•)ง</p>
@endif
