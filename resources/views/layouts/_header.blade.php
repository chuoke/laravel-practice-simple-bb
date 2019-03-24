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
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="app-navbar-user-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="https://iocaffcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" width="36px" height="36px" alt="" class="img-responsive rounded-circle">
              {{ Auth()->user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="app-navbar-user-dropdown">
              <a href="#" class="dropdown-item"><span class="fas fa-home"></span> 个人中心</a>
              <a href="#" class="dropdown-item"><span class="fas fa-cog"></span> 编辑资料</a>
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
