<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('loginuser');
	}
	public function login()
	{
		$this->load->view('login');
	}
	
	function masukuser(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');
	
		
		$cek2=$this->Mo_database->cek2($username,$password)->num_rows();
		
		if($cek2 > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);

			redirect(base_url().'index.php/home');
			
		}
		else{

			
			redirect(base_url());

		}
	}
	
	function keluar(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
}
