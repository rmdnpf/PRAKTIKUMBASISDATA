<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// View All produk
	public function listing()
	{
		$this->db->select('BARANG_07064.*,
						CUSTOMER_07064.NAMA_CUSTOMER');
		$this->db->from('BARANG_07064');
		// Join
		$this->db->join('CUSTOMER_07064', 'CUSTOMER_07064.ID_CUSTOMER = BARANG_07064.ID_BARANG', 'left');
		// End Join
		$this->db->order_by('ID_BARANG', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail All produk untuk edit
	public function detail($id_produk)
	{
		$this->db->select('*');
		$this->db->from('BARANG_07064');
		$this->db->where('ID_BARANG', $id_produk);
		$this->db->order_by('ID_BARANG', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// tambah data produk
	public function tambah($data)
	{
		$this->db->insert('BARANG_07064', $data);
	}

	// Edit data produk
	public function edit($data)
	{
		$this->db->where('ID_BARANG', $data['ID_BARANG']);
		$this->db->update('BARANG_07064',$data);
	}	

	// Delete data produk
	public function delete($data)
	{
		$this->db->where('ID_BARANG', $data['ID_BARANG']);
		$this->db->delete('BARANG_07064',$data);
	}	

}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */