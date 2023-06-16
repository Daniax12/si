<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

     // get pu by $id_unity
     public function get_pu_by_unit($id_product, $id_unit){
        $query = sprintf("select price_unit from unity_price where id_product = '%s' AND id_unity = '%s' ", $id_product, $id_unit);
        $sql = $this->db->query($query);
        $count = 0;

        foreach ($sql-> result_array() as $row){
            $count++;
            $result[] = $row; 
        }
        if($count == 0) return 0;
        return $result[0]['price_unit'];
     }


     // REPARTIOTION DES PRPDUITS
     public function get_repartition_charge_by_product($id_product){
        $temps = $this -> get_product_charge_repartition($id_product);
        $variable = 0;
        $fixe = 0;
        $this-> load-> model('Compte');
        foreach($temps as $temp){
            $balance_compte = $this-> Compte ->get_balance_compte_general($temp['id_compte_general']);

            $used = ($balance_compte[0] * (int) $temp['rep_product']) / 100;
            $variable += ($used * (int) $temp['rep_variable']) / 100;
            $fixe +=  ($used * (int) $temp['rep_fixe']) / 100;
        }

        $sum = $variable + $fixe;

        $rep_fixe = ($fixe / $sum) * 100;
        $rep_variale = ($variable / $sum) * 100;

        $result_fixe = array($fixe, $rep_fixe);
        $result_variable = array($variable, $rep_variale);
        $result = array();
        $result[] = $sum;
        $result[] = $result_fixe;
        $result[] = $result_variable;
        return $result;
     }

     // Prendre tous les produits dans charge_product
     public function get_product_charge_repartition($id_product){
            $query = sprintf("select * from charge_product where id_product = '%s'", $id_product);
            $sql = $this->db->query($query);
            $count = 0;

            foreach ($sql-> result_array() as $row){
                $count++;
                $result[] = $row; 
            }
            if($count == 0) return 0;
            return $result;
     }
	
    // tous les produits
	public function get_products(){
        $query = $this->db->get('product');
        return $query->result();
    }
    
    // prduit by id
    public function get_produit_by_id($id_product){
        $query = sprintf("select * from product where id_product = '%s'", $id_product);
        $sql = $this->db->query($query);
        $count = 0;

        foreach ($sql-> result_array() as $row){
            $count++;
            $result[] = $row; 
        }
        if($count == 0) return 0;
        return $result[0];
    }
   
}
