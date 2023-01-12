

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProcesoModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();		
	}

	public function procesosSearch($filtro){
		$queryRuta = ''; $json = array(); $i = 0;
        $and = '';
		if ($filtro!='') {
            $and = " and Descripcion like '%".$filtro."%'";
        }


		$query = $this->db->query("SELECT * FROM CatProcesos WHERE 1=1 ".$and);

         if($query->num_rows() > 0){
			 foreach ($query->result_array() as $key) {
			 	 $json["data"][$i]["IdProceso"] = $key["IdProceso"];
				 $json["data"][$i]["Descripcion"] = $key["Descripcion"];
				 $json["data"][$i]["FechaCrea"] = $key["FechaCrea"];
				 $json["data"][$i]["FechaEdita"] = $key["FechaEdita"];
                 $json["data"][$i]["Estado"] = $key["Estado"];
				 $json["data"][$i]["Editar"] = '<a class="btn btn-primary" target="_blank" href="'.base_url("index.php/editarProceso").'">Editar</a>';
				 $json["data"][$i]["Gestiones"] = '<a class="btn btn-primary" target="_blank" href="'.base_url("index.php/verGestionesProceso").'"><i class="simple-icon-arrow-right"></i></a>';;
				 $i++;
         	}
		}
        echo json_encode($json);
	}

}

/* End of file .php */
