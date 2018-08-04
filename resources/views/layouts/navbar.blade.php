<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel mb-3">
        <div class="container">
          <a class="navbar-brand" id="brand" href="{{ url('/') }}"><img src="{{ asset('images/logo/twitter_brand.png') }}"> Twitter</a>

                <ul class="navbar-nav mr-auto">
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li> -->
                    @else
                    <li class="nav-item">
                        <a class="btn btn-circle btn-blue" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                  </li>
                  @endguest
                </ul>
        </div>
    </nav>
