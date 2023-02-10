@extends('layouts.admin')
@section('content')

    <div class="container p-3">
        <h1 class="text-dark-red text-center p-5"><strong>Modifica i dati del tuo ristorante</strong></h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.restaurants.update', $restaurant->id) }}" method="post"
            class="card card rounded-5 border-0 p-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- SEPARATORE --}}

            <div class="mb-3">
                <label for="name" class="form-label">Nome <strong class="text-danger">*</strong></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="add name" value="{{ old('name', $restaurant->name) }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- SEPARATORE --}}

            <div class="mb-3">
                <div class="mb-3">
                    <label for="types" class="form-label">Tipologia cucina <strong class="text-danger">*</strong></label>
                    <div class="solid-wrapper">
                        @foreach ($types as $type)
                            <div class="mb-1">
                                <input type="checkbox" {{ $restaurant->types->contains($type->id) ? 'checked' : '' }}
                                    name="types[]" value="{{ $type->id }}" id="{{ $type->id }}">
                                <label for="types">{{ $type->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @error('types')
                <small id="typesHlper" class="text-danger">{{ $message }} </small>
            @enderror

            {{-- SEPARATORE --}}

            <div class="mb-3">
                <label for="phone" class="form-label">Numero di telefono <strong class="text-danger">*</strong></label>
                <input type="text" name="phone" id="phone"
                    class="form-control @error('phone') is-invalid @enderror" placeholder="add phone"
                    value="{{ old('phone', $restaurant->phone) }}">
            </div>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- SEPARATORE --}}

            <div class="mb-3">
                <label for="piva" class="form-label">P.IVA <strong class="text-danger">*</strong></label>
                <input type="text" name="piva" id="piva" class="form-control @error('piva') is-invalid @enderror"
                    placeholder="add piva" value="{{ old('piva', $restaurant->piva) }}">
            </div>
            @error('piva')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- SEPARATORE --}}

            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo <strong class="text-danger">*</strong></label>
                <input type="text" name="address" id="address"
                    class="form-control @error('address') is-invalid @enderror" placeholder="add address"
                    value="{{ old('address', $restaurant->address) }}">
            </div>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            {{-- SEPARATORE --}}

            <div class="mb-3 d-flex flex-column gap-2">
                <img width="150" src="{{ asset('storage/' . $restaurant->restaurant_image) }}" alt="">
                <label for="restaurant_image" class="form-label">Sostituisci l'immagine del tuo ristorante</label>
                <input type="file" class="form-control @error('restaurant_image') is-invalid @enderror"
                    id="restaurant_image" name="restaurant_image" value="{{ old('restaurant_image') }}">

                @error('restaurant_image')
                    <small id="restaurant_imageHlper" class="text-danger">{{ $message }} </small>
                @enderror
            </div>

            {{-- SEPARATORE --}}

            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>

@endsection
