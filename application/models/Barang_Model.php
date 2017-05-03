<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_Model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getDataBarang()
		{
			$this->db->select("id,nama,kode,DATE_FORMAT(tanggal_beli,'%d-%m-%Y') as tanggal_beli,foto,fk_kategori");
			$query = $this->db->get('barang');
			return $query->result();
		}

		public function getDataBarangId($id)
		{
			$this->db->select("barang.id,barang.nama,barang.kode,DATE_FORMAT(tanggal_beli,'%d-%m-%Y') as tanggal_beli,foto,fk_kategori,kategori.nama as kategori,kategori.id as idkategori");
			$this->db->where('fk_kategori', $id);
			$this->db->join('kategori', 'kategori.id = barang.fk_kategori', 'left');
			$query = $this->db->get('barang');
			return $query->result();
		}

		public function getDataBarangById($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('barang');			
			return $query->result();
		}

		public function getKategoriByBarang($idBarang)
		{
			$this->db->select("barang.nama, kategori.nama as namaKategori, kategori.id, barang.fk_kategori, barang.kode, barang.tanggal_beli");
			$this->db->where('fk_kategori', $idBarang);	
			$this->db->join('kategori', 'kategori.id = barang.fk_kategori', 'left');	
			$query = $this->db->get('kategori');
			return $query->result();
		}
		
		public function insertBarang($idBarang)
		{
			$object = array(
				'nama' => $this->input->post('nama'),
			    'kode' => $this->input->post('kode') ,
			    'tanggal_beli' => $this->input->post('tanggal_beli') ,			    
			    'foto' => $this->upload->data('file_name'), 
			    'fk_kategori' => $idBarang
			    );
			$this->db->insert('barang',$object); 
		}


		public function getBarang($id)
		{
			$this->db->where('id', $id);	
			$query = $this->db->get('barang',1);
			return $query->result();

		}

		public function updateById($id)
		{
			$data = array(
				'nama' => $this->input->post('nama'),
				'kode' => $this->input->post('kode'),
				'tanggal_beli' => $this->input->post('tanggal_beli'),				
				'foto' => $this->upload->data('file_name'), 
				);
			$this->db->where('id', $id);
			$this->db->update('barang', $data);
		}

		public function deleteById($id) 
		{
			$this->db->where('id',$id);
			$this->db->delete('barang');
		}

		//kategori
		public function insertKategori()
		{
			$object = array(
				'nama' => $this->input->post('nama') 
				);
			$this->db->insert('kategori', $object);
		}
		public function getDataKategori()
		{
			$this->db->select("*");
			$query = $this->db->get('kategori');
			return $query->result();
		}
		public function getDataKategoriById($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('kategori');
			return $query->result();
		}
		public function updateKategoriById($id)
		{
			$data = array(
				'nama' => $this->input->post('nama')				
				);
			$this->db->where('id', $id);
			$this->db->update('kategori', $data);
		}
		public function deleteKategoriById($id) 
		{
			$this->db->where('id',$id);
			$this->db->delete('kategori');
		}
}

/* End of file barang_Model.php */
/* Location: ./application/models/barang_Model.php */
 ?>