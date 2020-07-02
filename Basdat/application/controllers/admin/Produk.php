<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	// Load Modul
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		// proteksi halam admin dengan fungsi cek_lign yang ada di simple login
		//$this->simple_login->cek_login();
	}

	// Data Produk
	public function index()
	{
		$produk = $this->produk_model->listing();

		$data = array(	'title'		=> 'Data Produk',
						'produk'		=> $produk,
						'isi'		=> 'admin/produk/list'
					);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah()
	{
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('NAMA_BARANG','Nama_Barang','required',
			array(	'required'			=>'%s harus diisi'));

		$valid->set_rules('HARGA_BARANG','Harga','required',
			array(	'required'			=>'%s harus diisi'));

		if($valid->run()===FALSE) {
		// end validasi

		$data = array(	'title'		=> 'Tambah Produk',
						'isi'		=> 'admin/produk/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'NAMA_BARANG'		=>$i->post('NAMA_BARANG'),
							'HARGA_BARANG'					=>$i->post('HARGA_BARANG')
						);
			$this->produk_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/produk'),'refresh');
		}
		// End Masuk Database
	}

	// Edit Barang
	public function edit($id_produk)
	{
		$produk = $this->produk_model->detail($id_produk);

		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('NAMA_BARANG','Nama','required',
			array(	'required'			=>'%s harus diisi'));

		$valid->set_rules('HARGA_BARANG','Harga','required',
			array(	'required'			=>'%s harus diisi'));

		if($valid->run()===FALSE) {
		// end validasi

		$data = array(	'title'		=> 'Edit Produk',
						'produk'		=> $produk,
						'isi'		=> 'admin/produk/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'ID_BARANG'			=> $id_produk,
							'NAMA_BARANG'			=> $i->post('NAMA_BARANG'),
							'HARGA_BARANG'			=> $i->post('HARGA_BARANG')
						);
			$this->produk_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/produk'),'refresh');
		}
		// End Masuk Database
	}

	// Delete Produk
	public function delete($id_produk)
	{
		$data = array('ID_BARANG'	=> $id_produk);
		$this->produk_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/produk'),'refresh');
	}

}

/* End of file Produk.php */
/* Location: ./application/controllers/admin/Produk.php */