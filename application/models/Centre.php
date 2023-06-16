<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Centre extends CI_Model {

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




     // REPARTIOTION DES centres
    public function get_general_repartition(){
        $query = $this->db->get('v_repartition_centre_charge;');
        return $query->result();
    }
    
    // tous les centres
	public function get_centres(){
        $query = $this->db->get('centre');
        return $query->result();
    }

    
   
}
