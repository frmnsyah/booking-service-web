@extends('layouts.template')
@section('content')
<title>sparepart | Booking Service</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/sparepart/update" method="post">
            @csrf
            <input type="hidden" name="id_sparepart" class="form-control" value="{{$sparepart->id_sparepart}}" required>
            <div class="form-group">
                <label for="">Nama sparepart</label>
                <input type="text" name="nama" class="form-control"  value="{{$sparepart->nama}}" required>
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type="text" name="harga" class="form-control"  value="{{$sparepart->harga}}"  required>
            </div>
        <a href="/sparepart" class="btn btn-primary">Kembali</a>
            <input type="submit" value="Update" class="btn btn-warning">
        </form>
    </div>
</div>


@endsection