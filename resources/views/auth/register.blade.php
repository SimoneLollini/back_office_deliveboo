@extends('layouts.app')

@section('content')
    <div class="background-log-reg 100vh">
        <div class="container px-3 px-sm-5 py-5 h-100">
            <div class="row justify-content-end h-100">
                <div class="col-md-7 col-lg-6 h-100">
                    <div class="card px-4 py-5 rounded-5 border-0 h-100">
                        <div class=" pb-3 fs-2"><span class="text_dark_red fw-bold">Registrati su </span><span
                                class="text_green fw-bold">DeliveBoo</span></div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}"
                                class="d-flex flex-column justify-content-between gap-1">
                                @csrf

                                <div class="row">
                                    <label for="name" class="text-dark-red mb-2">Inserisci nome e cognome</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror lh-0" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Mario Rossi">
                                    <small class="text_dark_red text-end">Campo obbligatorio</small>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="row">
                                    <label for="email" class="text-dark-red mb-2">Inserisci la mail</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="mariorossi@example.com">
                                    <small class="text_dark_red text-end">Campo obbligatorio</small>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="row">
                                    <label for="password" class="text-dark-red mb-2">Inserisci la password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="password">
                                    <small class="text_dark_red text-end">Campo obbligatorio</small>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="row">
                                    <label for="password-confirm" class="text-dark-red mb-2">Conferma la password</label>


                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="password">
                                    <small class="text_dark_red text-end">Campo obbligatorio</small>

                                </div>

                                <div class="row py-3 mb-0">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn_add rounded-5 fs-5 fw-bold px-4 py-1">
                                            {{ __('Registrati') }}
                                        </button>

                                    </div>
                                </div>

                                <div class="row mb-0 text-center text_dark_red">
                                    <h5 class="mb-0">Hai già un account?</h5>
                                    <a class="btn text_dark_red ps-4 fs-5 reg m-auto" href="{{ route('login') }}">
                                        {{ __('Accedi qui!') }}
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
