@extends('layouts_template.home')
@section('title_page','Add Room')

@section('content')

    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    @endif

    <form action="{{ route('room.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" name="quantity" id="quantity">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" min="1" step="any" class="form-control" name="price" id="price">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Add Room</button>
            <a href="{{ route('room.index') }}" class="btn btn-danger">Back</a>
        </div>
    </form>

@endsection
