@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 bg-light">
    <div class="container py-5">
        <div class="row">
            <div class="col-9">
                <div class="title d-flex">
                    <h1 class="display-5 fw-bold text-uppercase text-dark-red">
                        Il tuo gestionale di delivery
                    </h1>
                    <img class="img-fluid" src="{{asset('/img/deliver.png')}}" alt="deliveboo-logo">

                </div>

                <p class="col-md-8 fs-4">Aggiungi il tuo ristorante, crea e modifica facilmente in tuo menù. <br>
                    Con <span class="text_green fw-bold">DeliveBoo</span> puoi monitorare
                    l'andamento delle tue vendite per diventare il più grande ristorante della città!</p>
                <a href="{{ route('register') }}"><button class="btn btn_edit btn-lg mt-3" type="button">Registrati
                        subito</button></a>
            </div>
        </div>

    </div>
</div>

<div class="bottom pt-4">
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi
            deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis
            accusamus dolores!</p>
    </div>
</div>
@endsection