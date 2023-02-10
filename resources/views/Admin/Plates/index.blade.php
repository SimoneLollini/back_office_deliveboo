@extends('layouts.admin')

@section('content')
    <div class='container p-3'>

        <div class='row justify-content-between py-3 m-0 align-items-center'>

            <h1 class="text-dark-red col-8"> La lista dei tuoi piatti</h1>

            <div class='text-end col-4'>
                <a href="{{ route('admin.plates.create') }}" type="button" id="ms_btn" class='btn btn_add text-dark-red'><i
                        class="fa-solid fa-plus text-white"></i> Aggiungi un piatto
                </a>
            </div>

            <p class="text-dark-red"> <span class="ms_caption">Legenda:</span> <span class="circle green ms-3">⬤</span>
                Visibile <span class="circle red ms-3">⬤</span> Non
                visibile </p>


        </div>

        <hr class="new">

        @include ('partials.message')


        @foreach ($plates as $plate)
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
                <div class="col-8">
                    <p class="text-dark-red"><strong>Nome del piatto: </strong> {{ $plate->name }}</p>

                    <p class="text-dark-red"><strong>Portata: </strong> {{ $plate->type }} </p>

                    <p class="text-dark-red"><strong>Prezzo: </strong> {{ $plate->price }}</p>

                    <p class="text-dark-red"><strong>Visibilità per il cliente: </strong>
                        @if ($plate->visibility == 1)
                            Visibile<span class="circle green ms-3">⬤</span>
                        @endif
                        @if ($plate->visibility == 0)
                            <strong>NON </strong>visibile<span class="circle red ms-3">⬤</span>
                        @endif
                    </p>
                </div>
                <div class="col-2">
                    <h4 class="text-center text-dark-red">Azioni</h4>
                    <div class='d-flex flex-column'>
                        <div>
                            <a href="{{ route('admin.plates.show', $plate->id) }}" type="button"
                                class='btn btn_secondary col-12 mb-3'>Dettagli</a>
                        </div>
                        <div>
                            <a href="{{ route('admin.plates.edit', $plate->id) }}" type="button"
                                class='btn btn_edit col-12 mb-3'>Aggiorna</a>
                        </div>
                        <div>

                            <button data-bs-toggle='modal' data-bs-target='#delete-{{ $plate->id }}'
                                class='btn btn_delete col-12 mb-3'>Elimina</button>

                            @include('partials.plate-modal')
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="row">{{ $plates->links() }}</div>
    </div>
@endsection

<style lang="scss">
    #ms_btn {
        color: #A43C28;
        font-size: 20px;
        font-weight: bolder;

    }

    .ms_row {
        background-color: #F6EDDA;
        border-bottom: 1px solid #A43C28;
        padding: 1rem;
    }

    .fa-plus {
        color: #A43C28;
        font-size: 20px;
    }

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
