<?php
  //Errro upload
  if (isset($error)) {
   	echo '<p class="alert-warning">';
   	echo $error;
   	echo '</p>';  
  } 
	// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

	// Form Open
echo form_open_multipart(base_url('admin/produk/tambah'),' class="form_horizontal"');
?>

<div class="card card-primary">
	<div class="card-header"></div>
	<form role="form">
		<div class="card-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Nama Produk</label>
				<input type="text" name="NAMA_BARANG" class="form-control" placeholder="Nama Barang" value="<?php echo set_value('NAMA_BARANG') ?>" required>
			<div class="form-group">
				<label for="exampleInputEmail1">Harga Barang</label>
				<input type="text" name="HARGA_BARANG" class="form-control" placeholder="Harga Barang" value="<?php echo set_value('HARGA_BARANG') ?>" required>
			</div>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
				<button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-times"></i> Reset</button>
			</div>
		</div>
	</form>
</div>

<?php echo form_close(); ?>