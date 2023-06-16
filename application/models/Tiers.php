<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiers extends CI_Model {
    public function get_all_tiers(){
		$query = $this->db->get('v_tiers_compte_general');
        return $query->result();
     }

     public function insert_tiers(){

     }
}
