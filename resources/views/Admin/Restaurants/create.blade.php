@extends('layouts.app')
@section('content')
<div class="container">
<h1 class="py-5">Add new restaurant</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <form action="{{route('admin.restaurants.store')}}" method="post" class="card p-3" enctype="multipart/form-data">
        @csrf

        {{-- SEPARATORE --}}

        <div class="mb-3">
            <label for="name" class="form-label">Name <strong class="text-danger">*</strong></label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="add name" value="{{ old('name') }}">
        </div>

        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- SEPARATORE --}}

        <div class="mb-3">
            <label for="phone" class="form-label">Phone <strong class="text-danger">*</strong></label>
            <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="add phone" value="{{ old('phone') }}">
        </div>

        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- SEPARATORE --}}

        <div class="mb-3">
            <label for="piva" class="form-label">P.IVA <strong class="text-danger">*</strong></label>
            <input type="text" name="piva" id="piva" class="form-control @error('piva') is-invalid @enderror" placeholder="add piva" value="{{ old('piva') }}">
        </div>

        @error('piva')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- SEPARATORE --}}

        <div class="mb-3">
            <label for="address" class="form-label">Address <strong class="text-danger">*</strong></label>
            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="add address" value="{{ old('address') }}">
        </div>

        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

       

        {{-- SEPARATORE --}}

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
@endsection