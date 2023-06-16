<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal extends CI_Model {

    // inserer fille jourbnal
    public function add_child_journal($id_journal, $id_compte_general, $id_tiers, $libelle, $debit, $credit){
        $query = sprintf("INSERT INTO content_journal VALUES('FD' || (SELECT NEXTVAL('content_journal_seq')), '%s', '%s', '%s', '%s', %u, %u)", $id_journal, $id_compte_general, $id_tiers, $libelle, $debit, $credit);       // Insert objet
        $sql = $this->db->query($query);
    }    

    public function create_ecriture($date, $refpiece, $id_code_journal){
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
