@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    Aggiungi il tuo ristorante!
                    <a class="btn btn-primary ms-3" href="{{ route('admin.restaurants.create') }}" role="button">
                        <i class="fas fa-plus fa-lg"></i></a>
                </div>

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection