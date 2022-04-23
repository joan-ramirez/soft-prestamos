@extends('layouts.app')

@section('content')
    <div class="contenedor_size ">
        


        <form class="formulario_auth" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input">
                <label for="email" class="">{{ __('Email Address') }}</label>

                <input placeholder="Correo eléctronico" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input">
                <label for="password" class="">{{ __('Password') }}</label>
                <input id="password" placeholder="Contraseña" type="password" class="@error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="recordar_auth">
                <input class="" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="">
                <button type="submit" class="">
                    {{ __('Login') }}
                </button>
            </div>

        </form>
    </div>
@endsection
