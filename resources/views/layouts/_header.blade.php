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
        <li class="nav-item">
          <a href="#" class="nav-link">登陆</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">注册</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
