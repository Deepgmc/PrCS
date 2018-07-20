<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

	public function profile($company_id)
	{
		// loading single company data
		$this->load->model('companies_model');

		$this->load->view('header_view');
		$this->load->view('company_view', array('company' => $this->companies_model->get_current_company($company_id)));
		$this->load->view('footer_view');
	}

}
