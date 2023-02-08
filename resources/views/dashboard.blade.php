@extends('layouts.admin')

@section('content')
    <div class="container p-3">
        @if ($user_restaurant)
            <div class="row align-items-center">

                <div class="col-4 text-center">
                    <img src="{{ asset('storage/' . $user_restaurant->restaurant_image) }}"
                        alt="{{ $user_restaurant->restaurant_image }}" class="img-fluid" style="height: 240px">
                </div>

                <div class="col-8 d-flex flex-column">

                    <h2 class="mb-5"> Nome Ristorante: {{ $user_restaurant->name }} </h2>

                    <p> Tipologia cucina:
                        {{ $user_restaurant->types[0]->name }}</p>

                    <p> Numero di telefono: {{ $user_restaurant->phone }} </p>

                    <p> Partita iva del tuo ristorante: {{ $user_restaurant->piva }} </p>

                    <p> Il tuo indirizzo: {{ $user_restaurant->address }}</p>

                </div>



            </div>
        @else
            <div class="card">
                <div class="card-body">
                    Aggiungi il tuo ristorante!
                    <a class="btn btn-primary ms-3" href="{{ route('admin.restaurants.create') }}" role="button">
                        <i class="fas fa-plus fa-lg"></i></a>
                </div>

            </div>
        @endif
    </div>
@endsection
