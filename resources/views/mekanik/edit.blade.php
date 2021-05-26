@extends('layouts.template')
@section('content')
<title>Mekanik | Booking Service</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/mekanik/update" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$mekanik->id}}">
            <div class="form-group">
                <label for="">Nama </label>
                <input type="text" name="nama" class="form-control" value="{{$mekanik->nama}}">
            </div>
            <div class="form-group">
                <label for="">No Mekanik</label>
                <input type="text" name="no_mekanik" class="form-control" value="{{$mekanik->no_mekanik}}">
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
        </form>
    </div>
</div>


@endsection