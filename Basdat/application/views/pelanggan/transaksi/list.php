<p>
  <a href="<?php echo base_url('pelanggan/transaksi/beli') ?>" class="btn btn-success btn-m">
    <i class="nav-icon fa fa-plus"></i> Beli Produk</a>
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
      <th>TANGGAL</th>
      <th>ID ORDER</th>
      <th>NAMA BARANG</th>
      <th>HARGA BARANG</th>
      <th>NAMA CUSTOMER</th>
      <th>QTY</th>
      <th>JUMLAH</th>
      <th>TOTAL</th>
      <th>BAYAR</th>
      <th>KEMBALI</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach ($transaksi as $transaksi) { ?>
      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $transaksi->TANGGAL ?></td>
        <td><?php echo $transaksi->ID_ORDER ?></td>
         <td><?php echo $transaksi->NAMA_BARANG ?></td>
         <td><?php echo $transaksi->HARGA_BARANG ?></td>
           <td><?php echo $transaksi->NAMA_CUSTOMER ?></td>
           <td><?php echo $transaksi->QTY ?></td>
           <td><?php echo $transaksi->JUMLAH ?></td>
           <td><?php echo $transaksi->TOTAL ?></td>
        <td><?php echo number_format($transaksi->BAYAR,'0',',','.') ?></td>
        <td><?php echo $transaksi->KEMBALI ?></td>
      </tr>
    <?php $no++; } ?>
  </tbody>
</table>