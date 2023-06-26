<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facture extends CI_Model {

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

         // tous les factures avec ses details
	public function get_factures(){
        $query = "select * from v_facture_definition";
        $sql = $this->db->query($query);
        $valide_letter = "";
        foreach ($sql-> result_array() as $row){
            if($row['valide'] == 0){
                $valide_letter = "fa fa-check";
            } else if($row['valide'] == 1){
                $valide_letter = "fa fa-adjust";
            }
            $row['valide_letter'] = $valide_letter;
            $result[] = $row; 
        }
        return $result;
    }

    // SUBMITTIMG
    public function submit_facture($id_facture){
        $facture = $this -> facture_by_id($id_facture);
        $facture_details = $this -> get_child_facture($id_facture);
        $this-> update_before_submit($id_facture);
        $this -> load-> model('Journal');
        $id_ecriture = $this -> Journal-> create_ecriture($facture['date_insertion'], 'VENTE', 'CJ_7');
        // insering ecriture HT 707 
        
        $this-> load->model('Product');
        foreach($facture_details as $detail){
            $pu = $this->Product-> get_pu_by_unit($detail['id_product'], $detail['id_unity']);
            $ht = (int) $pu * (int) $detail['qty'];
            $tva = (20 * $ht) / 100;
            $this -> Journal -> add_child_journal($id_ecriture, $detail['id_compte_general'], null, $detail['intitule'], $ht, 0);  // creditena 7
            $this -> Journal -> add_child_journal($id_ecriture, 'CG_78', null, $detail['intitule'], $tva, 0);                       // creditena 4457 
            $this -> Journal -> add_child_journal($id_ecriture, $facture['id_tiers'], $facture['id_tiers'], $detail['intitule'], 0, $ht+$tva);  // debitena client
        }
    }

    public function update_before_submit($id_facture){
        $facture = $this -> facture_by_id($id_facture);
        $this-> load->model('Product');
        $data_factures = $this->get_child_facture($id_facture);
        $tva = 0;
        $ht = 0;
        foreach($data_factures as $data){
            $pu += $this->Product-> get_pu_by_unit($data['id_product'], $data['id_unity']);
            $ht += (int) $pu * (int) $data['qty'];
            $tva += (20 * $ht) / 100;
        }
        $ttc = $hy + $tva;

        $query = sprintf("UPDATE facture SET ht = %u, tva = %u, valide = 0,  WHERE id_facture = '%s'", $ht, $tva, $id_facture);       // Insert objet
        $sql = $this->db->query($query);
    }


    // recherche7
    // intervallE

    // CLIENT PHARE
    public function get_phare_customers(){
        $query = sprintf("select nom_entreprise, sum(totalht) as t from v_facture_definition group by id_tiers, nom_entreprise order by t desc");
        $sql = $this->db->query($query);
        
        foreach ($sql-> result_array() as $row){    
            $result[] = $row; 
        }
        return $result;
    }

    // Montant
    public function factures_between_montant($montant1, $montant2){
        $query = sprintf("SELECT * FROM v_facture_definition WHERE totalHT >= %u AND totalHT <= %u", $montant1, $montant2);
        $sql = $this->db->query($query);
        foreach ($sql-> result_array() as $row){
            $result[] = $row; 
        }
        return $result;
    }

    // temp
    public function factures_between_dates($date_debut, $date_fin){
        $query = sprintf("SELECT * FROM v_facture_definition WHERE date_insertion >= '%s' AND date_insertion <= '%s'", $date_debut, $date_fin);
        $sql = $this->db->query($query);
        foreach ($sql-> result_array() as $row){
            $result[] = $row; 
        }
        return $result;
    }


    // Par singleton
    // par objet
    public function  factures_by_object($object){
        $query = sprintf("SELECT * FROM v_facture_definition WHERE object_facture LIKE '%%%s%%'", $object);
        $sql = $this->db->query($query);
        foreach ($sql-> result_array() as $row){
            $result[] = $row; 
        }
        return $result;
    }

    // par nom d'entreprise
    public function factures_by_nom_entreprise($nom_entreprise){
        $query = sprintf("SELECT * FROM v_facture_definition WHERE nom_entreprise LIKE '%%%s%%'", $nom_entreprise);
        $sql = $this->db->query($query);
        foreach ($sql-> result_array() as $row){
            $result[] = $row; 
        }
        return $result;
    }

    // par date
    public function factures_by_date($date){
        $query = sprintf("SELECT * FROM v_facture_definition WHERE date_insertion LIKE '%s'", $date);
        $sql = $this->db->query($query);
        foreach ($sql-> result_array() as $row){
            $result[] = $row; 
        }
        return $result;
    }

    // par id
    public function factures_by_world($id_world){
        $query = sprintf("SELECT * FROM v_facture_definition WHERE id_facture LIKE '%%%s%%'", $id_world);
        $sql = $this->db->query($query);
        foreach ($sql-> result_array() as $row){
            $result[] = $row; 
        }
        return $result;
    }

    // par id litterallty
    public function facture_by_id($id){
        $query = sprintf("SELECT * FROM v_facture_definition WHERE id_facture = '%s'", $id);
        $sql = $this->db->query($query);    
        $valide_letter = "";    
        foreach ($sql-> result_array() as $row){ 
            if($row['valide'] == 0){
                $valide_letter = "VALIDE";
            } else if($row['valide'] == 1){
                $valide_letter = "MODIFIABLE";
            }
            $row['valide_letter'] = $valide_letter;
            $result[] = $row; 
        }
        if($result && count($result) > 0){
            return $result[0];
        }
    }

    // Supprimer definitivemnent hatran amn zanany ra misy aa
    public function delete_main_facture($id_facture){

        $child = $this-> get_child_facture($id_facture);

        foreach($child as $kid){
            $this-> delete_content_factures($kid['id_factures_details']);
        }

        $query = sprintf("DELETE FROM facture WHERE id_facture = '%s' ", $id_facture);       // Insert objet
        $sql = $this->db->query($query);
    }

    // predndre tous les facturs filles d'une facture
    public function get_child_facture($id_facture){
        $query = sprintf("select * from v_facture_liste where id_facture = '%s'", $id_facture);
        $sql = $this->db->query($query);
        foreach ($sql-> result_array() as $row){
            $result[] = $row; 
        }
        return $result;
    }

    // supprimer une ligne de de donnees
    public function delete_content_factures($id_facture_details){
        $query = sprintf("DELETE FROM facture_details WHERE id_facture_details = '%s' ", $id_facture);       // Insert objet
        $sql = $this->db->query($query);
    }

    //creer nouvelle facture
    public function create_facture($date, $id_tiers, $ref_bc, $objet, $accompte){
        $query = sprintf("INSERT INTO facture VALUES('DPX/'|| (SELECT EXTRACT(MONTH FROM CURRENT_DATE))||'/'|| (SELECT EXTRACT(YEAR FROM CURRENT_DATE))||'/00'||(SELECT NEXTVAL('facture_seq')),'%s', '%s', '%s', '%s', %u, 1) returning id_facture", $date, $id_tiers, $ref_bc, $objet, $accompte);       // Insert objet
        $result = $this->db->query($query)->row_array();

        return $result['id_facture'];
    }
 
    // ajouter des listes de porduits
    public function add_content_facture($id_facture, $id_product, $id_unity, $qty){
        $this -> load -> model('Product');
        $product_detail = $this -> Product -> get_latest_product_price($id_product);
        foreach($product_detail as $detail){
            if($id_product == $detail['id_product'] && $id_unity == $detail['id_unity']){
                $pu = $detail['price_unit'];
            }
        }

        $ht = $pu * $qty;

        $query = sprintf("INSERT INTO facture_details VALUES('FD' || (SELECT NEXTVAL('facture_details_seq')), '%s', '%s', '%s', %u, %u, %u)", $id_facture, $id_product, $id_unity, $qty, $pu, $ht);       // Insert objet
        $sql = $this->db->query($query);
    }
    
    // modification general
    public function modify_main_facture($id_facture, $date, $id_tiers, $ref_bc, $objet, $accompte){
        $query = sprintf("UPDATE facture SET date_insertion = '%s', id_tiers = '%s', ref_bc = '%s', object_facture='%s', accompte = %u WHERE id_facture = '%s'", $date, $id_tiers, $ref_bc, $objet, $accompte, $id_facture);       // Insert objet
        $sql = $this->db->query($query);
    }

    // modification content of general
    public function modify_content_facture($id_facture_details, $id_product, $id_unity, $qty, $pu){
        $query = sprintf("UPDATE facture_details SET id_product = '%s', id_unity = '%s', qty = %u WHERE id_facture_details = '%s'", $id_product, $id_unity, $qty, $id_facture_details);       // Insert objet
        $sql = $this->db->query($query);
    }
}
