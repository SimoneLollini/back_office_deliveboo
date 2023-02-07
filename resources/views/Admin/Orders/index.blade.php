@extends('layouts.app')
@section('content')
<h1 class="text-center pt-5 pb-5">I MIEI ORDINI</h1>
@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-light text-center ">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Numero </th>
                    <th>Indirizzo</th>
                    <th>Prezzo</th>
                    <th>Descrizione</th>
                    <th>Stato</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($orders as $order)
                <tr class="table-danger text-center">
                    <td class="pt-4 pb-4">{{$order->id}}</td>
                    <td>{{$order->full_name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->description}}</td>
                    <td>{{$order->status}}</td>
                </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
</div>

@endsection