@extends('layouts.admin')

@section('content')
<div class="container p-3">


    <h1 class="text-center">Completa il form per aggiungere un nuovo piatto</h1>
    @include('partials.error')
    <form action="{{ route('admin.plates.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Plate name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}">
            @error('name')
            <small id="nameHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="plate_image" class="form-label">Immagine</label>
            <input type="file" class="form-control @error('plate_image') is-invalid @enderror" id="plate_image"
                name="plate_image" value="{{ old('plate_image') }}">
            @error('plate_image')
            <small id="plate_imageHlper" class="text-danger">{{ $message }} </small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description">Descrizione del piatto</label>
            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Leave a description"
                id="description" name="description" style="height: 150px">{{ old('description') }}</textarea>
            @error('description')
            <small id="descriptionHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredienti del piatto</label>
            <input type="ingredients" class="form-control @error('ingredients') is-invalid @enderror" id="ingredients"
                name="ingredients" value="{{ old('ingredients') }}">
            @error('ingredients')
            <small id="ingredientsHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo del piatto</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                value="{{ old('price') }}" step="0.01">
            @error('price')
            <small id="priceHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="visibility" class="form-label">Visibilità del piatto</label>
            <input type="number" placeholder="0 per non mostrare il piatto nel menù, 1 per mostrarlo."
                class="form-control @error('visibility') is-invalid @enderror" id="visibility" name="visibility"
                value="{{ old('visibility') }}">
            @error('visibility')
            <small id="visibilityHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipologia del piatto <strong class="text-danger">*</strong></label>
            <select class="form-select form-select-lg " name="type" id="type" required>
                <option value="" selected disabled>Seleziona la tipologia del piatto </option>
                <option value="antipasto">Antipasto</option>
                <option value="primo">Primo</option>
                <option value="secondo">Secondo</option>
                <option value="dolce">Dolce</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection