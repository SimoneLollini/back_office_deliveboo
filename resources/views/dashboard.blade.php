@extends('layouts.admin')

@section('content')
@if ($user_restaurant)
<div class="container p-3">
    <div class="p-5">

        <h1 class="text-dark-red text-center"><strong>Benvenuto nel pannello di amministrazione</strong> </h1>

        <div class="text-center">
            <img src="{{ asset('img/deliveboo-logo.png') }}" alt="">
        </div>

    </div>

    <div class="row align-items-center ms_row">

        <div class="col-4 text-center">
            <img src="{{ asset('storage/' . $user_restaurant->restaurant_image) }}"
                alt="{{ $user_restaurant->restaurant_image }}" class="img-fluid" style="height: 240px">
        </div>

        <div class="col-8 d-flex flex-column text-dark-red">

            <h2 class="my-3"> Nome Ristorante: {{ $user_restaurant->name }} </h2>

            <p> <strong>Tipologia cucina:</strong>
                {{ $user_restaurant->types[0]->name }}</p>

            <p> <strong>Numero di telefono:</strong> {{ $user_restaurant->phone }} </p>

            <p> <strong>Partita iva del tuo ristorante:</strong> {{ $user_restaurant->piva }} </p>

            <p> <strong>Il tuo indirizzo:</strong> {{ $user_restaurant->address }}</p>

        </div>
    </div>
</div>
@else
<div class="background-log-reg">
    <div class="container px-5 pt-5">
        <div class="row justify-content-end h-75">
            <div class="col-md-6">
                <div class="card px-5 py-5 rounded-5 border-0">
                    Aggiungi il tuo ristorante!
                    <a class="btn btn-primary ms-3" href="{{ route('admin.restaurants.create') }}" role="button">
                        <i class="fas fa-plus fa-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection