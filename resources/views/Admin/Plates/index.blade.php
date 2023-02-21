@extends('layouts.admin')
@section('content')

<div class="shadow-sm mx-0 mb-3">

    <div class='row justify-content-between py-3 m-0 align-items-center px-5'>

        <h1 class="text_dark_red fw-bold ps-3 col-8">I tuoi piatti<img class="menu_icon ms-3"
                src="{{ asset('/img/menu.png') }}" alt=""></h1>

        <div class='text-end col-4 '>
            <a href="{{ route('admin.plates.create') }}" type="button" id="ms_btn" class='btn btn_add text-dark-red'><i
                    class="fa-solid fa-plus text_dark_red"></i> Aggiungi un piatto
            </a>
        </div>

        <p class="text-dark-red"> <span class="ms_caption fw-bold">Legenda:</span> <span
                class="circle green ms-3">⬤</span>
            Visibile <span class="circle red ms-3">⬤</span> Non
            visibile </p>
    </div>

</div>

@include ('partials.message')

@if (!$plates->isEmpty())
@foreach ($plates as $plate)
<div class="container my-4">
    <div class="row w-75 align-items-center rounded-4 border-0 shadow bg-white m-auto p-2">
        <div class="col-2">
            @if ($plate->plate_image)
            <img style='width:140px' class='img-fluid' src="{{ asset('storage/' . $plate->plate_image) }}"
                alt="$plate->title">
            @else
            <div class='placeholder p-5 bg-secondary d-flex align-items-center justify-content-center'
                style='width:140px'>
                Placeholder</div>
            @endif
        </div>
        <div class="col-8">
            <p class="text-dark-red"><strong>Nome: </strong> {{ $plate->name }}</p>

            <p class="text-dark-red"><strong>Portata: </strong> {{ $plate->type }} </p>

            <p class="text-dark-red"><strong>Prezzo: </strong> {{ $plate->price }} &euro;</p>

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

</div>
@endforeach

<div class="row">{{ $plates->links() }}</div>
@else
<div class="row align-items-center justify-content-center p-5 ms_order">

    <h3 id="ms_title" class="text-dark-red col-6">Non ci sono ancora piatti nel tuo ristorante</h3>

</div>
@endif
</div>
@endsection

<style lang="scss">

#ms_btn {
    color: #A43C28;
    font-size: 20px;
    font-weight: bolder;

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

.text_dark_red {
    color: #A43C28;

}

.menu_icon {
    width: 80px;
}

.ms_caption {
    font-size: 18px
}

.ms_order {
    background-color: #f6edda;
    border-radius: 5px;
}
</style>
