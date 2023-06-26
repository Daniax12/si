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
        
        // Produit detail
        $this -> load -> model('Product');
        $data['units'] = $this -> Product -> get_unity();
        $data['products'] = $this -> Product -> get_products();
        $data['product_details'] = $this -> Product -> get_products_detailed();

        // Company details
        $this -> load -> model('Company');
        $data['company'] = $this -> Company -> get_detail_company();

        $this->load->view('main', $data);	
        
    }
}
