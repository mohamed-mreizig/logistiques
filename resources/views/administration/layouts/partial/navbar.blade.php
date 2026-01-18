<nav
class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
>
<div class="container-fluid">
  <nav
    class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
  >

  </nav>

  <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

 

    <li class="nav-item topbar-user dropdown hidden-caret">
      <a
        class="dropdown-toggle profile-pic"
        data-bs-toggle="dropdown"
        href="#"
        aria-expanded="false"
        {{-- style="background-color: lightgray;" --}}
      >
     
     {{ Auth::user()->name }}
      </a>
      <ul class="dropdown-menu dropdown-user animated fadeIn">
        <div class="dropdown-user-scroll scrollbar-outer">
          <li>
            <div class="user-box">
              <div class="avatar-lg">
                <img
                  src="{{asset('image/2.png')}}"
                  alt="image profile"
                  class="avatar-img rounded"
                />
              </div>
              <div class="u-text">
                <h4>{{ Auth::user()->name }}</h4>
                <p class="text-muted">{{ Auth::user()->email }}</p>
                <a
                  href="{{ route('profile.edit') }}"
                  class="btn btn-xs btn-secondary btn-sm"
                  >View Profile</a
                >
              </div>
            </div>
          </li>
          <li>
            <div class="dropdown-divider"></div>
            {{-- <a class="dropdown-item" href="{{ route('profile.edit') }} ">Profile</a>
            <div class="dropdown-divider"></div> --}}
            {{-- <a class="dropdown-item" href="#">Account Setting</a> --}}
            {{-- <div class="dropdown-divider"></div> --}}
            <form method="POST" action="{{ route('logout') }}">
              @csrf
            <a class="dropdown-item" href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">Logout</a>
                                         </form>
          </li>
        </div>
      </ul>
    </li>
  </ul>
</div>
</nav>
</div>