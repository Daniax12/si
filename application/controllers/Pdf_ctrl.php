<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_ctrl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Facture');
    }

    public function index()
    {

    }

    public function exporting_pdf($id_facture){
        $data['title'] = 'DIMPEX | Export PDF';

        // Companie details
        $this -> load -> model('Company');
        $data['company'] = $this -> Company -> get_detail_company();

        // Details de la facture
        $data['my_facture'] = $this -> Facture -> facture_by_id($id_facture);
        $data['facture_kid'] = $this -> Facture -> get_child_facture($id_facture);
        $data['ht_amount'] = $this -> Facture -> get_ht_amount($id_facture);
        $data['ttc_amount'] = $this -> Facture -> get_ttc_amount($id_facture);
        $data['tva'] = $this -> Facture -> get_tva_amount($id_facture);
        $data['net_a_paye'] = $this -> Facture -> get_amount_to_pay($id_facture);
        $data['letter'] = strtoupper($this -> Facture -> chiffreEnLettre($data['ttc_amount']));

        // Charger la bibliothèque TCPDF
        $this->load->library('tcpdf');

        // Créer un nouvel objet TCPDF
        $pdf = new TCPDF();

        // Définir les métadonnées du PDF
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('DIMPEX | Export PDF');
        $pdf->SetSubject('Testing TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, CodeIgniter');

        // Ajouter une page
        $pdf->AddPage();

        // Charger la vue pdf_view.php
        $data['pdf'] = $pdf;
        $this->load->view('facturation/pdf', $data);

        // Rendre le PDF
        $pdf->Output('mypdf.pdf', 'I'); 

    }
}
