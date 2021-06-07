@extends('layouts.template')
@section('content')
<title>Booking | Proses Service</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Proses Service</h6>
    </div>
    <div class="card-body">
        <h6 class="m-0 font-weight-bold">Data Customer</h6>
        <table class="table table-bordered" cellspacing="0">
                <tr>
                    <td>Atas Nama</td>
                    <td>{{$service['booking']['customer']['nama']}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{$service['booking']['customer']['alamat']}}</td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>{{$service['booking']['customer']['no_hp']}}</td>
                </tr>
        </table>
        <h6 class="m-0 font-weight-bold">Data Service</h6>
        <table class="table table-bordered" cellspacing="0">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Tanggal & Jam</th>
                    <th>Tipe</th>
                    <th>Jenis</th>
                    <th>Mekanik</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$service['booking']['category']['kategori']}}</td>
                    <td>{{$service['booking']['tanggal']}}</td>
                    <td>{{$service['booking']['type_mobil']}}</td>
                    <td>{{$service['booking']['jenis_mobil']}}</td>
                    <td>{{$service['mekanik']}}</td>
                </tr>
            </tbody>
        </table>
        <form action="/services/doprocess" method="post">
            @csrf
            <input type="hidden" name="service_id" value="{{ $service['id'] }}">
            <div class="form-group">
                <label for="">Catatan</label>
                <textarea class="form-control" rows="8" readonly>{{ $service['catatan'] }}</textarea>
            </div>
            <div class="form-group">
                <label for="">No Polisi Kendaraan</label>
                <input class="form-control" name="no_polisi" value="{{ $service['no_polisi'] }}" readonly/>
            </div>
            <div class="form-group">
                <label for="">Total Biaya Service</label>
                <input class="form-control" name="total_biaya" value="{{ $service['total_biaya'] }}" readonly/>
            </div>
            <input type="submit" value="Submit" class="btn btn-success">
        </form>
    </div>
</div>


@endsection