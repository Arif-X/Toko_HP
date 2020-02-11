@extends('layouts.auth')

@section('content')
<div id="auth">
    <div class="card mx-auto text-center">
        <div class="card-header">
            <span class="logo-title text-center di">REGISTER</span>

        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <label for="name">Nama Lengkap</label>
                <div class="form-group">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <label for="email">Email</label>
                <div class="input-group form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <label for="password">{{ __('Password') }}</label>
                <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>

                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="btn">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection