<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          @if (auth()->user())
            <span>{{ auth()->user()->name }}</span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
          <a href="{{ route('admin.profile') }}" class="dropdown-item dropdown-footer">Profile</a>
          <a href="{{ route('admin.change.password') }}" class="dropdown-item dropdown-footer">Change password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item dropdown-footer" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>