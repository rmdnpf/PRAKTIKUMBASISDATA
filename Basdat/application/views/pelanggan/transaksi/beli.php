<?php  
	// Notifikasi error
	echo validation_errors('<div class="alert alert-warning">','</div>');

	// Form Open
	echo form_open_multipart(base_url('pelanggan/transaksi/beli'),' class="form_horizontal"');
?>

<div class="card card-primary">
	<div class="card-header"></div>
	<form ation="proses.php" method="get" role="form">
		<div class="card-body">
			<div class="form-group">
				<label>Produk</label>
				<select id="myselect" name="ID_BARANG"class="form-control">
					<?php foreach ($produk as $produk) {?>
						<option value="<?php echo $produk->ID_BARANG ?>"
							data-harga="<?php echo $produk->HARGA_BARANG ?>"><?php echo $produk->NAMA_BARANG ?>
						</option>

					<?php } ?>
				</select>
			</div>
				<div class="form-group">
				<label for="exampleInputEmail1">Harga Barang</label>
				<input type="text" name="hargab" onkeyup="kali()"  value="" class="form-control harga" placeholder="Harga Barang"   required>
			</div>
			<div class="form-group">
				<label>Customer</label>
				<select name="ID_CUSTOMER"class="form-control">
					<?php foreach ($user as $user) {?>
						<option value="<?php echo $user->ID_CUSTOMER ?>">
							<?php echo $user->NAMA_CUSTOMER ?>
						</option>
					<?php } ?>
				</select>
			<div class="form-group">
				<label for="exampleInputEmail1">Qty</label>
				<input type="text" name="QTY" onkeyup="kali()"  class="form-control" placeholder="Qty" value="<?php echo set_value('QTY') ?>"  required>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Jumlah</label>
				<input type="text" name="JUMLAH" onkeyup="auto()"  class="form-control" placeholder="Jumlah"   required>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Total</label>
				<input type="text" name="TOTAL" onkeyup="sum()" class="form-control" placeholder="Total"  required>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Bayar</label>
				<input type="text" name="BAYAR" onkeyup="sum()" class="form-control" placeholder="Bayar"  required>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Kembali</label>
				<input type="text" name="KEMBALI" class="form-control" placeholder="Kembali"  required>
			</div>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
				<button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-times"></i> Reset</button>
			</div>
		</div>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script type="text/javascript">
		function sum(){
			var bil1 = $('input[name="BAYAR"]').val();
			var bil2 = $('input[name="TOTAL"]').val();
			var hasil = parseInt(bil1) - parseInt(bil2);
			if (!isNaN(hasil)){
				$('input[name="KEMBALI"]').val(hasil);
			} else {
				$('input[name="KEMBALI"]').val(0);
			}
		}
		function kali(){
			var bil1 = $('input[name="QTY"]').val();
			var bil2 = $('input[name="hargab"]').val();
			var hasil = parseInt(bil1) * parseInt(bil2);
			if (!isNaN(hasil)){
				$('input[name="JUMLAH"]').val(hasil);
				$('input[name="TOTAL"]').val(hasil);
			} else {
				$('input[name="JUMLAH"]').val(0);
			}
		}
		function auto(){
			var bil1 = $('input[name="JUMLAH"]').val();
			var hasil = parseInt(bil1);
			if (!isNaN(hasil)){
				$('input[name="TOTAL"]').val(hasil);
			} else {
				$('input[name="TOTAL"]').val(0);
			}
		}
		$(document).ready(function(){
	$('#myselect').change(function(){
  		$('.harga').val($( "#myselect option:selected" ).data('harga')); 
  });
});

	</script>
	</form>
</div>



<?php echo form_close(); ?>