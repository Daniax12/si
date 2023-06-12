<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generalite_ctrl extends CI_Controller {

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

	 public function __construct() {
        parent::__construct();
        $this->load->model('Company');
    }


	public function index()
	{
		$data['title'] = 'DIMPEX | Home';
		$data['title_page'] = 'Generalite';
		$data['content'] = 'company/generalite';
		$data['company'] = $this->Company->get_detail_company();
		$data['products'] = $this->Company->get_products();
		$data['centers'] = $this->Company->get_centers();
		$this->load->view('main', $data);	
	}		
}
