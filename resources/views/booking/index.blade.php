@extends('layouts.template')
@section('content')
<title>Booking</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Booking</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        @if( Session::get('masuk') !="")
            <div class='alert alert-success'><center><b>{{Session::get('masuk')}}</b></center></div>        
            @endif
            @if( Session::get('update') !="")
            <div class='alert alert-success'><center><b>{{Session::get('update')}}</b></center></div>        
            @endif
            <br>
            <br>
            <table id="dataTable" class="table table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Kategori</th>
                        <th>Tanggal & Jam</th>
                        <th>Tipe</th>
                        <th>Jenis</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $i => $booking)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$booking['customer']['nama']}}</td>
                        <td>{{$booking['category']['kategori']}}</td>
                        <td>{{$booking['tanggal']}}</td>
                        <td>{{$booking['type_mobil']}}</td>
                        <td>{{$booking['jenis_mobil']}}</td>
                        <td>{{$booking['tahun']}}</td>
                        <td><a href="/booking/process/{{$booking['id']}}" class="btn btn-primary btn-sm ml-2">Proses</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection