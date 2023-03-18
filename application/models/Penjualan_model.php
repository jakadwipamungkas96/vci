<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
    public function getData()
    {
        $sql = $this->db->select("*")
                        ->from("penjualan")
                        ->get()
                        ->result_array();
        $data = [
            "data"  => $sql,
            "total" => count($sql)
        ];
        
        return $data;
    }
}