@extends('layouts.admin')

@section('content')
    <div class="container p-3">

        <div class='row justify-content-between py-3 m-0 align-items-center'>

            <h1 class="text-dark-red col-8">Ecco qui il tuo piatto: {{ $plate->name }}</h1>

            <p class="text-dark-red col-4"> <span class="ms_caption">Legenda:</span> <span class="circle green ms-3">⬤</span>
                Visibile <span class="circle red ms-3">⬤</span> Non
                visibile </p>

        </div>

        <hr class="new">

        @include ('partials.message')


        <div class="row align-items-center ms_row">

            <div class="col-2">
                @if ($plate->plate_image)
                    <img style='width:140px' class='img-fluid' src="{{ asset('storage/' . $plate->plate_image) }}"
                        alt="$plate->title">
                @else
                    <div class='placeholder p-5 bg-secondary d-flex align-items-center justify-content-center'
                        style='width:140px'>Placeholder</div>
                @endif
            </div>

            <div class="col-4">
                <p class="text-dark-red"><strong>Nome del piatto: </strong> {{ $plate->name }}</p>

                <p class="text-dark-red"><strong>Portata: </strong> {{ $plate->type }} </p>

                @if ($plate->price)
                    <p class="text-dark-red"><strong>Prezzo: </strong> {{ $plate->price }}</p>
                @else
                    <p class="text-dark-red"><strong>Prezzo: </strong> Nessun prezzo stabilito</p>
                @endif

                <p class="text-dark-red"><strong>Visibilità per il cliente: </strong>
                    @if ($plate->visibility == 1)
                        Visibile<span class="circle green ms-3">⬤</span>
                    @endif
                    @if ($plate->visibility == 0)
                        <strong>NON </strong>visibile<span class="circle red ms-3">⬤</span>
                    @endif
                </p>
            </div>

            <div class="col-2 align-self-start py-3">

                @if ($plate->description)
                    <p class="text-dark-red m-0"><strong>Descrizione: </strong> {{ $plate->description }}</p>
                @else
                    <p class="text-dark-red m-0"><strong>Descrizione: </strong> Nessuna descrizione disponibile </p>
                @endif
            </div>

            <div class="col-2 align-self-start py-3">

                @if ($plate->ingredients)
                    <p class="text-dark-red m-0"><strong>Ingredienti: </strong> {{ $plate->ingredients }}</p>
                @else
                    <p class="text-dark-red m-0"><strong>Ingredienti: </strong>Nessun ingrediente inserito </p>
                @endif

            </div>

            <div class="col-2">
                <h4 class="text-center text-dark-red">Azioni</h4>
                <div class="d-flex flex-column">
                    <div>
                        <a href="{{ route('admin.plates.edit', $plate->id) }}" type="button"
                            class="btn btn_edit col-12 mb-3">Aggiorna</a>
                    </div>
                    <div>


                        <button data-bs-toggle="modal" data-bs-target="#delete-{{ $plate->id }}"
                            class="btn btn_delete col-12 mb-3">Elimina</button>

                        @include('partials.plate-modal')

                    </div>
                </div>
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

    hr.new {
        border: 2px solid #A43C28;
        opacity: 1;
    }

    .ms_caption {
        font-style: italic;
        font-size: 18px
    }
</style>
