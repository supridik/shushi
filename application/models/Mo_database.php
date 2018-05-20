<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_database extends CI_Model {

	
	function cek2($username , $password){
		$this->db->where('user',$username);
		$this->db->where('pass', $password);
		return $this->db->get('petani');
	}
	
	function cek3($username , $password){
		$this->db->where('name',$username);
		$this->db->where('pss', $password);
		return $this->db->get('user');
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
	
	function get_data_stok(){
        $query = $this->db->query("SELECT bulan,SUM(stok) AS stok FROM barang GROUP BY bulan");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }


}