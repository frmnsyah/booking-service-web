@extends('layouts.template')
@section('content')
<title>Buat Estimasi | Booking Service</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Buat Estimasi</h6>
    </div>
    <div class="card-body">
    <form action="/estimasi/store" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Konsumen</label>
                    <input type="text" name="estimasi[customer]" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="text" name="estimasi[tanggal]" class="form-control datepicker" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Kategori Service</label>
                    <select name="estimasi[kategori]" id="kategori" class="form-control" required>
                        <option>-- Pilih Kategori Service --</option>
                        @foreach ($kategori as $k => $v)
                            <option value="{{ $v->id_kategori . '_' . $v->biaya}}">{{ $v->kategori }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" id="btn-add">Tambah Sparepart</button>
                <hr>
                <table class="table table-bordered" id="table-sparepart">
                    <tr>
                        <td>No</td>
                        <td>Sparepart</td>
                        <td>Harga</td>
                        <td>Jumlah</td>
                        <td>Subtotal</td>
                        <td>Aksi</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Biaya Jasa</label>
                    <input type="text" name="estimasi[biaya_jasa]" id="biaya_jasa" class="form-control" disabled="true">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Grand Total</label>
                    <input type="text" name="estimasi[grand_total]" id="grandtotal" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary pull-right">Cetak Estimasi</button>
            </div>
        </div>
        </form>
    </div>
</div>


@push('scripts')

<script type="text/javascript">
    $('.datepicker').datepicker();

    $("#btn-add").click(function(){
		/* Start Of add row function */
		var rowCount = $("#table-sparepart tr").length;
		var row = rowCount - 1 ;
		var  no = row + 1 ;
		tro = "<tr>";
		col1= "<td>"+no+"</td>";
		col2= "<td> <select name='sparepart["+ row +"][sparepart]' class='form-control combo' id='cmb_sparepart_"+ row +"'></select></td>";
		col3= "<td> <input type='text' id='inpt_harga_"+ row +"' name='sparepart["+ row +"][harga]' class='form-control' disabled></td>";
		col4= "<td> <input type='text' id='inpt_jumlah_"+ row +"' name='sparepart["+ row +"][jumlah]' class='form-control inputkey'></td>";
		col5= "<td> <input type='text' id='inpt_subtotal_"+ row +"' name='sparepart["+ row +"][subtotal]' class='subtotal form-control inputkey'></td>";
		col6= "<td> <button class='btn-rem btn btn-danger btn-sm' align='center'>Hapus</button> </td>";
		trc = "</tr>";
		th = tro + col1 + col2 + col3 + col4 + col5 + col6 + trc;
		
		$("#table-sparepart").append(th);
		/* End Of add row function */

		/* Start Of delete row function */
		$(".btn-rem").click(function(){
			var tr =$(this).parent().parent() //tr ;
			tr.remove() ;   
		});
			/* End Of add row function */
		
		fillcombo('cmb_sparepart_' + row);
		return false;
	
		});
	
    $(document).delegate('#kategori','change',function(){
		var id = $(this).attr('id');
        var val = $(this).val().split('_');
        $('#biaya_jasa').val(val[1])
        var total = hitungtotal()
		$("#grandtotal").val(total);
    });

    $(document).delegate('.combo','change',function(){
		var value = $(this).val();
        var id = $(this).attr('id');
        var rows = id.split('_');
        var row = rows[2];
					$.ajax({
						type :"GET",
                        dataType : "json",
						url :"{{ url('sparepart/get') }}/"+ value, 
						success : function (v){
							$('#inpt_harga_' +row).val(v.data.harga);
						} 
		});	
    });
    $(document).delegate('.inputkey','keyup',function(){
			var qty = $(this).val();
	        var id = $(this).attr('id');
	        var rows = id.split('_');
	        var row = rows[2];

	        var harga =$('#inpt_harga_'+row).val();
	        var subtotal = harga * qty ;
	        $("#inpt_subtotal_"+row).val(subtotal);
    });

    $(document).delegate('.subtotal','focus',function(){
        var total = hitungtotal()
		$("#grandtotal").val(total);    
    });

    function hitungtotal() {
        var total = 0 ;
	    var biaya = $("#biaya_jasa").val() == "" ? 0 : $("#biaya_jasa").val();
        console.log(biaya)
	    var cost = $(".subtotal");
	    cost.each(function(){
	    	var i = Number($(this).val());
	    	total += i ; //sama saja seperti total =total + i
	    });
        return total + Number(biaya)    
    }

	function fillcombo(id) {
		$.ajax({
			type :"GET",
			url :"{{ url('sparepartlist') }}",
			dataType : "json",
			success : function (msg){
				$("#" + id).empty();
				$("#" + id).append("<option value=''>-----</option>");
				$.each(msg.data,function(key,value){
					//alert(key+"-"+value.nama_);
					$("#" + id).append("<option value='"+value.id_sparepart+"' id='sparepart-"+value.id_sparepart+"'' >"+value.nama+"</option>");	
				}); 				
			}
				
		});

	}
</script>
@endpush
@endsection