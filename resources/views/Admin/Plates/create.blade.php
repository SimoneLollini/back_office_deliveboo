@extends('layouts.admin')

@section('content')
<div class="shadow-sm m-0">


    <h1 class="text-dark-red text-center py-1 fw-bold ps-3">Aggiungi un nuovo piatto<img class="plate_icon ms-2"
            src="{{ asset('/img/plate_icon.png') }}" alt=""></h1>

</div>

@include('partials.error')
<div class="container px-5">
    <form class="mt-5 shadow w-75 m-auto rounded-4" action="{{ route('admin.plates.store') }}" method="post"
        enctype="multipart/form-data" id="plate_form">

        @csrf

        <div class="mb-3">
            <label for="name" class="form-label text-dark-red fw-bold">Nome del piatto</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}" required>
            <small class="ms-auto text_dark_red">Campo obbligatorio</small>
            @error('name')
            <small id="nameHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="plate_image" class="form-label text-dark-red fw-bold">Foto del tuo piatto</label>
            <input type="file" class="form-control @error('plate_image') is-invalid @enderror" id="plate_image"
                name="plate_image" value="{{ old('plate_image') }}">
            @error('plate_image')
            <small id="plate_imageHlper" class="text-danger">{{ $message }} </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label text-dark-red fw-bold">Descrizione del piatto</label>
            <textarea class="mt-2 form-control @error('description') is-invalid @enderror"
                placeholder="Inserisci una descrizione al tuo piatto" id="description" name="description"
                style="height: 150px">{{ old('description') }}</textarea>
            @error('description')
            <small id="descriptionHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label text-dark-red fw-bold">Ingredienti del piatto</label>
            <input type="ingredients" class="form-control @error('ingredients') is-invalid @enderror" id="ingredients"
                name="ingredients" value="{{ old('ingredients') }}">
            @error('ingredients')
            <small id="ingredientsHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label text-dark-red fw-bold">Prezzo del piatto</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                value="{{ old('price') }}" step="0.01">
            @error('price')
            <small id="priceHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="visibility" class="form-label text-dark-red fw-bold">Visibilità del piatto</label> <br>
            <input class="checkbox" type="checkbox" name="visibility" id="visibility">

            @error('visibility')
            <br>
            <small id="visibilityHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label text-dark-red fw-bold">Tipologia del piatto</label>
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
.plate_icon {
    width: 80px;
}

.checkbox {
    zoom: 4;
    margin-top: 0.1rem;
}

.red {
    background-color: #a43c28;
    padding: 0.5rem 1rem;
}

.text_dark_red {
    color: #A43C28;

}

#plate_form {
    background-color: #FFFFFF;
    padding: 1rem;
    border-radius: 5px;
}
</style>
