@extends('layouts.app')

@section('content')
    <div class="container p-3">

        <h1 class="text-center mb-4">Single data view</h1>

        <table class="table p-5">
            <thead>
                <tr class="bg-light">
                    <th scope='col'>ID</th>
                    <th scope='col'>Plate image</th>
                    <th scope='col'>Name</th>
                    <th scope='col'>Ingredients</th>
                    <th scope='col'>Description</th>
                    <th scope='col'>Price</th>
                    <th scope='col'>Visibility</th>
                    <th scope='col'>Type</th>
                    <th scope='col'>Action</th>
                </tr>
            </thead>
            <tbody>


                <tr>
                    <th scope='row'>{{ $plate->id }}</th>
                    <td>
                        @if ($plate->plate_image)
                            <img width='140' class='img-fluid' src="{{ asset('storage/' . $plate->cover_image) }}"
                                alt="$plate->title">
                        @else
                            <div class='placeholder p-5 bg-secondary d-flex align-items-center justify-content-center'
                                style='width:140px'>Placeholder</div>
                        @endif
                    </td>
                    <td>{{ $plate->name }}</td>
                    <td>{{ $plate->ingredients }}</td>
                    <td>{{ $plate->description }}</td>
                    <td>{{ $plate->price }}</td>
                    <td>{{ $plate->visibility }}</td>
                    <td>{{ $plate->type }}</td>
                    <td>
                        <div class="d-flex flex-column">
                            <div>
                                <a href="{{ route('admin.plates.edit', $plate->id) }}" type="button"
                                    class="btn btn-primary col-12 mb-3">Edit</a>
                            </div>
                            <div>


                                <button data-bs-toggle="modal" data-bs-target="#delete-{{ $plate->id }}"
                                    class="btn btn-danger col-12 mb-3">Delete</button>

                                @include('partials.plate-modal')

                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
