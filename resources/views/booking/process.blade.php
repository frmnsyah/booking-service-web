@extends('layouts.template')
@section('content')
<title>Booking | Proses Booking</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Proses Booking</h6>
    </div>
    <div class="card-body">
        <h6 class="m-0 font-weight-bold">Data Customer</h6>
        <table class="table table-bordered" cellspacing="0">
                <tr>
                    <td>Atas Nama</td>
                    <td>{{$booking['customer']['nama']}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{$booking['customer']['alamat']}}</td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>{{$booking['customer']['no_hp']}}</td>
                </tr>
        </table>
        <h6 class="m-0 font-weight-bold">Data Booking</h6>
        <table class="table table-bordered" cellspacing="0">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Tanggal & Jam</th>
                    <th>Tipe</th>
                    <th>Jenis</th>
                    <th>Tahun</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$booking['category']['kategori']}}</td>
                    <td>{{$booking['tanggal']}}</td>
                    <td>{{$booking['type_mobil']}}</td>
                    <td>{{$booking['jenis_mobil']}}</td>
                    <td>{{$booking['tahun']}}</td>
                </tr>
            </tbody>
        </table>
        <form action="/booking/doprocess" method="post">
            @csrf
            <input type="hidden" name="booking_id" value="{{ $booking['id'] }}">
            <div class="form-group">
                <label for="">Mekanik</label>
                <select name="mekanik" id="mekanik" class="form-control" required>
                    <option>-- Pilih Mekanik --</option>
                    @foreach ($mekanik as $k => $v)
                        <option value="{{ $v['nama']}}">{{ $v['nama'] }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Proses" class="btn btn-warning">
        </form>
    </div>
</div>


@endsection