@extends('layouts.template')
@section('content')
<title>Kategori | Booking Service</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/categories/update" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$kategori->id}}">
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="text" name="kategori" class="form-control" value="{{$kategori->kategori}}">
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
        </form>
    </div>
</div>


@endsection