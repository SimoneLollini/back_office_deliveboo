@extends('layouts.admin')

@section('content')
<div class='container p-3'>
    <h1 class='text-center mb-4 text-white'>Laravel CRUD table admin</h1>
    <table class='table table-striped'>
        <thead>
            <div class='row justify-content-between py-3 m-0 align-items-center'>

                <div class='text-end'><a href="{{ route('admin.plates.create') }}" type="button"
                        class='btn btn_add text-white'><i class="fa-solid fa-plus text-white"></i> Add
                        plate</a></div>
            </div>
            @include ('partials.message')
            <tr class='bg-light'>
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
            @foreach ($plates as $plate)
            <tr class="text-center">
                <th scope='row'>{{ $plate->id }}</th>
                <td>
                    @if ($plate->plate_image)
                    <img width='140' class='img-fluid' src="{{ asset('storage/' . $plate->plate_image) }}"
                        alt="$plate->title">
                    @else
                    <div class='placeholder p-5 bg-secondary d-flex align-items-center justify-content-center'
                        style='width:140px'>Placeholder</div>
                    @endif
                </td>
                <td>{{ $plate->name }}</td>
                <td>{{ $plate->ingredients }}</td>
                <td>{{ $plate->description }}</td>
                <td>€ {{ $plate->price }}</td>
                <td>
                @if($plate->visibility == 1)  
                <span class="circle green">⬤</span>
                @endif
                @if($plate->visibility == 0)  
                <span class="circle red">⬤</span>
                @endif
                </td>
                <td>{{ $plate->type }}</td>
                <td>
                    <div class='d-flex flex-column'>
                        <div>
                            <a href="{{ route('admin.plates.show', $plate->id) }}" type="button"
                                class='btn btn-secondary col-12 mb-3'>View</a>
                        </div>
                        <div>
                            <a href="{{ route('admin.plates.edit', $plate->id) }}" type="button"
                                class='btn btn_edit col-12 mb-3'>Edit</a>
                        </div>
                        <div>

                            <button data-bs-toggle='modal' data-bs-target='#delete-{{ $plate->id }}'
                                class='btn btn_delete col-12 mb-3'>Delete</button>

                            @include('partials.plate-modal')
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <img src="{{ URL('img/css.png') }}" alt="">
    <div class="row">{{ $plates->links() }}</div>
</div>
@endsection

<style lang="scss">
    .circle{
        font-size: 2rem;
    }
    .green{
        color: green;
    }
    .red{
        color: red;
    }


</style>