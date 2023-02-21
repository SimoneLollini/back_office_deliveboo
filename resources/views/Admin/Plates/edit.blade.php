@extends('layouts.admin')

@section('content')
    <div class="container p-3">
        <h1 class="text-center text-dark-red">Aggiorna le informazioni del tuo piatto</h1>

        <hr class="new">

        @include('partials.error')

        <form action="{{ route('admin.plates.update', $plate->id) }}" method="post" enctype="multipart/form-data"
            id="edit_form" class="text-dark-red">
            @csrf
            @method ('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome del piatto</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ $plate->name }}" required>
                @error('title')
                    <small id="nameHlper" class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="mb-3 d-flex">
                <div class="col-2">
                    @if ($plate->plate_image)
                        <img width="140" class="img-fluid" src="{{ asset('storage/' . $plate->plate_image) }}"
                            alt="">
                    @else
                        <div class="placeholder p-5 bg-secondary d-flex align-items-center justify-content-center text-dark"
                            style="width:140px">Placeholder</div>
                    @endif
                </div>
                <div class="col-10">
                    <label for="plate_image" class="form-label">Foto del piatto</label>
                    <input type="file" class="form-control @error('plate_image') is-invalid @enderror" id="plate_image"
                        name="plate_image" value="{{ $plate->plate_image }}">
                    @error('plate_image')
                        <small id="plate_imageHlper" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredienti</label>
                <input type="ingredients" class="form-control @error('ingredients') is-invalid @enderror" id="ingredients"
                    name="ingredients" value="{{ $plate->ingredients }}">
                @error('ingredients')
                    <small id="ingredientsHlper" class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description">Descrizione del piatto</label>
                <textarea class="form-control @error('description') is-invalid @enderror"
                    placeholder="Inserisci qui la descrizione per il tuo piatto" id="description" name="description"
                    style="height: 150px">{{ $plate->description }}</textarea>
                @error('description')
                    <small id="descriptionHlper" class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ $plate->price }}" step="0.01">
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
                <label for="type" class="form-label text-dark-red">Tipologia del piatto</label>
                <select class="form-select form-select-lg " name="type" id="type" required>
                    <option value="">Seleziona la tipologia del piatto </option>
                    <option value="antipasto">Antipasto</option>
                    <option value="primo">Primo</option>
                    <option value="secondo">Secondo</option>
                    <option value="dolce">Dolce</option>
                </select>
            </div>



            <button type="submit" class="btn btn_delete text-white">Conferma</button>
        </form>
    </div>
@endsection

<style>
    .checkbox {
        zoom: 4;
        margin-top: 0.1rem;
    }

    .red {
        background-color: #a43c28;
        padding: 0.5rem 1rem;
    }

    #edit_form {
        background-color: #f6edda;
        padding: 1rem;
        border-radius: 5px;
    }
</style>
