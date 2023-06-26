<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Centre extends CI_Model {

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

	// Repartition des charges
	 public function total_repartitions_charges($id_product){
		$centres = $this -> get_centres();

		$result = array();
		$this -> load -> model('Compte');
		$total_charge = $this -> Compte -> get_total_charge();
		if($centres){
			foreach($centres as $centre){
				$temp_array = array();
				$temp_array[] = $centre;
				$charges = $this -> repartition_centre_charges($centre -> id_centre, $id_product);
				$temp_array[] = $charges;
				$temp_array[] = ($charges / $total_charge) * 100;

				$result[] = $temp_array;
			}
			return $result;
		}
	 }


	 // Prendre la somme des charges par rtapport a UN centre
	public function repartition_centre_charges($id_centre, $id_product){
		$balance_charge = $this -> balance_charges();

		$sum_charge = 0;
		if($balance_charge){
			foreach($balance_charge as $balance){
				$repart = $this-> percentage_repartition_centre_charge($id_centre, $balance[0] -> id_compte_general, $id_product);
				// Balance always debit in achat
				$sum_charge += ($balance[1] * $repart) / 100;
			}
			return $sum_charge;
		}
		return 0;
	}


	// Prendre les details des balances
	public function balance_charges(){
		$this -> load -> model('Compte');
		$balances = $this -> Compte -> get_balance_comptes();
		if($balances){
			$result = array();
			foreach($balances as $balance){
				$is_class = $this -> Compte -> is_class_charge($balance[0]);
				if($is_class == true){
					$result[] = $balance;
				}
			}
			return $result;
		}
	}

	// Repartition d'UN centre par rapport a UNE charge 
	public function percentage_repartition_centre_charge($id_centre, $id_compte_charge, $id_product){
		$query = sprintf("select repartition_centre from v_repartition_centre_charge where id_compte_general = '%s' and id_centre = '%s' and id_product = '%s' ", $id_compte_charge, $id_centre, $id_product);
		$sql = $this->db->query($query);
  
		foreach ($sql-> result_array() as $row){
			$result[] = $row; 
		}
		if(count($result) > 0){
			return $result[0]['repartition_centre'];
		}
	}


     // REPARTIOTION DES centres
    public function get_general_repartition(){
        $query = $this->db->get('v_repartition_centre_charge;');
        return $query->result();
    }
    
    // tous les centres
	public function get_centres(){
        $query = $this->db->get('centre');
        return $query->result();
    }

    
   
}
