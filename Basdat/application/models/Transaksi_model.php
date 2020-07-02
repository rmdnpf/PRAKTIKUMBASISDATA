<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// View All transaksi
	public function listing()
	{
		$this->db->select('TRANSAKSI_07064.*,
						BARANG_07064.*,
						CUSTOMER_07064.NAMA_CUSTOMER');
		$this->db->from('TRANSAKSI_07064');
		// Join
		$this->db->join('BARANG_07064', 'BARANG_07064.ID_BARANG = TRANSAKSI_07064.ID_BARANG', 'left');
		$this->db->join('CUSTOMER_07064', 'CUSTOMER_07064.ID_CUSTOMER = TRANSAKSI_07064.ID_CUSTOMER', 'left');
		// End Join
		$this->db->order_by('ID_ORDER', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail All transaksi untuk edit
	public function detail($id_transaksi)
	{
		$this->db->select('*');
		$this->db->from('TRANSAKSI_07064');
		$this->db->where('ID_ORDER', $id_transaksi);
		$this->db->order_by('ID_ORDER', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// tambah data transaksi
	public function tambah($data)
	{
		$this->db->insert('TRANSAKSI_07064', $data);
	}

	// Edit data transaksi
	public function edit($data)
	{
		$this->db->where('ID_ORDER', $data['ID_ORDER']);
		$this->db->update('TRANSAKSI_07064',$data);
	}	

	// Delete data transaksi
	public function delete($data)
	{
		$this->db->where('ID_ORDER', $data['ID_ORDER']);
		$this->db->delete('TRANSAKSI_07064',$data);
	}	

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */