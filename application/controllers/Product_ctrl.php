<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_ctrl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product');
    }

    // Grand livre
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
		
}
