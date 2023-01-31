<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AreasController extends CI_Controller {

	protected $helpers = ['form'];

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GestionModel');	
		$this->load->model('ProcesoModel');		
		$this->load->helper(array('form', 'url'));

	}


	public function index()
	{       
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('gestion/index');
		$this->load->view('footer/footer');
        $this->load->view('js/gestion/gestionJs');
	}

	public function getAreas($estado)
	{

		return $this->AreasModel->getAreas($estado);
		
	}
}
