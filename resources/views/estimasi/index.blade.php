@extends('layouts.template')
@section('content')
<title>Estimasi Service | Booking Service</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Estimasi Service</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        @if( Session::get('masuk') !="")
            <div class='alert alert-success'><center><b>{{Session::get('masuk')}}</b></center></div>        
            @endif
            @if( Session::get('update') !="")
            <div class='alert alert-success'><center><b>{{Session::get('update')}}</b></center></div>        
            @endif
            <a href="/estimasi/create" class="btn btn-success">Buat Estimasi</a>
            <br>
            <br>
            <table id="dataTable" class="table table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estimasi as $i => $u)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$u->customer}}</td>
                        <td>{{$u->tanggal}}</td>
                        <td>{{$u->kategori}}</td>
                        <td>{{$u->grand_total}}</td>
                        <td><a href="/estimasi/print/{{ $u->id_estimasi}}" class="btn btn-primary btn-sm ml-2">Print</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection