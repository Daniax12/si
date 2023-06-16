<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facture_ctrl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Facture');
    }

    public function index(){
        $this->load->model('Compte');
        $data['title'] = 'DIMPEX | Facturation';
		$data['title_page'] = 'Comptabilite';
		$data['title_section'] = 'Facturation';
		$data['content'] = 'facturation/facture';
        $data['factures'] = $this-> Facture-> get_factures();
        $data['clients'] = $this-> Facture -> get_phare_customers();
        $data['customers'] = $this->Compte->get_classe_customer();

		$this->load->view('main', $data);	
    }
		
}
