@extends('layouts.admin')
@section('content')
    <div class="container">

        <h1 class="text-center m-0 py-3 text-dark-red">Crea il tuo ristorante</h1>

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
                <input type="text" name="phone" id="phone"
                    class="form-control @error('phone') is-invalid @enderror" placeholder="Aggiungi numero di telefono"
                    value="{{ old('phone') }}" required>
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

            <button type="submit" class="btn btn_delete">Submit</button>

        </form>
    </div>
@endsection
