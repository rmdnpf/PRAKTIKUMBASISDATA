<p>
	<a href="<?php echo base_url('admin/produk/tambah') ?>" class="btn btn-success btn-sm">
		<i class="nav-icon fa fa-plus"></i> Tambah Produk</a>
</p>

<?php  
	// Notifikasi
	if ($this->session->flashdata('sukses')) {
		echo '<p class="alert alert-success">';
		echo $this->session->flashdata('sukses');
	}
?>

<table id="example2" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>NO</th>
			<th>ID</th>
			<th>NAMA</th>
			<th>HARGA</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($produk as $produk) { ?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $produk->ID_BARANG ?></td>
				<td><?php echo $produk->NAMA_BARANG ?></td>
				<td><?php echo number_format($produk->HARGA_BARANG,'0',',','.') ?></td>
				<td>
					<a href="<?php echo base_url('admin/produk/edit/'.$produk->ID_BARANG) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<?php include ('delete.php'); ?>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>