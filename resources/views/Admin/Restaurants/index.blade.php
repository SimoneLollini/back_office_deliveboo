@extends('layouts.admin')
@section('content')
<h1>restaurants</h1>
@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
<a class="btn btn-primary position-fixed bottom-0 end-0 m-5" href="{{route('admin.restaurants.create')}}" role="button"><i class="fas fa-plus fa-lg "></i></a>
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped
    table-hover	
    table-borderless
    table-primary
    align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Restaurant Name</th>
                    <th>Phone Number</th>
                    <th>P.IVA</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($restaurants as $restaurant)
                <tr class="table-primary">
                    <td>{{$restaurant->id}}</td>
                    <td>{{$restaurant->name}}</td>
                    <td>{{$restaurant->phone}}</td>
                    <td>{{$restaurant->piva}}</td>
                    <td>{{$restaurant->address}}</td>
                    <td>
                        <div class="actions d-sm-flex d-xxl-block flex-column p-3 min">
                            <a href="{{route('admin.restaurants.show', $restaurant->id)}}" class="btn bg-primary"><i class="fas fa-eye fa-md text-light"></i></a>
                            <a href="{{route('admin.restaurants.edit', $restaurant->id)}}" class="btn bg-secondary my-1"><i class="fas fa-pencil fa-md text-light"></i></a>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleterestaurant-{{$restaurant->id}}">
                                <i class="fas fa-trash fa-md text-light"></i>
                            </button>


                            <div class="modal fade" id="deleterestaurant-{{$restaurant->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{$restaurant->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId-{{$restaurant->id}}">Delete restaurant</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Stai per cancellare in maniera inreversibile "{{$restaurant->name}}". Sei Sicuro?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{route('admin.restaurants.destroy', $restaurant->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Confirm
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
</div>

@endsection