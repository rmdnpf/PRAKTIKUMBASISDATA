<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->load->model('produk_model');
		$this->load->model('user_model');
	}

	public function index()
	{
		$transaksi 	= $this->transaksi_model->listing();
		$produk 	= $this->produk_model->listing();
		$user 	= $this->user_model->listing();

		$data = array(	'title'		=> 'Transaksi',
						'transaksi'	=> $transaksi,
						'produk'	=> $produk,
						'user'	=> $user,
						'isi'		=> 'pelanggan/transaksi/list'
					);
		$this->load->view('pelanggan/layout/wrapper', $data, FALSE);
		// proteksi halam admin dengan fungsi cek_lign yang ada di simple login
		//$this->pelanggan_login->cek_login();	
	}

	// Pembelian
	public function beli()
	{
		$transaksi 	= $this->transaksi_model->listing();
		$produk 	= $this->produk_model->listing();
		$user 	= $this->user_model->listing();
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('BAYAR','Bayar','required',
			array(	'required'			=>'%s harus diisi'));

		if($valid->run()===FALSE) {
		// end validasi

		$data = array(	'title'		=> 'Pembayaran',
						'transaksi'	=> $transaksi,
						'produk'	=> $produk,
						'user'	=> $user,
						'isi'		=> 'pelanggan/transaksi/beli'
					);
		$this->load->view('pelanggan/layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
			$i = $this->input;

			$data = array(	'ID_CUSTOMER'			=> $i->post('ID_CUSTOMER'),
							'ID_BARANG'				=> $i->post('ID_BARANG'),
							'QTY'				=> $i->post('QTY'),
							'JUMLAH'				=> $i->post('JUMLAH'),
							'TOTAL'				=> $i->post('TOTAL'),
							'BAYAR'					=> $i->post('BAYAR'),
							'KEMBALI'				=> $i->post('KEMBALI')
						);
			$this->transaksi_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Pembelian Sukses');
			redirect(base_url('pelanggan/transaksi'),'refresh');
		}
		// End Masuk Database
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/pelanggan/Dasbor.php */