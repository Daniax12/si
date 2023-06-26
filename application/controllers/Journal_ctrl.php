<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal_ctrl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Journal');
    }

    public function submiting_journal($id_journal, $id_code_journal){
        $result = $this -> Journal -> submit_journal($id_journal);
        if($result == 1){
            $fail = 1; // The value of the fail variable

            // Encode the fail variable
            $encodedFail = urlencode($fail);

            // Redirect to the desired URL with the encoded fail variable
            redirect("index.php/Journal_ctrl/pre_ecritures/{$id_journal}/?fail={$encodedFail}");
           // redirect("index.php/Journal_ctrl/pre_ecritures/" . $id_journal . "/fail=1");
        } else{
            redirect("index.php/Journal_ctrl/ecritures/" . $id_code_journal);
        }
    }


// Insertion des contents journaux
    public function inserting_content_journal(){
        $compte_general = $this->input->post('compte_general');
        $tier = $this->input->post('compte_tiers');
        if($tier == '' ) $tier = null;
        $libelle = $this->input->post('libelle');
        $montant = $this->input->post('montant');
        $credit_debit = $this->input->post('credit-debit');
        $journal = $this->input->post('id_journal');

        $debit = $montant;
        $credit = 0;
        if($credit_debit == 1){
            $debit = 0;
            $credit = $montant;
        }

        $this -> Journal -> add_child_journal($journal, $compte_general, $tier, $libelle, $debit, $credit);
        redirect("index.php/Journal_ctrl/pre_ecritures/" . $journal);
    }

// INSERTION NOUVELLE JOURNAL
    public function insert_new_journal(){
        $date = $this->input->post('date_journal');
        $code_journal = $this->input->post('code_journal');
        $piece = $this->input->post('piece');

        $new_journal = $this -> Journal -> create_journal($date, $piece, $code_journal);
        redirect("index.php/Journal_ctrl/pre_ecritures/" . $new_journal);
    }

// PAGE INSERTTION JOURNAL FILLE
    public function pre_ecritures($id_journal){
        $data['contents'] = $this -> Journal -> get_journal_content($id_journal);
        $data['title'] = 'DIMPEX | Journal';
		$data['title_page'] = 'Comptabilite';
		$data['content'] = 'comptabilite/pre_journal';
        $this -> load -> model('Compte');
        $this -> load -> model('Tiers');

        $data['comptes'] = $this -> Compte -> get_all_comptes();
        $data['tiers'] = $this -> Tiers -> get_all_tiers();        
        $data['journal'] = $this -> Journal -> get_journal_by_id_journal($id_journal);

        $this->load->view('main', $data);
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
        $this -> Journal -> clean_invalid_journal();
        $data['main_code_journal'] = $this -> Journal ->get_code_journal_id($id_code_journal);
        $data['ecritures'] = $this -> Journal ->get_journal_id_code_journal($id_code_journal);
        $data['title'] = 'DIMPEX | Journal';
		$data['title_page'] = 'Comptabilite';
		$data['content'] = 'comptabilite/journal';

		$this->load->view('main', $data);	
    }
}
