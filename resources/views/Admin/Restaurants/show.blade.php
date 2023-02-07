@extends('layouts.admin')
@section('content')
<a class="btn btn-primary" href="{{ route('admin.restaurants.index') }}" role="button"><i class="fas fa-angle-left fa-fw"></i></a>
<div class="container text-center p-5 d-flex align-items-center flex-column">
        
        <h1 class="mt-4">{{$restaurant->name}}</h1>
        <h3>{{$restaurant->phone}}</h3>
        <h5>{{$restaurant->address}}</h5>
        <h6>{{ $restaurant->piva}}</h6>
        

</div>
@endsection