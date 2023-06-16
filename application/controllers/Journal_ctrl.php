<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal_ctrl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Journal');
    }

    public function insert_new_ecriture(){
        echo "aha";
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
    
    public function ecritures($id_code_journal){
        $data['main_code_journal'] = $this -> Journal ->get_code_journal_id($id_code_journal);
        $data['ecritures'] = $this -> Journal ->get_journal_id_code_journal($id_code_journal);
        $data['title'] = 'DIMPEX | Journal';
		$data['title_page'] = 'Comptabilite';
		$data['content'] = 'comptabilite/journal';

		$this->load->view('main', $data);	
    }
}
