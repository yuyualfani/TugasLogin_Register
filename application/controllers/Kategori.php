<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function index()
	{
		$this->load->model('barang_model');		
		$data["kategori_list"] = $this->barang_model->getDataKategori();
		$this->load->view('kategori', $data);
	}

	public function create()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->load->model('barang_model');
		if ($this->form_validation->run() == FALSE) {
			 $this->load->view('tambah_kategori_view');

		} else {
			$this->barang_model->insertKategori();						
			$data["kategori_list"] = $this->barang_model->getDataKategori();
			$this->load->view('kategori',$data);
		}
	}

	public function update($idKategori)
	{
		//load library
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('barang_model');
		$data['kategori']=$this->barang_model->getDataKategoriById($idKategori);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view

			$this->load->view('edit_kategori_view',$data);

		}else{			
			$this->barang_model->updateKategoriById($idKategori);
			$data["kategori"] = $this->barang_model->getDataKategori();
			$this->load->view('kategori',$data);
		}		
	}

	public function delete($id)
 	{ 
 	 	$this->load->model('barang_model');
  		$this->barang_model->deleteKategoriById($id);
 	 	redirect('kategori');
	 }

}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */

 ?>