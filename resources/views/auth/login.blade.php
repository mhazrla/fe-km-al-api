@extends('layouts.app', [
    'namePage' => 'Login page',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'login',
    'backgroundImage' => asset('assets') . '/img/wallpaper-air.jpg',
])

@section('content')
    <div class="content">
        <div class="container">
            <div class="col-md-12 ml-auto mr-auto">
                <div class="header bg-gradient-primary py-10 py-lg-2 pt-lg-12">
                    <div class="container">
                        <div class="header-body text-center mb-7">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-9">
                                    <p class="text-lead text-light mt-3 mb-0">
                                        @include('alerts.migrations_check')
                                    </p>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- start login --}}
            <div class="col-md-5 ml-auto mr-auto">
                <div class="cards">
                    <form role="form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="card card-login card-plain">
                            <div class="card-header ">
                                <div class="logo-container">
                                    <img src="{{ asset('assets/img/logo-tni.png') }}" alt="">
                                </div>
                                <h4 class="text-login">TNI - ANGKATAN LAUT</h4>
                            </div>

                            <div class="card-body ">
                                <div class="input-group no-border mb-3  form-control-lg">
                                    <div class="input-group">
                                        <input type="email" name="email" id="email"
                                            class="form-control bg-input-login {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('EMAIL') }}" value="{{ old('email', 'admin@nowui.com') }}"
                                            required autofocus autocomplete="email">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        {{-- @error('email')
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
                                </div>
                                <div class="input-group no-border form-control-lg">
                                    <div class="input-group">
                                        <input type="password" name="password" id="password"
                                            class="form-control bg-input-login {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('PASSWORD') }}" value="{{ old('password', 'secret') }}"
                                            required autofocus autocomplete="current-password">

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                        {{-- @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
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
