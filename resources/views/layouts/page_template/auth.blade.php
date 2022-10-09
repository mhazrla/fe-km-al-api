<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<div class="main-panel bg-white">
    @include('layouts.navbars.navs.auth')
    @yield('content')
    @include('layouts.footer')
</div>
