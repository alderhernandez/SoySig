

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GestionModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set("America/Managua");	
	}

	public function GestionSearch($filtro){
		$queryRuta = ''; $json = array(); $i = 0;
        $and = '';
		if ($filtro!='') {
            $and = " and Descripcion like '%".$filtro."%'";
        }


		$query = $this->db->query("SELECT * FROM CatGestion WHERE 1=1 ".$and);

         if($query->num_rows() > 0){
			 foreach ($query->result_array() as $key) {
			 	 $json["data"][$i]["IdProceso"] = $key["IdProceso"];
				  $json["data"][$i]["IdGestion"] = $key["IdGestion"];
				 $json["data"][$i]["Descripcion"] = $key["Descripcion"];
				 $json["data"][$i]["FechaCrea"] = $key["FechaCrea"];
				 $json["data"][$i]["FechaEdita"] = $key["FechaEdita"];
                 $json["data"][$i]["Estado"] = $key["Estado"];
				 $json["data"][$i]["Editar"] = '<a class="btn btn-primary" href="'.base_url("index.php/editarGestion/").$key["IdProceso"].'">Editar</a>';				 
				 $i++;
         	}
		}
        echo json_encode($json);
	}

	public function guardarGestion($descripcion,$idProceso,$siglas)
	{
		$mensaje = array(); $string = '';
		try {
			if(strlen($descripcion)<5){
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "La descripción debe tener al menos 5 caracteres";
				echo json_encode($mensaje);
				return;
			}

			$insert = array(	
				'Descripcion' => $descripcion,
				'IdProceso' => $idProceso,
				'Sigla' => $siglas,
				'Estado' => 'ACTIVO',
				"FechaCrea" => gmdate(date("Y-m-d h:i:s")),
				'IdUsuarioCrea' => 1,
			);

			$result = $this->db->insert('CatGestion',$insert);
			if ($result) {
				$mensaje[0]["retorno"] = 1;
				$mensaje[0]["tipo"] = "succes";
				$mensaje[0]["mensaje"] = "Gestión guardada correctamente";
				echo json_encode($mensaje);
				$this->db->trans_commit();
				return;
			}
		} catch (Exception $ex) {
			$this->db->rollBack();
			$mensaje[0]["retorno"] = -1;
			$mensaje[0]["tipo"] = "error";
			$mensaje[0]["mensaje"] = "Error: ".$ex;
			echo json_encode($mensaje);
			return;
		}
	}
	
	public function guardarEditarGestion($descripcion,$id,$estado,$idProceso)
	{
		$mensaje = array(); $string = '';
		try {
			if(strlen($descripcion)<5){
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "La descripción debe tener al menos 5 caracteres";
				echo json_encode($mensaje);
				return;
			}
//echo $estado;return;
			$insert = array(	
				'Descripcion' => $descripcion,
				'IdProceso' => $idProceso,
				'Estado' => $estado == 1 ? 'ACTIVO' : "INACTIVO",
				"FechaEdita" => gmdate(date("Y-m-d h:i:s")),
				'IdUsuarioEdita' => 1
			);
			

					  $this->db->where('IdGestion',$id);
			$result = $this->db->update('CatGestion',$insert);

			if ($result) {
				$this->db->trans_commit();
				$mensaje[0]["retorno"] = 1;
				$mensaje[0]["tipo"] = "success";
				$mensaje[0]["mensaje"] = "Gestion editada correctamente";
				echo json_encode($mensaje);
				
				return;
			}
		} catch (Exception $ex) {
			$this->db->rollBack();
			$mensaje[0]["retorno"] = -1;
			$mensaje[0]["tipo"] = "error";
			$mensaje[0]["mensaje"] = "Error: ".$ex;
			echo json_encode($mensaje);
			return;
		}
	}
	public function getGestion($id)
	{
		//$result =  $this->db->get('CatGestion',array('id'=>$id));
		$result =  $this->db->query("SELECT * ,777 as cantidad FROM CatGestion where idProceso = ".$id);

		return $result->result_array();
	}

}

/* End of file .php */
