<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUserByUsername($username)
    {
        return $this->db->get_where('users', ['username' => $username])->row_array();
    }

    public function getUserById($id)
    {
        return $this->db->get_where("users", ["id", $id])->row_array();
    }

    public function getData()
    {
        $sql = $this->db->select("*")
                        ->from("users")
                        ->get()
                        ->result_array();
        $data = [
            "data"  => $sql,
            "total" => count($sql)
        ];
        
        return $data;
    }
}