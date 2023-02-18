@extends('layouts.admin')
@section('content')
    <div class="container">

        <h1 class="text-center pt-5 pb-2 ">I MIEI ORDINI</h1>

        <hr class="new">

        <div class="d-flex justify-content-center">

            <div class=" text-center">{{ $collection->links() }}</div>

        </div>
    </div>

    @if (!$collection->isEmpty())
        <div class="container_sm">

            @foreach ($collection as $order)
                <div class="order text-center">
                    Piatti ordinati: <br>
                    <ul>
                        @foreach ($order->first()->plates as $key => $plate)
                            <li>{{ $plate->name }}</li>
                        @endforeach
                    </ul>
                    {{-- <span>ID: {{ $order->first()->id }} </span> <br> --}}
                    <hr>
                    <span>Nome utente: {{ $order->first()->full_name }} </span> <br>


                    <hr>
                    <span>Numero di telefono: {{ $order->first()->phone }} </span> <br>
                    <hr>
                    <span>Indirizzo: {{ $order->first()->address }} </span> <br>
                    <hr>
                    <span>Prezzo: €{{ $order->first()->price }} </span> <br>
                    <hr>
                    <span>Descrizione: {{ $order->first()->description }} </span> <br>
                    <hr>
                    <span>
                        Stato ordine: <br>
                        @if ($order->first()->status == 1)
                            <span class="circle green">⬤</span>
                        @endif
                        @if ($order->first()->status == 0)
                            <span class="circle red">⬤</span>
                        @endif
                    </span>
                </div>
            @endforeach

        </div>
    @else
        <div class="container">

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

    .container_sm {
        display: flex;
        flex-wrap: wrap;
        width: 80%;

        margin: auto;

    }

    .order {
        width: 32%;
        background-color: #f6edda;
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
