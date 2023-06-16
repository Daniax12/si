<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte_ctrl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Compte');
    }

    // Grand livre
    public function grand_livre_page(){
        if (isset($_GET['id_compte_general_input'])) {
            $id = $this->input->get('id_compte_general_input');
        } else {
           $id = 'CG_22';
        }
        $data['comptes_generaux'] = $this -> Compte -> get_all_comptes();
        $data['compte'] = $this -> Compte -> get_compte_general_by_id($id);
        $data['livres'] = $this -> Compte -> get_grand_livre($id);
        $data['balance'] =  $this -> Compte -> get_balance_compte_general($id);

        $data['title'] = 'DIMPEX | Grand livre';
		$data['title_page'] = 'Comptabilite';
        $data['content'] = 'comptabilite/grand_livre';

        $this->load->view('main', $data);
    }

	public function index()
	{
		$data['title'] = 'DIMPEX | Compte';
		$data['title_page'] = 'Comptabilite';
		$data['title_section'] = 'Compte general';
		$data['content'] = 'company/compte_general';
        $data['racines'] = $this->Compte->get_racine_compte();
        $data['comptes'] = $this->Compte->get_comptes();
        $data['code_journaux'] = $this->Compte->get_code_journaux();

		$this->load->view('main', $data);	
	}		

    // Page insertion de nouveau compte
    public function insert_compte_page(){
        $data['title'] = 'DIMPEX | Nouveau Compte';
		$data['title_page'] = 'Mon entreprise';
		$data['title_section'] = 'Ajouter un compte general';
		$data['content'] = 'company/ajout_compte_general';
        $data['racines'] = $this->Compte->get_racine_compte();
        $data['comptes'] = $this->Compte->get_comptes();

        $this->load->model('Company');
        $data['products'] = $this->Company->get_products();
		$data['centers'] = $this->Company->get_centers();

		$this->load->view('main', $data);	
    }

    // Nouveayu compte general
    public function insert_new_compte(){
        $input_stream = file_get_contents('php://input');
        $data_value = json_decode($input_stream, true);
        $this-> Compte -> inserer_main_compte($data_value);
        $res = 0;

        header('Content-Type: application/json');
        echo json_encode($res);
    }
}
