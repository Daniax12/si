<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiers extends CI_Model {

  // Liste des tiers
    public function get_all_tiers(){
		  $query = $this->db->get('v_tiers_compte_general');
        return $query->result();
     }

     public function insert_tiers($id_compte_general, $nom, $numero, $intitule, $adresse, $email, $responsable){
        $query = sprintf("INSERT INTO tiers VALUES('TI_' || (SELECT NEXTVAL('tiers_seq')),'%s', '%s', '%s', '%s', '%s', '%s', '%s')", $id_compte_general, $nom, $numero, $intitule, $adresse, $email, $responsable);       // Insert objet
        $sql = $this->db->query($query);
     }

     // Liste des comptes tiers
    public function get_classe_supplier(){
      $query = "select * from compte_general where numero_compte like '401%'";
      $sql = $this->db->query($query);
      $result = array();
      foreach ($sql-> result_array() as $row){
          $result[] = $row; 
      }
      return $result;
    }
    
       // Prendre tous les comptes 6
    public function get_classe_customer(){
        $query = "select * from compte_general where numero_compte like '411%'";
        $sql = $this->db->query($query);
        $result = array();
        foreach ($sql-> result_array() as $row){
            $result[] = $row; 
        }
        return $result;
    } 

    public function get_classe_tiers(){
      $query = "select * from compte_general where numero_compte like '40%' or numero_compte like '41%'";
      $sql = $this->db->query($query);
      $result = array();
      foreach ($sql-> result_array() as $row){
          $result[] = $row; 
      }
      return $result;
    }
    
    public function get_tiers_by_id($id_tiers){
      $query = sprintf("select * from tiers where id_tiers = '%s'", $id_tiers);
      $sql = $this->db->query($query);
      $result = array();
      foreach ($sql-> result_array() as $row){
          $result[] = $row; 
      }
      if($result && count($result) > 0){
          return $result[0];
      }
    }
}
