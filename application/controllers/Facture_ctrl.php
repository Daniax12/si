<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facture_ctrl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Facture');
    }

    // Page acceuil du facture
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

        // Recherche entre 2 dates
        public function searching_between_date(){
            $date1 = $this->input->get('date1');
            $date2 = $this->input->get('date2');
            $this->load->model('Compte');
            $data['title'] = 'DIMPEX | Facturation';
            $data['title_page'] = 'Comptabilite';
            $data['title_section'] = 'Facturation > Recherche entre date > <span class="font-weight-bold"> Ar '.$date1. ' - Ar '. $date2 .'</span> ';
            $data['content'] = 'facturation/facture';
            $data['factures'] = $this-> Facture-> factures_between_date($date1, $date2);
            $data['clients'] = $this-> Facture -> get_phare_customers();
            $data['customers'] = $this->Compte->get_classe_customer();
    
            $this->load->view('main', $data);	
        }

    // Recherche entre 2 montants
    public function searching_between_amount(){
        $montant1 = $this->input->get('montant1');
        $montant2 = $this->input->get('montant2');
        $this->load->model('Compte');
        $data['title'] = 'DIMPEX | Facturation';
		$data['title_page'] = 'Comptabilite';
		$data['title_section'] = 'Facturation > Recherche entre montant > <span class="font-weight-bold"> Ar '.number_format($montant1, 2, ',', ' '). ' - Ar '. number_format($montant2, 2, ',', ' ') .'</span> ';
		$data['content'] = 'facturation/facture';
        $data['factures'] = $this-> Facture-> factures_between_montant($montant1, $montant2);
        $data['clients'] = $this-> Facture -> get_phare_customers();
        $data['customers'] = $this->Compte->get_classe_customer();

		$this->load->view('main', $data);	
    }

    // Recherche par numero
    public function searching_by_numero(){
        $numero = $this->input->get('numero');
        $this->load->model('Compte');
        $data['title'] = 'DIMPEX | Facturation';
		$data['title_page'] = 'Comptabilite';
		$data['title_section'] = 'Facturation > Recherche par numero > <span class="font-weight-bold">'.$numero. '</span> ';
		$data['content'] = 'facturation/facture';
        $data['factures'] = $this-> Facture-> factures_by_world($numero);
        $data['clients'] = $this-> Facture -> get_phare_customers();
        $data['customers'] = $this->Compte->get_classe_customer();

		$this->load->view('main', $data);	
    }

    // Recherche par numero
    public function searching_by_client(){
        $client = $this->input->get('client');
        $this->load->model('Compte');
        $data['title'] = 'DIMPEX | Facturation';
        $data['title_page'] = 'Comptabilite';
        $data['title_section'] = 'Facturation > Recherche par client > <span class="font-weight-bold">'.$client. '</span> ';
        $data['content'] = 'facturation/facture';
        $data['factures'] = $this-> Facture-> factures_by_nom_entreprise($client);
        $data['clients'] = $this-> Facture -> get_phare_customers();
        $data['customers'] = $this->Compte->get_classe_customer();

        $this->load->view('main', $data);	
    }

        // Recherche par numero
        public function searching_by_object(){
            $object = $this->input->get('object');
            $this->load->model('Compte');
            $data['title'] = 'DIMPEX | Facturation';
            $data['title_page'] = 'Comptabilite';
            $data['title_section'] = 'Facturation > Recherche par object > <span class="font-weight-bold">'.$object. '</span> ';
            $data['content'] = 'facturation/facture';
            $data['factures'] = $this-> Facture-> factures_by_object($object);
            $data['clients'] = $this-> Facture -> get_phare_customers();
            $data['customers'] = $this->Compte->get_classe_customer();
    
            $this->load->view('main', $data);	
        }

    // Valider une facture
    public function submiting_facture(){
        $facture_id = $this->input->post('facture_id');
        $this -> Facture -> submit_facture($facture_id);
        redirect("index.php/Facture_ctrl/");
    }

    // Supprimer facture fille
    public function deleting_mother_facture(){
        $facture_id = $this->input->post('facture_id');
        $this -> Facture -> delete_mother_facture($facture_id);
        redirect("index.php/Facture_ctrl/");
    }

    // Supprimer facture fille
    public function deleting_child_facture(){
        $facture_id = $this->input->post('facture_id');
        $child_id = $this->input->post('child_id');

        $this -> Facture -> delete_child_facture($child_id);
        redirect("index.php/Facture_ctrl/detailing_facture/" . $facture_id);
    }

    // Modifier general facture
    public function modifying_general_facture(){
        $facture_id = $this->input->post('facture_id');
        $reference = $this->input->post('bc');
        $client = $this->input->post('tiers_id');
        $accompte =  $this->input->post('accompte');
        $object = $this->input->post('object_facture');

        $this -> Facture -> modify_general_facture($facture_id, $reference, $object, $client, $accompte);
        redirect("index.php/Facture_ctrl/detailing_facture/" . $facture_id);
    }

    // Creation facture fille part 2
    public function adding_product(){
        $product_id = $this->input->post('product_id');
        $unity_id = $this->input->post('unity_id');        
        $qty = $this->input->post('qty');
        $facture_id = $this->input->post('facture_id');

        $this -> Facture -> add_content_facture($facture_id, $product_id, $unity_id, $qty);
        redirect("index.php/Facture_ctrl/detailing_facture/" . $facture_id);

    } 

    // Creation nouvelle facture part 1
    public function creating_facture(){
        $date = $this->input->post('date_facture');
        $reference = $this->input->post('bc');
        $object = $this->input->post('object_facture');
        $tiers_id = $this->input->post('tiers_id');
        $accompte = $this->input->post('accompte');
        
        $new_facture = $this -> Facture -> create_facture($date, $tiers_id, $reference, $object, $accompte);
        redirect("index.php/Facture_ctrl/detailing_facture/" . $new_facture);
    }

    // detail d'une facture
    public function detailing_facture($id_facture){
        $data['title'] = 'DIMPEX | Facturation';
		$data['title_page'] = 'Comptabilite';
		$data['title_section'] = 'Facturation';
		$data['content'] = 'facturation/detail_facture';

        // Facture detail
        $data['my_facture'] = $this -> Facture -> facture_by_id($id_facture);
        $data['facture_kid'] = $this -> Facture -> get_child_facture($id_facture);
        $data['ht_amount'] = $this -> Facture -> get_ht_amount($id_facture);
        $data['ttc_amount'] = $this -> Facture -> get_ttc_amount($id_facture);
        $data['tva'] = $this -> Facture -> get_tva_amount($id_facture);
        $data['net_a_paye'] = $this -> Facture -> get_amount_to_pay($id_facture);
        $data['letter'] = strtoupper($this -> Facture -> chiffreEnLettre($data['ttc_amount']));
        
        // Produit detail
        $this -> load -> model('Product');
        $data['units'] = $this -> Product -> get_unity();
        $data['products'] = $this -> Product -> get_products();
        $data['product_details'] = $this -> Product -> get_products_detailed();

        // Company details
        $this -> load -> model('Company');
        $data['company'] = $this -> Company -> get_detail_company();

        // Clients
        $this->load->model('Compte');
        $data['customers'] = $this->Compte->get_classe_customer();

        $this->load->view('main', $data);	
        
    }
}
