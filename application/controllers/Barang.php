<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function index($id)
	{
		$this->load->model('barang_model');
		$data["barang_list"] = $this->barang_model->getDataBarangId($id);
		$this->load->view('barang',$data);	
	}

	public function create($idBarang)
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('kode', 'Kode', 'trim|required');
		$this->form_validation->set_rules('tanggal_beli', 'Tanggal_beli', 'trim|required');
		$this->load->model('barang_model');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('tambah_barang_view');

		}else{
			$config['upload_path']		= './assets/uploads/';
			$config['allowed_types']	= 'gif|jpg|png';
			$config['max_size']			= 10000000000;
			$config['max_width']		= 10240;
			$config['max_height']		= 7680;

			$this->load->library('upload' , $config);

			if ( ! $this->upload->do_upload('userfile'))
			{
				$error = array('error' =>$this->upload->display_errors());
				$this->load->view('tambah_barang_view',$error);
			}
			else {
			$this->barang_model->insertBarang($idBarang);
			$data["barang_list"] = $this->barang_model->getDataBarangId($idBarang);
			redirect('barang/index/'.$idBarang);
			}
		}

		
	}
	//method update butuh parameter id berapa yang akan di update
	public function update($id)
	{
		//load library
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('kode', 'Kode', 'trim|required');
		$this->form_validation->set_rules('tanggal_beli', 'Tanggal_beli', 'trim|required');
		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('barang_model');
		$data['barang_list']=$this->barang_model->getDataBarangById($id);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view

			$this->load->view('edit_barang_view',$data);

		}else{
			$config['upload_path']		= './assets/uploads/';
			$config['allowed_types']	= 'gif|jpg|png';
			$config['max_size']			= 10000000000;
			$config['max_width']		= 10240;
			$config['max_height']		= 7680;

			$this->load->library('upload' , $config);

			if ( ! $this->upload->do_upload('userfile'))
			{
				$error = array('error' =>$this->upload->display_errors());
				$this->load->view('edit_barang_view',$error);
			}
			else {
			$this->barang_model->updateById($id);
			$data["barang_list"] = $this->barang_model->getDataBarang($id);
			$this->load->view('barang',$data);
			}
			

		}
	}

	public function delete($id,$id_barang)
 	{ 
 	 	$this->load->model('barang_model');
  		$this->barang_model->deleteById($id);
 	 	redirect('barang/index/'.$id_barang);
	}

	 public function datatable()
	 {
	 	$this->load->model('barang_model');
	 	$data["barang_list"] = $this->barang_model->getDataBarang();
	 	$this->load->view('barang_datatable', $data);
	 }

	 public function datatable_ajax()
	{
		$this->load->view('barang_datatable_ajax');	
	}

	public function data_server()
	{
        $this->load->library('Datatables');
        $this->datatables
                ->select('id,nama,kode,tanggal_beli,foto')
                ->from('barang');
        echo $this->datatables->generate();
	}
	
}

/* End of file barang.php */
/* Location: ./application/controllers/barang.php */

 ?>