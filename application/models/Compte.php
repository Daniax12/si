<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte extends CI_Model {

   // savoir si compte 6
   public function is_class_charge($compte){
      $firstLetter = strtoupper(substr($compte -> numero_compte, 0, 1));
      if($firstLetter == '6') return true;
      return false;
   }

   // Totalite du balance
   public function total_balance(){
      $all_balance = $this -> get_balance_comptes();

      if($all_balance){
         $debit = 0;
         $credit = 0;

         foreach($all_balance as $balance){
            $debit += $balance[1];
            $credit += $balance[2];
         }

         $result = array();
         $result[] = $debit;
         $result[] = $credit;

         return $result;
      }
   }

   // Prendre tous les comptes dont le tota debit et credit != null
   public function get_balance_comptes(){
      $comptes = $this -> get_comptes();
      $res = array();

      if($comptes){
         foreach($comptes as $compte){
            $balance = $this -> get_balance_compte_general($compte -> id_compte_general);
            if($balance[0] != 0 || $balance[1] != 0){
               $temp_array = array();
               $temp_array[] = $compte;
               $temp_array[] = $balance[0];
               $temp_array[] = $balance[1];

               $res[] = $temp_array;
            }
         }
         return $res;
      }
   }

   // Some de tout les charges
   public function get_total_charge(){
      $charges = $this -> get_classe_charge();
      $result = 0;
      if($charges){
         foreach($charges as $charge){
            $balance = $this -> get_balance_compte_general($charge['id_compte_general']);
            $result += $balance[0];
         }
         return $result;
      }
   }

   // Prendre tous les comptes 6
   public function get_classe_charge(){
      $query = "select * from compte_general where numero_compte like '6%'";
      $sql = $this->db->query($query);

      foreach ($sql-> result_array() as $row){
          $result[] = $row; 
      }
      return $result;
   }

      // Prendre tous les comptes 6
      public function get_classe_customer(){
         $query = "select * from tiers where numero_tiers like '411%'";
         $sql = $this->db->query($query);
   
         foreach ($sql-> result_array() as $row){
             $result[] = $row; 
         }
         return $result;
      }


   // avoir TOUS les cpmtes
   public function get_all_comptes(){
		$query = $this->db->get('compte_general');
      return $query->result();
	 }

    public function get_account_numero(){
      $query = sprintf("select numero_compte from compte_general");
      $sql = $this->db->query($query);

      foreach ($sql-> result_array() as $row){
          $result[] = $row; 
      }
      return $result;
   }


   // get compte by id
   public function get_compte_general_by_id($id_compte_general){
      $query = sprintf("select * from compte_general where id_compte_general = '%s'", $id_compte_general);
      $sql = $this->db->query($query);

      foreach ($sql-> result_array() as $row){
          $result[] = $row; 
      }
      if(count($result) > 0){
         return $result[0];
      }
      
   }

   // Total debit et credit d'un compte
   public function get_balance_compte_general($id_compte_general){
      $values = $this -> get_grand_livre($id_compte_general);
      $debit = 0;
      $credit = 0;
      if($values){
         foreach($values as $value){
            $debit += (float) $value['debit'];
            $credit += (float) $value['credit'];
         }
         $result = array();
         $result[] = $debit;
         $result[] = $credit;
         return $result;
      }
   }

   // Get le grand livre des copmptes
   public function get_grand_livre($id_compte_general){
      $query = sprintf("select * from v_journal_content where id_compte_general = '%s' order by date_insertion", $id_compte_general);
      $sql = $this->db->query($query);

      foreach ($sql-> result_array() as $row){
          $result[] = $row; 
      }
      return $result;
   }


   // Toutes les racines
	   public function get_racine_compte(){
		   $query = $this->db->get('racine_compte');
        return $query->result();
      }
   
     // Tous les comptes
     public function get_comptes(){
        $query = $this->db->get('compte_general');
        return $query->result();
     }

     public function get_code_journaux(){
         $query = $this->db->get('code_journal');
         return $query->result();
     }

     // Insertion d'un simple compte (non 6)
     public function inserer_compte($racine, $numero, $intitule, $is_corporable, $is_suppletive){
        $query = sprintf("INSERT INTO compte_general VALUES('CG_' || (SELECT NEXTVAL('compte_seq')),'%s', '%s', %u, %u, 'RAC%s') returning id_compte_general", $numero, $intitule, $is_corporable, $is_suppletive, $racine);       // Insert objet
        $result = $this->db->query($query)->row_array();

        return $result['id_compte_general'];
     }

     // Insertion de la repartition charges - centre d'un produit
     public function insert_centre_partage($id_charge_product, $id_centre, $rep_centre_fix, $rep_centre_variable){
        $query = sprintf("INSERT INTO centre_partage VALUES('CP' || (SELECT NEXTVAL('centre_partage_seq')), '%s', '%s', %u, %u)", $id_charge_product, $id_centre, $rep_centre_fix, $rep_centre_variable);       // Insert objet
        $sql = $this->db->query($query);
     }

     // Il existe plusieurs centres donc tableau de repartition  des centres, en fonction de la longeurs des centres pour un produit
     public function repartition_one_product_charge($id_compte_general, $id_product, $prod_rep, $fixe_rep, $var_rep, $arr_rep_center){
        $query = sprintf("INSERT INTO charge_product VALUES('CH_P_' || (SELECT NEXTVAL('charge_product_seq')),'%s', '%s', %u, %u, %u) returning id_charge_product", $id_compte_general, $id_product, $prod_rep, $fixe_rep, $var_rep);       // Insert objet
        $result_id = $this->db->query($query)->row_array();

        for($i = 0; $i < count($arr_rep_center); $i++){
            $this->insert_centre_partage($result_id['id_charge_product'], $arr_rep_center[$i][2], $arr_rep_center[$i][0], $arr_rep_center[$i][1]);
        }
     }

     // Pour plusieurs produits, we need to llop all products
     public function repartition_products_charge($id_compte_general, $rep_charge){
      if($rep_charge){
         foreach($rep_charge as $charge){
            $product = $charge[4];
            $rep_prod = $charge[0];
            $rep_prod_fixe = $charge[1];
            $rep_prod_variable = $charge[2];
            $rep_temp_charge = $charge[3];

            $this->repartition_one_product_charge($id_compte_general, $product, $rep_prod, $rep_prod_fixe, $rep_prod_variable, $rep_temp_charge);
         }
      }  
     }


     // Insertion general d'un compte en prenant comme argument les donnes 
    public function inserer_main_compte($json_data){
      $idracine = 'RC' + $json_data['racine'];
      $numero = $json_data['numero'];
      $intitule = $json_data['intitule'];

      if($json_data['racine'] != 6){      /// Autre que compte 6
         $this->inserer_compte($idracine, $numero, $intitule, 0, 0);
      } else {                            // Compte 6
         $corporable = $json_data['corporable'];
         if($corporable == 2){
            $this->inserer_compte($idracine, $numero, $intitule, 2, 0);
         }else{
            $suppletive = $json_data['suppletive'];
            $rep_charge = $json_data['rep_charge'];
   
            $id_cg = $this->inserer_compte($idracine, $numero, $intitule, $corporable, $suppletive);
   
            $this -> repartition_products_charge($id_cg, $rep_charge);
         }
      }
    }
}
