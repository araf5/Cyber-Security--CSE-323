<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Returns extends MX_Controller {

	
	public function index()
	{
		$this->load->view('return');
	}
}
