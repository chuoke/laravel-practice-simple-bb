<nav class="navbar navbar-expand-md navbar-dark bg-primary navbar-static-top mb-3 py-1 shadow app-navbar">
  <div class="container">
    <a href="{{ url('/') }}" class="navbar-brand">
      @include('layouts._logo')
      {{ config('app.name') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#app-navbar" aria-controls="app-navbar" aria-expanded="false" aria-label="Toggle Navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="app-navbar">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item{{ nav_active() }}"><a href="{{ route('topics.index') }}" class="nav-link">话题</a></li>
        <li class="nav-item{{ nav_active(1) }}"><a href="{{ route('categories.show', 1) }}" class="nav-link">分享</a></li>
        <li class="nav-item{{ nav_active(2) }}"><a href="{{ route('categories.show', 2) }}" class="nav-link">教程</a></li>
        <li class="nav-item{{ nav_active(3) }}"><a href="{{ route('categories.show', 3) }}" class="nav-link">问答</a></li>
        <li class="nav-item{{ nav_active(4) }}"><a href="{{ route('categories.show', 4) }}" class="nav-link">公告</a></li>
      </ul>

      <ul class="navbar-nav navbar-right">
        @guest
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">登陆</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link">注册</a>
          </li>
        @else
          <li class="nav-item d-flex align-items-center mr-3" title="新建话题">
            <a href="{{ route('topics.create') }}" class="nav-link">
              <i class="fas fa-plus"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="app-navbar-user-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="{{ Auth::user()->avatar() }}" width="36px" height="36px" alt="" class="img-responsive rounded-circle">
              {{ Auth()->user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="app-navbar-user-dropdown">
              <a href="{{ route('users.show', ['id' => Auth::id()]) }}" class="dropdown-item"><span class="fas fa-home"></span> 个人中心</a>
              <a href="{{ route('users.edit', ['id' => Auth::id()]) }}" class="dropdown-item"><span class="fas fa-cog"></span> 编辑资料</a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item" id="logout">
                <form action="{{ route('logout') }}" method="POST" class="mb-0">
                  {{ csrf_field() }}
                  <button class="btn btn-sm btn-link text-left p-0 no-decoration" type="submit">
                    <span class="fas fa-power-off text-danger"></span> 退出登陆
                  </button>
                </form>
              </a>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
