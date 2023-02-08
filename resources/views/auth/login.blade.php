@extends('layouts.app')

@section('content')
<div class="background-log-reg">
    <div class="container p-5">
        <div class="row justify-content-end pt-5">
            <div class="col-md-6">
                <div class="card py-5 px-5 rounded-5 border-0">
                    <div class="pb-4 fs-2"><span class="text_dark_red fw-bold">Registrati su </span><span
                            class="text_green fw-bold">DeliveBoo</span></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right"></label>


                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"></label>


                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                @if (Route::has('password.request'))
                                <a class="btn text_dark_red text-start ps-4 reg" href="{{ route('password.request') }}">
                                    {{ __('Password Dimenticata?') }}
                                </a>
                                @endif

                            </div>

                            <div class="mb-5 row">
                                <div class="offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input text_dark_red" type="checkbox" name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label text_dark_red" for="remember">
                                            {{ __('Ricordami') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5 row mb-0">
                                <div class="offset-md-4">
                                    <button type="submit" class="btn_add rounded-5 fs-5 fw-bold px-4 py-1">
                                        {{ __('Accedi') }}
                                    </button>

                                </div>
                            </div>

                            <div class="row mb-0 text-center text_dark_red">
                                <h5 class="mb-0">Non hai un account?</h5>
                                <a class="btn text_dark_red ps-4 fs-5 reg m-auto" href="{{ route('register') }}">
                                    {{ __('Registrati qui!') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection