@extends('layouts.app')

@section('content')
<span class="login100-form-title p-b-41">
    {{__('Login')}}
</span>
    <form class="login100-form validate-form p-b-33 p-t-5" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="wrap-input100 validate-input" data-validate="Enter Email">
            <input id="email" type="email" class="input100  @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

            @error('email')
                <span style="color: red">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" placeholder="Password" name="password"
                required autocomplete="current-password">

            @error('password')
                <span style="color: red">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
        </div>
        <div class="container-login100-form-btn m-t-32">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

        </div>
    </form>
@endsection
