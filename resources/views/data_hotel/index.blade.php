@extends('layouts_template.home')
@section('title_page','Data Hotel')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <a href="{{ route('hotel.create') }}" class="btn btn-primary">Add Hotel</a><br><br>
    
    <table class="table table-hover" width="100%" id="hotel-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>

@endsection
