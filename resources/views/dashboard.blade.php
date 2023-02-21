@extends('layouts.admin')

@section('content')
    @if ($user_restaurant)
        <div class="container p-3">
            <div class="p-5">

                <div class="text-center d-flex align-items-center">
                    <h1 class="text-dark-red text-center"><strong>Benvenuto nel pannello di amministrazione</strong></h1>
                    <img class="w-25 ms-auto" src="{{ asset('img/deliveboo-logo.png') }}" alt="">
                </div>


            </div>

            <div class="row align-items-center card p-5 rounded-5 border-0">

                @include ('partials.message')
                <div class="col-4 text-center">
                    <img src="{{ asset('storage/' . $user_restaurant->restaurant_image) }}"
                        alt="{{ $user_restaurant->restaurant_image }}" class="img-fluid" style="height: 240px">
                </div>

                <div class="col-8 d-flex flex-column text-dark-red">

                    <h2 class="my-3"> Nome Ristorante: {{ $user_restaurant->name }} </h2>

                    <p> <strong>Tipologia cucina:</strong>
                        @foreach ($user_restaurant->types as $index => $type)
                            {{ $type->name }} |
                        @endforeach


                    <p> <strong>Numero di telefono:</strong> {{ $user_restaurant->phone }} </p>

                    <p> <strong>Partita iva del tuo ristorante:</strong> {{ $user_restaurant->piva }} </p>

                    <p> <strong>Il tuo indirizzo:</strong> {{ $user_restaurant->address }}</p>

                </div>

                <a href="{{ route('admin.restaurants.edit', $user_restaurant->id) }}" type="button"
                    class='btn btn_edit btn_fit ms-auto'>Modifica
                    dati ristorante</a>
            </div>
        </div>
    @else
        <div class="background-log-reg  100vh">
            <div class="container px-3 px-sm-5 py-5 h-100">
                <div class="row justify-content-start h-100">
                    <div class="col-md-7 col-lg-6 h-100">
                        <div class="card px-4 py-5 rounded-5 border-0 h-100">
                            <div class=" pb-3 fs-2"><span class="text_dark_red fw-bold">Crea il tuo ristorante</span></div>

                            <div><span class="text_green fw-bold">Puoi registrare un solo ristorante per ogni account</span>
                            </div>

                            @include('partials.error')
                            <div class="card-body">
                                <form action="{{ route('admin.restaurants.store') }}" method="post"
                                    class="d-flex flex-column justify-content-between gap-1" enctype="multipart/form-data">
                                    @csrf

                                    {{-- SEPARATORE --}}

                                    <div class="row">
                                        <label for="name" class="text-dark-red mb-2">Nome ristorante</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror lh-0"
                                            placeholder="nome ristorante" value="{{ old('name') }}" required>
                                        <small class="text_dark_red text-end">Campo obbligatorio</small>

                                        @error('name')
                                            <small id="nameHlper" class="invalid-feedback">{{ $message }} </small>
                                        @enderror

                                    </div>

                                    {{-- SEPARATORE --}}

                                    <div class="row">
                                        <label for="type_id" class="text-dark-red mb-2">Tipologia cucina</label>
                                        <div class="solid-wrapper">
                                            @foreach ($types as $type)
                                                <div class="mb-1">
                                                    <input type="checkbox" name="types[]" value="{{ $type->id }}"
                                                        id="{{ $type->id }}">
                                                    <label for="types">{{ $type->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <small class="text_dark_red text-end">Campo obbligatorio</small>

                                        @error('types')
                                            <small id="typesHlper" class="invalid-feedback">{{ $message }} </small>
                                        @enderror

                                    </div>

                                    {{-- SEPARATORE --}}

                                    <div class="row">
                                        <label for="phone" class="text-dark-red mb-2">Numero di telefono</label>
                                        <input type="text" name="phone" id="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="Aggiungi numero di telefono" value="{{ old('phone') }}" required
                                            minlength="9" maxlength="12">
                                        <small class="text_dark_red text-end">Campo obbligatorio</small>

                                        @error('phone')
                                            <small id="phoneHlper" class="invalid-feedback">{{ $message }} </small>
                                        @enderror

                                    </div>

                                    {{-- SEPARATORE --}}

                                    <div class="row">
                                        <label for="piva" class="text-dark-red mb-2">P.IVA</label>
                                        <input type="text" name="piva" id="piva"
                                            class="form-control @error('piva') is-invalid @enderror"
                                            placeholder="Aggiungi piva" value="{{ old('piva') }}" required minlength="11"
                                            maxlength="11">

                                        <small class="text_dark_red text-end">Campo obbligatorio</small>
                                        @error('piva')
                                            <small id="pivaHlper" class="invalid-feedback">{{ $message }} </small>
                                        @enderror

                                    </div>

                                    {{-- SEPARATORE --}}

                                    <div class="row">
                                        <label for="address" class="text-dark-red mb-2">Indirizzo</label>
                                        <input type="text" name="address" id="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            placeholder="Inserisci indirizzo" value="{{ old('address') }}" required>

                                        <small class="text_dark_red text-end">Campo obbligatorio</small>
                                        @error('address')
                                            <small id="addressHlper" class="invalid-feedback">{{ $message }} </small>
                                        @enderror

                                    </div>

                                    {{-- SEPARATORE --}}

                                    <div class="row">
                                        <label for="restaurant_image" class="text-dark-red mb-2">Immagine ristorante</label>
                                        <input type="file"
                                            class="form-control @error('restaurant_image') is-invalid @enderror"
                                            id="restaurant_image" name="restaurant_image"
                                            value="{{ old('restaurant_image') }}" required>

                                        <small class="text_dark_red text-end">Campo obbligatorio</small>
                                        @error('restaurant_image')
                                            <small id="restaurant_imageHlper" class="invalid-feedback">{{ $message }}
                                            </small>
                                        @enderror
                                    </div>



                                    {{-- SEPARATORE --}}
                                    <div class="row py-3 mb-0">
                                        <div class="offset-md-4">
                                            <button type="submit" class="btn_add rounded-5 fs-5 fw-bold px-4 py-1">Crea
                                                ristorante</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
    @endif
@endsection
