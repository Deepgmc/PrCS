<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companies extends CI_Controller {

	public function index()
	{
		// loading data to views
		$this->load->model('companies_model');

		$this->load->view('header_view');
		$this->load->view('companies_view', array('companies' => $this->companies_model->get_all_companies()));
		$this->load->view('footer_view');
	}

}
