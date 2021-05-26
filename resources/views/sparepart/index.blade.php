@extends('layouts.template')
@section('content')
<title>Sparepart | Booking Service</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Sparepart</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if( Session::get('masuk') !="")
            <div class='alert alert-success'><center><b>{{Session::get('masuk')}}</b></center></div>        
            @endif
            @if( Session::get('update') !="")
            <div class='alert alert-success'><center><b>{{Session::get('update')}}</b></center></div>        
            @endif
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data</button>
                </div>
            </div>
            <br>
            <br>
            <table id="dataTable" class="table table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barcode</th>
                        <th>Nama Sparepart</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sparepart as $i => $u)
                    <tr>
                        <td>{{++$i}}</td>
                        <td> <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($u->id_sparepart, 'C39')}}" height="60" width="180"></td>
                        <td>{{$u->nama}}</td>
                        <td>{{$u->harga}}</td>
                        <td><a href="/sparepart/edit/{{$u->id_sparepart}}" class="btn btn-primary btn-sm ml-2">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="tambah" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Masukan Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form action="/sparepart/store" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="">Nama Sparepart</label>
            <input type="text" name="nama" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">Harga</label>
            <input type="text" name="harga" class="form-control"  required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
    </div>
</div>
</div>
@endsection