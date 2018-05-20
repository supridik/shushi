<?php
class M_grafik extends CI_Model{

	function get_data_stok(){
        $query = $this->db->query("SELECT bulan,kondisi,SUM(stok) AS stok FROM barang where barang.merk = 'Cottony Seawed' and kondisi = 'basah' GROUP BY bulan");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

}