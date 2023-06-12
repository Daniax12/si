<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Model {

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
	
	 public function get_detail_company(){
		$query = $this->db->get('company', 1);
        return $query->row();
	 }

	 public function get_products(){
		$query = $this->db->get('product');
        return $query->result();
	 }

	 public function get_centers(){
		$query = $this->db->get('centre');
        return $query->result();
	 }

	 public function insert_product($nom_product){
		
	 }
   
}
