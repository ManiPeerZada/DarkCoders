@extends('layouts.app')

@section('content')
<span class="login100-form-title p-b-41">
    {{ __('Register') }}
</span>
    <form class="login100-form validate-form p-b-33 p-t-5" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="wrap-input100 validate-input" data-validate="Enter Name">
            <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Enter Email">
            <input id="email" type="email" class="input100  @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror"
                placeholder="Password" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Enter Confirm Password">
            <input id="password-confirm" type="password" class="input100 @error('password-confirm') is-invalid @enderror"
                placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
            @error('password-confirm')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
        </div>
        <div class="container-login100-form-btn m-t-32">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>

        </div>
    </form>








    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
