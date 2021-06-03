@extends('layouts.index-pdf')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Surat Perintah Kerja</h1>
        <hr>
        <table width="100%">
            <tr>
                <td width="50%">Konsumen</td>
                <td width="50%" align="right">Tanggal</td>
            </tr>
            <tr>
                <td><b>{{ $service['booking']['customer']['nama'] }}</b></td>
                <td align="right"><b>{{ $service['booking']['tanggal'] }}</b></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td align="right">Alamat Service</td>
            </tr>
            <tr>
                <td ><b>{{ $service['booking']['customer']['no_hp'] }}</b></td>
                <td align="right"><b>{{ $service['booking']['customer']['alamat'] }}</b></td>
            </tr>
        </table>
        <br><br><br>
        <table width="100%">
                    <tr>
                        <td>Kategori</td>
                        <td>Tipe Kendaraan</td>
                        <td>Jenis Kendaraan</td>
                        <td width="10%">Tahun</td>
                    </tr>
                        <tr>
                            <td>{{ $service['booking']['category']['kategori'] }}</td>
                            <td>{{ $service['booking']['jenis_mobil'] }}</td>
                            <td>{{ $service['booking']['type_mobil'] }}</td>
                            <td>{{ $service['booking']['tahun'] }}</td>
                        </tr>  
                </table>
        <br>
        <hr>
        <table width="100%">
            <tr>
                <td width="40%">
                    <p>Walk Around Check</p>
                    <table width="100%">
                        <tr>
                            <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                            <td>&nbsp;&nbsp;<label for="vehicle1">Owner Manual</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                            <td>&nbsp;&nbsp;<label for="vehicle1">System Alarm</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                            <td>&nbsp;&nbsp;<label for="vehicle1">Ban Serep</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                            <td>&nbsp;&nbsp;<label for="vehicle1">Dongkrak</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                            <td>&nbsp;&nbsp;<label for="vehicle1">Tools</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                            <td>&nbsp;&nbsp;<label for="vehicle1">Segitiga Pengaman</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                            <td>&nbsp;&nbsp;<label for="vehicle1">Kotak Obat</label></td>
                        </tr>
                    </table>
                </td>
                <td width="60%">
                    <table width="100%">
                        <tr>
                            <td width="30%">STNK</td>
                            <td width="1%">:</td>
                            <td>Ada / Tidak</td>
                        </tr>
                        <tr>
                            <td>Buku Service</td>
                            <td>:</td>
                            <td>Ada / Tidak</td>
                        </tr>
                        <tr>
                            <td>Pembayaran</td>
                            <td>:</td>
                            <td>Cash / C.Card / SPK</td>
                        </tr>
                        <tr>
                            <td>Penggantian Part</td>
                            <td>:</td>
                            <td>Langsung / Izin</td>
                        </tr>
                        <tr>
                            <td>Cuci</td>
                            <td>:</td>
                            <td>Ya / Tidak</td>
                        </tr>
                        <tr>
                            <td>No Polisi</td>
                            <td>:</td>
                            <td>...............</td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td>:</td>
                            <td>............................................</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <hr>
        <br>
        <table width="100%">
            <tr style="margin-top: 100px">
                <td>Mekanik</td>
                <td align="right">Customer</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td>({{ $service['mekanik'] }})</td>
                <td align="right">({{ $service['booking']['customer']['nama'] }})</td>
            </tr>
        </table>

    </div>
</div>          
@endsection
