<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GestionModel');	
		$this->load->model('ProcesoModel');		

	}


	public function index()
	{       
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('gestion/index');
		$this->load->view('footer/footer');
        $this->load->view('js/gestion/gestionJs');
	}

    public function nuevaGestion($idProcesoParam=null)
    {

		
		$data["procesos"] = $this->ProcesoModel->getProceso(null,'ACTIVO');
		$data["idProcesoParam"] = $idProcesoParam;
        $this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('gestion/nuevaGestion',$data);
		$this->load->view('footer/footer');
        $this->load->view('js/gestion/nuevaGestionJs');
    }

	public function editarGestion($id)
	{
		//$data['datos'] = $this->ProcesoModel->getProceso($id);
		$data['datos'] = $this->GestionModel->getGestion($id);
		$data["procesos"] = $this->ProcesoModel->getProceso(null,'ACTIVO');
		
		$this->load->view('header/header');
		$this->load->view('menu/menu');
		$this->load->view('gestion/editarGestion',$data);
		$this->load->view('footer/footer');
        $this->load->view('js/gestion/editarGestionJs');
	}

	public function guardarGestion()
	{
		$this->GestionModel->guardarGestion($this->input->post('descripcion'),$this->input->post('idProceso'),$this->input->post('siglas'));
	}
	
	public function guardarEditarGestion()
	{
		$this->GestionModel->guardarEditarGestion($this->input->post('descripcion'),$this->input->post('id'),$this->input->post('estado'),$this->input->post('idProceso'));
	}

    public function gestionSearch()
    {
        return $this->GestionModel->gestionSearch($this->input->post('filtro'));
    }
}
