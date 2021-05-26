@extends('layouts.index-pdf')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Estimasi Service</h1>
        <hr>
        <table width="100%">
            <tr>
                <td width="50%">Konsumen</td>
                <td width="50%" align="right">Tanggal</td>
            </tr>
            <tr>
                <td><b>{{ $estimasi->customer }}</b></td>
                <td align="right"><b>{{ $estimasi->tanggal }}</b></td>
            </tr>
            <tr>
                <td >Kategori</td>
                <td align="right">Durasi</td>
            </tr>
            <tr>
                <td ><b>{{ $estimasi->kategori->kategori }}</b></td>
                <td align="right"><b>{{ $estimasi->kategori->durasi }}</b></td>
            </tr>
        </table>
        <br><br><br>
        <table width="100%" border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="5%">No</td>
                        <td>Sparepart</td>
                        <td width="10%">Harga</td>
                        <td width="10%">Jumlah</td>
                        <td width="10%">Subtotal</td>
                    </tr>
                        @foreach($estimasi->details as $k => $v)
                        <tr>
                            <td>{{ ++$k }}</td>
                            <td>{{ $v->sparepart->nama }}</td>
                            <td>{{ $v->sparepart->harga }}</td>
                            <td>{{ $v->jumlah }}</td>
                            <td>{{ $v->subtotal }}</td>
                        </tr>  
                        @endforeach
                </table>
        <br><br><br>
        <table width="100%">
            <tr>
                <td width="80%" align="right">Biaya Jasa: </td>
                <td width="20%" align="right"><b>{{ $estimasi->kategori->biaya }}</b> </td>
            </tr>
            <tr>
                <td width="80%" align="right">Grand Total: </td>
                <td width="20%" align="right"><b>{{ $estimasi->grand_total }}</b> </td>
            </tr>
        </table>
    </div>
</div>          
@endsection
