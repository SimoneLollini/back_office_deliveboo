@extends('layouts.app')

@section('content')
    <div class="background-log-reg">
        <div class="container px-5 pt-5">
            <div class="row justify-content-end h-75">
                <div class="col-md-6">
                    <div class="card px-5 py-5 rounded-5 border-0">
                        <div class=" pb-3 fs-2"><span class="text_dark_red fw-bold">Registrati su </span><span
                                class="text_green fw-bold">DeliveBoo</span></div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}"
                                class="d-flex flex-column justify-content-between gap-1">
                                @csrf

                                <div class="row">
                                    <label for="name" class="text-dark-red mb-2">Inserisci il nome</label>


                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="nome">
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
                                        value="{{ old('email') }}" required autocomplete="email" placeholder="email">
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
                                        placeholder="conferma password">
                                    <small class="text_dark_red text-end">Campo obbligatorio</small>

                                </div>

                                <div class="pt-4 row mb-0">
                                    <div class="offset-md-4">
                                        <button type="submit" class="btn btn_add">
                                            {{ __('Registrati') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
