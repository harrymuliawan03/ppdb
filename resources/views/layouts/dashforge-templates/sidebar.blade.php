<aside class="aside aside-fixed">
    <div class="aside-header">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo-smk.png') }}" alt="logo" width="50">
            {{-- <h1>SMK M3</h1> --}}
        </a>
        <a href="" class="aside-menu-link">
            <i data-feather="menu"></i>
            <i data-feather="x"></i>
        </a>
    </div>
    <div class="aside-body ps ps--active-y">
        <div class="aside-loggedin">
            <div class="aside-loggedin-user">
                <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2"
                    data-toggle="collapse">
                    <h6 class="tx-semibold mg-b-0">{!! Auth::user()->name !!}</h6>
                    <i data-feather="chevron-down"></i>
                </a>
                <p class="tx-color-03 tx-12 mg-b-0">{!! @Auth::user()->roles[0]->name !!}</p>
            </div>
            <div class="d-flex align-items-center justify-content-start">
                <div class="aside-alert-link">
                    <a class="{{ Request::is('profile*') ? 'text-primary' : '' }}" href="{!! route('profile') !!}">
                        <i data-feather="user"></i>
                    </a>
                    <a href="{!! url('/logout') !!}" data-toggle="tooltip" title="Sign out"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i data-feather="log-out"></i>
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
        <ul class="nav nav-aside">
            @include('layouts.menu')
        </ul>
    </div>
</aside>
