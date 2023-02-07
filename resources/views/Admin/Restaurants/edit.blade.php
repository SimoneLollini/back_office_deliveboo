@extends('layouts.admin')
@section('content')
<a class="btn btn-primary" href="{{ route('admin.restaurants.index') }}" role="button"><i class="fas fa-angle-left fa-fw"></i></a>
    <div class="container">
    <h1 class="py-5">Modify restaurant</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('admin.restaurants.update', $restaurant->id) }}" method="post" class="card p-3" enctype="multipart/form-data">        
        @csrf
        @method('PUT')

        {{-- SEPARATORE --}}

        <div class="mb-3">
            <label for="name" class="form-label">Name <strong class="text-danger">*</strong></label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="add name"  value="{{ old('name', $restaurant->name) }}">        
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- SEPARATORE --}}

        <div class="mb-3">
            <label for="phone" class="form-label">Phone <strong class="text-danger">*</strong></label>
            <input type="text" phone="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="add phone"  value="{{ old('phone', $restaurant->phone) }}">        
        </div>
        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- SEPARATORE --}}

        <div class="mb-3">
            <label for="piva" class="form-label">P.IVA <strong class="text-danger">*</strong></label>
            <input type="text" piva="piva" id="piva" class="form-control @error('piva') is-invalid @enderror" placeholder="add piva"  value="{{ old('piva', $restaurant->piva) }}">        
        </div>
        @error('piva')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- SEPARATORE --}}

        <div class="mb-3">
            <label for="address" class="form-label">address <strong class="text-danger">*</strong></label>
            <input type="text" address="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="add address"  value="{{ old('address', $restaurant->address) }}">        
        </div>
        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      

        {{-- SEPARATORE --}}

        <button type="submit" class="btn btn-primary">Update</button>

    </form>
</div>

@endsection