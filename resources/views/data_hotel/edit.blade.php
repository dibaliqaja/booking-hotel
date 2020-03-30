@extends('layouts_template.home')
@section('title_page','Edit Hotel')

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

    <form action="{{ route('hotel.update', $hotel->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $hotel->name }}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" autocomplete="on" runat="server" value="{{ $hotel->address }}">
        </div>
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" class="form-control" name="latitude" id="latitude" value="{{ $hotel->latitude }}" readonly>
        </div>
        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" class="form-control" name="longitude" id="longitude" value="{{ $hotel->longitude }}" readonly>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Update Hotel</button>
            <a href="{{ route('hotel.index') }}" class="btn btn-danger">Back</a>
        </div>
    </form>

@endsection
