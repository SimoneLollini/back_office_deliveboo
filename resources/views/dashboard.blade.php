@extends('layouts.admin')

@section('content')
    <div class="container">
        @if ($user_restaurant)
            <div class="card">
                <div class="m-3">
                    Nome Ristorante: {{ $user_restaurant->name }}
                </div>
                <div class="m-3">
                    Numero di telefono: {{ $user_restaurant->phone }}
                </div>
                <div class="m-3">
                    Partita iva del tuo ristorante: {{ $user_restaurant->piva }}
                </div>
                <div class="m-3">
                    Il tuo indirizzo: {{ $user_restaurant->address }}
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-body">
                    Aggiungi il tuo ristorante!
                    <a class="btn btn-primary ms-3" href="{{ route('admin.restaurants.create') }}" role="button"><i
                            class="fas fa-plus fa-lg"></i></a>
                </div>

            </div>
        @endif
    </div>
@endsection
