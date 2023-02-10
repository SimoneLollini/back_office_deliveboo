@extends('layouts.admin')
@section('content')
    <h1 class="text-center pt-5 pb-2 ">I MIEI ORDINI</h1>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex justify-content-center">

        <div class=" text-center">{{ $collection->links() }}</div>
    </div>


    <div class="container_sm">


        @foreach ($collection as $order)
            <div class="order text-center">
                <span>ID: {{ $order->first()->id }} </span> <br>
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
</style>
