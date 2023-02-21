@extends('layouts.admin')

@section('content')
<div class="shadow-sm mx-0 mb-4">

    <div class='row justify-content-betweena lign-items-center px-5 m-0'>

        <h1 class="text_dark_red fw-bold ps-3 my-0 col-8">{{ $plate->name }}<img class="menu_icon ms-3"
                src="{{ asset('/img/menu.png') }}" alt=""></h1>

        <p class="text-dark-red"> <span class="ms_caption fw-bold">Legenda:</span> <span
                class="circle green ms-3">⬤</span>
            Visibile <span class="circle red ms-3">⬤</span> Non
            visibile </p>

    </div>
</div>

@include ('partials.message')

<div class="container px-5">
    <div class="row ms_row hight_row bg-white border-0 px-3 py-5 rounded-4 shadow">

        <div class="col-4">
            @if ($plate->plate_image)
            <img class='img-fluid' src="{{ asset('storage/' . $plate->plate_image) }}" alt="$plate->title">
            @else
            <div class='placeholder p-5 bg-secondary d-flex align-items-center justify-content-center'
                style='width:140px'>
                Placeholder</div>
            @endif
        </div>

        <div class="col-4">
            <h4 class="text-dark-red fw-bold">Nome: <span class="fw-normal">{{ $plate->name }}</span></h4>

            <h4 class="text-dark-red fw-bold">Portata: <span class="fw-normal">{{ $plate->type }} </span></h4>

            @if ($plate->price)
            <h4 class="text-dark-red fw-bold">Prezzo: <span class="fw-normal">{{ $plate->price }} &euro;</span></h4>
            @else
            <h4 class="text-dark-red fw-bold">Prezzo: <span class="fw-normal">Nessun prezzo stabilito</span></h4>
            @endif

            <h4 class="text-dark-red fw-bold">Visibilità per il cliente: </strong>
                @if ($plate->visibility == 1)
                <span class="fw-normal">Visibile</span><span class="circle green ms-3">⬤</span>
                @endif
                @if ($plate->visibility == 0)
                <strong>NON </strong> <span class="fw-normal">visibile</span><span class="circle red ms-3">⬤</span>
                @endif
            </h4>
        </div>

        <div class="col-4">

            @if ($plate->ingredients)
            <h4 class="text-dark-red m-0 fw-bold"><strong>Ingredienti: </strong> <span
                    class="fw-normal">{{ $plate->ingredients }}</span></h4>
            @else
            <h4 class="text-dark-red m-0 fw-bold"><strong>Ingredienti: </strong> <span class="fw-normal">Nessun
                    ingrediente inserito </span></h4>
            @endif
            <br>
            @if ($plate->description)
            <h4 class="text-dark-red m-0 fw-bold"><strong>Descrizione: </strong> <span
                    class="fw-normal">{{ $plate->description }}</span></h4>
            @else
            <h4 class="text-dark-red m-0 fw-bold"><strong>Descrizione: </strong> <span class="fw-normal">Nessuna
                    descrizione disponibile </span></h4>
            @endif

            <div class="ms-auto mt-5 ">

                <a href="{{ route('admin.plates.edit', $plate->id) }}" type="button"
                    class="btn btn_edit me-2 fw-bold">Aggiorna</a>

                <button data-bs-toggle="modal" data-bs-target="#delete-{{ $plate->id }}"
                    class="btn btn_delete fw-bold">Elimina</button>

                @include('partials.plate-modal')

            </div>
        </div>

    </div>

    @endsection

    <style>
    .circle {
        font-size: 1.5rem;
    }

    .green {
        color: green;
    }

    .red {
        color: red;
    }

    .ms_caption {

        font-size: 18px
    }

    .menu_icon {
        width: 80px;
    }


    .actions {
        width: fit-content;
    }
    </style>