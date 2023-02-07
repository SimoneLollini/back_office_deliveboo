@extends('layouts.admin')

@section('content')
<div class="container p-3">
    <h1 class="text-center">Update form Data</h1>
    @include('partials.error')
    <form action="{{ route('admin.plates.update', $plate->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method ('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Data name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ $plate->name }}">
            @error('title')
            <small id="nameHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <div class="mb-3 d-flex">
            <div class="col-2">
                @if ($plate->plate_image)
                <img width="140" class="img-fluid" src="{{ asset('storage/' . $plate->plate_image) }}" alt="">
                @else
                <div class="placeholder p-5 bg-secondary d-flex align-items-center justify-content-center"
                    style="width:140px">Placeholder</div>
                @endif
            </div>
            <div class="col-10">
                <label for="plate_image" class="form-label">Data cover image</label>
                <input type="file" class="form-control @error('plate_image') is-invalid @enderror" id="plate_image"
                    name="plate_image" value="{{ $plate->plate_image }}">
                @error('plate_image')
                <small id="plate_imageHlper" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Plate ingredients</label>
            <input type="ingredients" class="form-control @error('ingredients') is-invalid @enderror" id="ingredients"
                name="ingredients" value="{{ $plate->ingredients }}">
            @error('ingredients')
            <small id="ingredientsHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description">Plate description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Leave a description"
                id="description" name="description" style="height: 150px">{{ $plate->description }}</textarea>
            @error('description')
            <small id="descriptionHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Plate price</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                value="{{ $plate->price }}">
            @error('price')
            <small id="priceHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="visibility" class="form-label">Plate visibility</label>
            <input type="text" class="form-control @error('visibility') is-invalid @enderror" id="visibility"
                name="visibility" value="{{ $plate->visibility }}">
            @error('visibility')
            <small id="visibilityHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Plate type</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type"
                value="{{ $plate->type }}">
            @error('type')
            <small id="typeHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection