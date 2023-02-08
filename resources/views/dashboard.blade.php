@extends('layouts.admin')

@section('content')
@if ($user_restaurant)
<div class="container p-3">
    <div class="p-5">

        <h1 class="text-dark-red text-center"><strong>Benvenuto nel pannello di amministrazione</strong> </h1>

        <div class="text-center">
            <img src="{{ asset('img/deliveboo-logo.png') }}" alt="">
        </div>

    </div>

    <div class="row align-items-center ms_row">

        <div class="col-4 text-center">
            <img src="{{ asset('storage/' . $user_restaurant->restaurant_image) }}"
                alt="{{ $user_restaurant->restaurant_image }}" class="img-fluid" style="height: 240px">
        </div>

        <div class="col-8 d-flex flex-column text-dark-red">

            <h2 class="my-3"> Nome Ristorante: {{ $user_restaurant->name }} </h2>

            <p> <strong>Tipologia cucina:</strong>
                {{ $user_restaurant->types[0]->name }}</p>

            <p> <strong>Numero di telefono:</strong> {{ $user_restaurant->phone }} </p>

            <p> <strong>Partita iva del tuo ristorante:</strong> {{ $user_restaurant->piva }} </p>

            <p> <strong>Il tuo indirizzo:</strong> {{ $user_restaurant->address }}</p>

        </div>
    </div>
</div>
@else
<div class="background-log-reg">
    <div class="container px-5 pt-5">
        <h1 class="text-center m-0 py-3 text-dark-red">Crea il tuo ristorante</h1>
        <h5>Puoi registrare un solo ristorante per ogni account</h5>

        @include('partials.error')

        <form action="{{ route('admin.restaurants.store') }}" method="post" class="card border-0 background_form p-3"
            enctype="multipart/form-data">
            @csrf

            {{-- SEPARATORE --}}

            <div class="mb-3">
                <label for="name" class="form-label">Inserisci il nome del tuo ristorante <strong
                        class="text-danger">*</strong></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Aggiungi nome" value="{{ old('name') }}" required>
            </div>

            @error('name')
            <small id="nameHlper" class="text-danger">{{ $message }} </small>
            @enderror

            {{-- SEPARATORE --}}

            <div class="mb-3">
                <label for="type_id" class="form-label">Tipologia cucina <strong class="text-danger">*</strong></label>
                <select class="form-select form-select-lg @error('type_id') is-invalid @enderror" name="type_id"
                    id="type_id" required>

                    <option value="" selected disabled>Seleziona tipologia cucina </option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            @error('type_id')
            <small id="type_idHlper" class="text-danger">{{ $message }} </small>
            @enderror

            {{-- SEPARATORE --}}

            <div class="mb-3">
                <label for="phone" class="form-label">Numero di telefono <strong class="text-danger">*</strong></label>
                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                    placeholder="Aggiungi numero di telefono" value="{{ old('phone') }}" required>
            </div>

            @error('phone')
            <small id="phoneHlper" class="text-danger">{{ $message }} </small>
            @enderror

            {{-- SEPARATORE --}}

            <div class="mb-3">
                <label for="piva" class="form-label">Partita IVA <strong class="text-danger">*</strong></label>
                <input type="text" name="piva" id="piva" class="form-control @error('piva') is-invalid @enderror"
                    placeholder="Aggiungi piva" value="{{ old('piva') }}" required>
            </div>

            @error('piva')
            <small id="pivaHlper" class="text-danger">{{ $message }} </small>
            @enderror

            {{-- SEPARATORE --}}

            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo <strong class="text-danger">*</strong></label>
                <input type="text" name="address" id="address"
                    class="form-control @error('address') is-invalid @enderror" placeholder="Inserisci indirizzo"
                    value="{{ old('address') }}" required>
            </div>

            @error('address')
            <small id="addressHlper" class="text-danger">{{ $message }} </small>
            @enderror

            {{-- SEPARATORE --}}

            <div class="mb-3">
                <label for="restaurant_image" class="form-label">Aggiugi l'immagine del tuo ristorante <strong
                        class="text-danger">*</strong></label>
                <input type="file" class="form-control @error('restaurant_image') is-invalid @enderror"
                    id="restaurant_image" name="restaurant_image" value="{{ old('restaurant_image') }}" required>
                @error('restaurant_image')
                <small id="restaurant_imageHlper" class="text-danger">{{ $message }} </small>
                @enderror
            </div>



            {{-- SEPARATORE --}}

            <button type="submit" class="btn btn_delete">Crea ristorante</button>

        </form>
    </div>
    @endif
    @endsection