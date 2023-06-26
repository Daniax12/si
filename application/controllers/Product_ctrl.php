<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_ctrl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product');
        $this->load->model('Centre');
    }

    // Repartition produit
    public function repartition_charge_product(){
        if (isset($_GET['id_product_input'])) {
            $id = $this->input->get('id_product_input');
        } else {
           $id = 'PROD1';
        }
        $data['the_product'] = $this -> Product -> get_produit_by_id($id);
        $data['products'] = $this -> Product -> get_products();
        $data['repartition'] = $this -> Product -> get_repartition_charge_by_product($id);

        $data['title'] = 'DIMPEX | Analyse produit';
		$data['title_page'] = 'Etude Analytique';
        $data['content'] = 'analytique/product';

        $this->load->view('main', $data);
    }


    // Repartition produit / centre
    public function repartition_charge_product_centre(){
        if (isset($_GET['id_product_input'])) {
            $id = $this->input->get('id_product_input');
        } else {
            $id = 'PROD1';
        }
        $this-> load-> model('Compte');
        $data['charges'] = $this -> Compte -> get_total_charge();
        $data['the_product'] = $this -> Product -> get_produit_by_id($id);
        $data['products'] = $this -> Product -> get_products();
        $data['repartition_centre'] = $this -> Centre -> total_repartitions_charges($id);

        $data['title'] = 'DIMPEX | Analyse produit';
        $data['title_page'] = 'Etude Analytique';
        $data['content'] = 'analytique/centre';

        $this->load->view('main', $data);
    }
		
}
