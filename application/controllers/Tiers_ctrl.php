<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiers_ctrl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Tiers');
    }

	public function index()
	{
		$data['title'] = 'DIMPEX | Tiers';
		$data['title_page'] = 'Mon entreprise';
		$data['title_section'] = 'Tiers';
		$data['content'] = 'company/tiers';
        $data['tiers'] = $this->Tiers->get_all_tiers();

		$this->load->view('main', $data);	
	}		
    public function inserting_tiers(){
        
    }
}
