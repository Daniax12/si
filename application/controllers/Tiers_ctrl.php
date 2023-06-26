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
		$data['tiers_classe'] = $this -> Tiers -> get_classe_tiers();

		$this->load->view('main', $data);	
	}		
    public function inserting_tiers(){
        $compte_general = $this->input->post('compte_general');
		$nom = $this->input->post('entreprise'); 
		$debut_num = $this->input->post('debut_numero'); 
		$numero = $this->input->post('numero_compte');
		$main_num = $debut_num . $numero;
		$intitule = $this->input->post('intitule'); 
		$adresse = $this->input->post('adresse'); 
		$email = $this->input->post('email'); 
		$responsable = $this->input->post('responsable'); 

		$this -> Tiers -> insert_tiers($compte_general, $nom, $main_num, $intitule, $adresse, $email, $responsable);
		redirect("index.php/Tiers_ctrl");
    }
}
