<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// View All user
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('CUSTOMER_07064');
		$this->db->order_by('ID_CUSTOMER', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail All user untuk edit
	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('CUSTOMER_07064');
		$this->db->where('ID_CUSTOMER', $id_user);
		$this->db->order_by('ID_CUSTOMER', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// Login User
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('CUSTOMER_07064');
		$this->db->where(array( 'NAMA_CUSTOMER'	=> $username));
		$this->db->order_by('ID_CUSTOMER', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// tambah data user
	public function tambah($data)
	{
		$this->db->insert('CUSTOMER_07064', $data);
	}

	// Edit data user
	public function edit($data)
	{
		$this->db->where('ID_CUSTOMER', $data['ID_CUSTOMER']);
		$this->db->update('CUSTOMER_07064',$data);
	}	

	// Delete data user
	public function delete($data)
	{
		$this->db->where('ID_CUSTOMER', $data['ID_CUSTOMER']);
		$this->db->delete('CUSTOMER_07064',$data);
	}	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */