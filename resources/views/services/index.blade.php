@extends('layouts.template')
@section('content')
<title>Services</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Service</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        @if( Session::get('masuk') !="")
            <div class='alert alert-success'><center><b>{{Session::get('masuk')}}</b></center></div>        
            @endif
            @if(Session::get('update') != "")
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
                        <th>Tanggal</th>
                        <th>Tipe</th>
                        <th>Jenis</th>
                        <th>Mekanik</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $i => $service)
                    <tr class="{{ ($service['status']) ? 'alert-primary' : 'alert-success' }}">
                        <td>{{++$i}}</td>
                        <td>{{$service['booking']['customer']['nama']}}</td>
                        <td>{{$service['booking']['category']['kategori']}}</td>
                        <td>{{$service['tanggal']}}</td>
                        <td>{{$service['booking']['type_mobil']}}</td>
                        <td>{{$service['booking']['jenis_mobil']}}</td>
                        <td>{{$service['mekanik']}}</td>
                        <td>
                            @if(!$service['status'])
                            <a href="/services/spk/{{$service['id']}}" class="btn btn-success btn-sm ml-2">Print SPK</a>
                            <a href="/services/process/{{$service['id']}}" class="btn btn-primary btn-sm ml-2">Selesai</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table cellspacing="0" width="20%">
                    <tr>
                        <td width="70%">Sedang Proses</td>
                        <td class="alert-success">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Selesai</td>
                        <td class="alert-primary">&nbsp;</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection