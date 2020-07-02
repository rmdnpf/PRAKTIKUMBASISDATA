<p>
	<a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success btn-sm">
		<i class="nav-icon fa fa-plus"></i> Tambah Customer</a>
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
			<th>NAMA CUSTOMER</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($user as $user) { ?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $user->ID_CUSTOMER?></td>
				<td><?php echo $user->NAMA_CUSTOMER ?></td>
				<td>
					<a href="<?php echo base_url('admin/user/edit/'.$user->ID_CUSTOMER) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<?php include ('delete.php'); ?>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>