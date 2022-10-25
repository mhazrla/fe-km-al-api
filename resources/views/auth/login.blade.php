@extends('layouts.app', [
    'namePage' => 'Login page',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'login',
    'backgroundImage' => asset('assets') . '/img/wallpaper-air.jpg',
])

@section('content')
    <div class="content">
        <div class="container">
            {{-- start col --}}
            <div class="col-md-12 ml-auto mr-auto">
                <div class="header bg-gradient-primary py-10 py-lg-2 pt-lg-12">
                    <div class="container">
                        <div class="header-body text-center mb-7">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-9">
                                    <p class="text-lead text-light mt-3 mb-0">
                                        @include('alerts.migrations_check')
                                        @if (\Session::has('message'))
                                            <div class="alert alert-danger">
                                                {{ \Session::get('message') }}
                                            </div>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end col --}}

            {{-- start login --}}
            <div class="col-md-5 ml-auto mr-auto">
                <div class="cards">
                    <form role="form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="card card-login card-plain">
                            <div class="card-header">
                                <div class="logo-container">
                                    <img src="{{ asset('assets/img/tni-logo.png') }}" alt="">
                                </div>
                                <h4 class="text-login">TENTARA NASIONAL INDONESIA</h4>
                            </div>

                            <div class="card-body ">
                                <div class="input-group no-border mb-3  form-control-lg">
                                    <div class="input-group">
                                        <input type="email"name="email"
                                            class="form-control bg-input-login {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('EMAIL') }}" value="{{ old('email', 'admin@nowui.com') }}"
                                            required autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group no-border form-control-lg">
                                    <div class="input-group">
                                        <input type="password" name="password"
                                            class="form-control bg-input-login {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('PASSWORD') }}" value="{{ old('password', 'secret') }}"
                                            required autofocus>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">

                                    <button type="submit" class="btn btn-login btn-dark mb-3">{{ __('LOGIN') }}</button>

                                </div>
                            </div>

                            {{-- <div class="card-footer ">

                                <div class="pull-left">
                                    <h6>
                                        <a href="{{ route('register') }}"
                                            class="link footer-link">{{ __('Create Account') }}</a>
                                    </h6>
                                </div>
                                <div class="pull-right">
                                    <h6>
                                        <a href="{{ route('password.request') }}"
                                            class="link footer-link">{{ __('Forgot Password?') }}</a>
                                    </h6>
                                </div>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
            {{-- end login --}}

        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();
        });
    </script>
@endpush
