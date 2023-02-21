@extends('layouts.admin')
@section('content')
<div class="shadow-sm m-0">

    <h1 class="text-center py-2 fw-bold ps-3">I tuoi ordini <img class="orders_icon"
            src="{{ asset('/img/orders_icon.png') }}" alt="">
    </h1>

    <div class="d-flex justify-content-center">

        <div class="text-center">{{ $collection->links() }}</div>

    </div>
</div>

@if (!$collection->isEmpty())
<div class="container_sm mt-5">

    @foreach ($collection as $order)
    <div class="order text-center shadow">
        <span class="fs-3">Piatti ordinati</span><br>
        <ul>
            @foreach ($order->first()->plates as $key => $plate)
            <li class="text-muted">
                {{ $plate->name }}
                | quantità:
                {{ $plate->pivot->quantity }}
            </li>
            @endforeach
        </ul>
        {{-- <span>ID: {{ $order->first()->id }} </span> <br> --}}
        <hr>
        <span>Nome utente: <span class="text-muted">{{ $order->first()->full_name }} </span></span> <br>


        <hr>
        <span>Numero di telefono: <span class="text-muted">{{ $order->first()->phone }}</span> </span> <br>
        <hr>
        <span>Indirizzo: <span class="text-muted">{{ $order->first()->address }}</span> </span> <br>
        <hr>
        <span>Prezzo: <span class="text-muted">€ {{ $order->first()->price }}</span> </span> <br>
        <hr>
        <span>Descrizione: <span class="text-muted">{{ $order->first()->description }}</span> </span> <br>
        <hr>
        <span>
            Stato ordine: <br>
            @if ($order->first()->status == 1)
            <span class="circle green"></span>
            @endif
            @if ($order->first()->status == 0)
            <span class="circle red fs-6 mb-3">Non ancora spedito</span>
            @endif
        </span>
    </div>
    @endforeach

</div>
@else
<div class="container pt-4">

    <div class="row align-items-center justify-content-center p-5 ms_order">

        <h3 id="ms_title" class="text-dark-red col-6">Non ci sono ancora ordini effettuati</h3>

        <img src="{{ asset('/img/deliveboo-logo.png') }}" alt="" class="img-fluid col-4">

    </div>

</div>
@endif
@endsection
<style lang="scss">
h1 {
    color: #a43c28;
}

.orders_icon {
    width: 80px;
}

.container_sm {
    display: flex;
    flex-wrap: wrap;
    width: 80%;

    margin: auto;

}

.order {
    width: 32%;
    background-color: #FFFFFF;
    border-radius: 1rem;
    color: #a43c28;
    font-weight: 700;
    padding: 1rem;
    margin-bottom: 0.85rem;
    margin-left: 0.40rem;
    margin-right: 0.40rem;


}

.circle {
    font-size: 2rem;
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

.ms_order {
    background-color: #f6edda;
    border-radius: 5px;
}
</style>