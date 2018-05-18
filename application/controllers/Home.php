<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
        function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url());
		}
		
		
	
	
    }
	public function index()
	{
		$data=$this->Mo_database->Read("petani");
		$this->load->view('home',array('data' => $data));
		
	}
	public function updates(){
		
		$Prim = $_POST['Prim'];
		$stock = $_POST['stock'];
		$desc = $_POST['desc'];
		$jumlah= $_POST['jumlah'];
		$jmlh = $jumlah+$stock;
		$data_update = array('stock' => $stock,
							'desc' => $desc,
							'jumlah'=> $jmlh
							);
		$where = array('Prim' => $Prim);
		$res = $this->Mo_database->UpdateData('petani', $data_update, $where);
		if($res>=1){
			redirect('home');
		}
		
		
	}
	public function edit_data($Id){
		$pesan = $this->Mo_database->getBarang($Id);
		$data = array(
			"nama" => $pesan[0]['nama'],
			"jumlah" => $pesan[0]['jumlah'],
			"alamat" => $pesan[0]['alamat'],
			"Jenis" => $pesan[0]['Jenis'],
			"Prim" => $pesan[0]['Prim']
			
			 );
			 
		$this->load->view('Formpetani',$data);
	}
	
	
	
	
}
