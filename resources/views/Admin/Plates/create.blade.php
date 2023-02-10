@extends('layouts.admin')

@section('content')
    <div class="container p-3">


        <h1 class="text-center text-dark-red">Completa il form per aggiungere un nuovo piatto</h1>

        <hr class="new">

        @include('partials.error')

        <form action="{{ route('admin.plates.store') }}" method="post" enctype="multipart/form-data" id="plate_form">

            @csrf

            <div class="mb-3">
                <label for="name" class="form-label text-dark-red">Nome del piatto <strong
                        class="text-danger">*</strong></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" required>
                @error('name')
                    <small id="nameHlper" class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="plate_image" class="form-label text-dark-red">Foto del tuo piatto</label>
                <input type="file" class="form-control @error('plate_image') is-invalid @enderror" id="plate_image"
                    name="plate_image" value="{{ old('plate_image') }}">
                @error('plate_image')
                    <small id="plate_imageHlper" class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label text-dark-red">Descrizione del piatto</label>
                <textarea class="mt-2 form-control @error('description') is-invalid @enderror"
                    placeholder="Inserisci una descrizione al tuo piatto" id="description" name="description" style="height: 150px">{{ old('description') }}</textarea>
                @error('description')
                    <small id="descriptionHlper" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ingredients" class="form-label text-dark-red">Ingredienti del piatto</label>
                <input type="ingredients" class="form-control @error('ingredients') is-invalid @enderror" id="ingredients"
                    name="ingredients" value="{{ old('ingredients') }}">
                @error('ingredients')
                    <small id="ingredientsHlper" class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label text-dark-red">Prezzo del piatto</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price') }}" step="0.01">
                @error('price')
                    <small id="priceHlper" class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="visibility" class="form-label text-dark-red">Visibilità del piatto</label> <br>
                <input class="checkbox" type="checkbox" name="visibility" id="visibility">

                @error('visibility')
                    <br>
                    <small id="visibilityHlper" class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label text-dark-red">Tipologia del piatto <strong
                        class="text-danger">*</strong></label>
                <select class="form-select form-select-lg " name="type" id="type" required>
                    <option value="" selected disabled>Seleziona la tipologia del piatto </option>
                    <option value="antipasto">Antipasto</option>
                    <option value="primo">Primo</option>
                    <option value="secondo">Secondo</option>
                    <option value="dolce">Dolce</option>
                </select>
            </div>
            <button type="submit" class="rounded text-light fw-bold border-0 red">Conferma</button>
        </form>
    </div>
@endsection

<style lang="scss">
    .checkbox {
        zoom: 4;
        margin-top: 0.1rem;
    }

    .red {
        background-color: #a43c28;
        padding: 0.5rem 1rem;
    }

    hr.new {
        border: 2px solid #A43C28;
        opacity: 1;
    }

    #plate_form {
        background-color: #f6edda;
        padding: 1rem;
        border-radius: 5px;
    }
</style>
