@extends('layouts.auth')

@section('content')
<div id="auth">
    <div class="card mx-auto text-center">
        <div class="card-header">
            <span class="logo-title text-center">LOGIN</span>

        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin-login') }}">
                @csrf

                <label for="email">Email</label>
                <div class="input-group form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <label for="password">Password</label>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <div class="col-md">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md">
                        <button type="submit" class="btn">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection