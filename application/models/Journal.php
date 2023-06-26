<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal extends CI_Model {

    // Supprimer les journaux invalides
    public function clean_invalid_journal(){
        $invalid = $this -> invalid_journal();

        if($invalid){
            foreach($invalid as $inv){
                $query3 = sprintf("DELETE FROM content_journal WHERE id_journal = '%s'", $inv['id_journal']) ;      // Insert categrories
                $sql3 = $this->db->query($query3);

                $query = sprintf("DELETE FROM journal WHERE id_journal = '%s'", $inv['id_journal']) ;      // Insert categrories
                $sql = $this->db->query($query);
            }
        }
    }

    public function invalid_journal(){
        $query = "select * from journal where est_valide = 1";     // Insert objet
        $sql = $this->db->query($query);
        $count = 0;

        foreach ($sql-> result_array() as $row){
            $count++;
            $result[] = $row; 
        }
        if($count == 0) return 0;
        return $result;
    }

    // Enregistrement d;un journal et des ses contents
    public function submit_journal($id_journal){
        $can_validate = $this -> can_validate($id_journal);

        if($can_validate == false) return 1;
        
        $this -> validate_journal($id_journal);
        return 0;
    }

    // validate a journal
    public function validate_journal($id_journal){
        $query = sprintf("UPDATE journal SET est_valide = 0 WHERE id_journal = '%s'", $id_journal);
        $sql = $this->db->query($query);
    }

    // Check balance entre credit et debit
    public function can_validate($id_journal){
        $contents = $this -> get_journal_content($id_journal);
        $credit = 0;
        $debit = 0;

        foreach($contents as $content){
            $credit += $content['credit'];
            $debit += $content['debit'];
        }

        if($credit == $debit) return true;
        return false;
    }

    // Get all journal filles
    public function get_journal_content($id_journal){
        $query = sprintf("select * from v_journal_content where id_journal = '%s'", $id_journal);       // Insert objet
        $sql = $this->db->query($query);
        $count = 0;

        foreach ($sql-> result_array() as $row){
            $count++;
            $result[] = $row; 
        }
        if($count == 0) return 0;
        return $result;
    }

    // Get une journal par id
    public function get_journal_by_id_journal($id_journal){
        $query = sprintf("select * from journal where id_journal = '%s'", $id_journal);       // Insert objet
        $sql = $this->db->query($query);
        $count = 0;

        foreach ($sql-> result_array() as $row){
            $count++;
            $result[] = $row; 
        }
        if($count == 0) return 0;
        return $result[0];
    }

    // inserer fille journal
    public function add_child_journal($id_journal, $id_compte_general, $id_tiers, $libelle, $debit, $credit){
        if($id_tiers == ""){
            $query = sprintf("INSERT INTO content_journal VALUES('FD' || (SELECT NEXTVAL('content_journal_seq')), '%s', '%s', null, '%s', %u, %u)", $id_journal, $id_compte_general, $id_tiers, $libelle, $debit, $credit);       // Insert objet
        } else {
            $query = sprintf("INSERT INTO content_journal VALUES('FD' || (SELECT NEXTVAL('content_journal_seq')), '%s', '%s', '%s', '%s', %u, %u)", $id_journal, $id_compte_general, $id_tiers, $libelle, $debit, $credit);       // Insert objet
        }
        
        $sql = $this->db->query($query);
    }    

    // Creation nouvelle journal
    public function create_journal($date, $refpiece, $id_code_journal){
        $query = sprintf("INSERT INTO journal VALUES('JOU_' || (SELECT NEXTVAL('journal_seq')), '%s', '%s', '%s', 1) returning id_journal", $id_code_journal, $date, $refpiece);       // Insert objet
        $result = $this->db->query($query)->row_array();

        return $result['id_journal'];
    }

    // Get tous les journals ecrtits d'un code journal
   public function get_journal_id_code_journal($id_code_journal){
        $query = sprintf("select * from v_journal_content where id_code_journal = '%s' order by date_insertion", $id_code_journal);
        $sql = $this->db->query($query);
        $count = 0;

        foreach ($sql-> result_array() as $row){
            $count++;
            $result[] = $row; 
        }
        if($count == 0) return 0;
        return $result;
   }

   // Un code journal par id_code_journal
   public function get_code_journal_id($id_code_journal){
        $query = sprintf("select * from code_journal where id_code_journal = '%s'", $id_code_journal);
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
