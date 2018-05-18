<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_database extends CI_Model {

	
	function cek2($username , $password){
		$this->db->where('user',$username);
		$this->db->where('pass', $password);
		return $this->db->get('petani');
	}
	
	public function Read($table){
		
		$data=$this->db->query('select * from '.$table);
		
		return $data->result_array();	
		}
	public function getBarang($Id){
		$data = $this->db->query('select * from petani where Prim = '.$Id);
		return $data->result_array();
	}
	
	public function UpdateData($tableName,$data,$where){
		$res = $this->db->update($tableName,$data,$where);
		return $res;
	}


}
