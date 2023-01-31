

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
				 $json["data"][$i]["Editar"] = '<a class="btn btn-primary" href="'.base_url("index.php/editarGestion/").$key["IdGestion"].'">Editar</a>';
				 $json["data"][$i]["AgregarDocumento"] = '<a class="btn btn-primary" href="'.base_url("index.php/agregarDocumentoGestion/").$key["IdGestion"].'">Agregar Documento</a>';
				 $i++;
         	}
		}
        echo json_encode($json);
	}

	public function guardarGestion($descripcion,$idProceso,$siglas)
	{

		//ECHO $idProceso;return;
		$mensaje = array(); 
		$this->db->trans_start();
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
		$mensaje = array(); 
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
		$result =  $this->db->query("SELECT * ,777 as cantidad FROM CatGestion where IdGestion = ".$id);

		return $result->result_array();
	}

	public function getDocumentos($id)
	{
		$query = $this->db->query("SELECT * FROM TblDocumentos where Estado = 'Activo' and IdGestion = ".$id);

		return $query->result_array();
	}

	public function guardarDocumento($file_ext, $file, $id, $nombre, $descripcion, $area, $idGestion = null,$txtIdPadre = null)
	{
		$mensaje = array(); 
		$this->db->trans_start();

		try {
			if(strlen($descripcion)<5){
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "La descripción debe tener al menos 5 caracteres";
				echo json_encode($mensaje);
				return;
			}
			if(strlen($nombre)<5){
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "El nombre debe tener al menos 5 caracteres";
				echo json_encode($mensaje);
				return;
			}
			if(strlen($descripcion)<5){
				$mensaje[0]["retorno"] = -1;
				$mensaje[0]["tipo"] = "error";
				$mensaje[0]["mensaje"] = "La descripción debe tener al menos 5 caracteres";
				echo json_encode($mensaje);
				return;
			}

			$insert = array(
				'IdGestion' => $id,
				'Nombre' => $nombre,
				'Descripcion' => $descripcion,
				'Url' => $file,
				'Tipo' => $file_ext,
				'Estado' => 'ACTIVO',
				"FechaCrea" => gmdate(date("Y-m-d h:i:s")),
				'IdUsuarioCrea' => 1,//todo
				'IdArea' => $area
			);

			if ($idGestion != null) {
				$insert["IdGestion"] = $idGestion;
				$insert["IdPadre"] = $txtIdPadre;
				if ($txtIdPadre == '' || $txtIdPadre == null) {
					$insert["IdPadre"] = $id;
				}
				

				$this->db->query("UPDATE TblDocumentos set Estado = 'INACTIVO', IdUsuarioEdita = 1, FechaEdita = '".gmdate(date("Y-m-d h:i:s"))."' WHERE IdDocumento = ".$id );//todo
			}


			$result = $this->db->insert('TblDocumentos',$insert);			


			if ($result) {				
				$this->db->trans_commit();
				$mensaje[0]["retorno"] = 1;
				$mensaje[0]["tipo"] = "success";
				$mensaje[0]["mensaje"] = "Documento guardado correctamente";
				return json_encode($mensaje);				
			}
		} catch (Exception $ex) {
			$this->db->rollBack();
			$mensaje[0]["retorno"] = -1;
			$mensaje[0]["tipo"] = "error";
			$mensaje[0]["mensaje"] = "Error: ".$ex;
			return json_encode($mensaje);
		}
	}



	public function getDocumento($id)
	{
		$result = $this->db->query("SELECT t0.*,t3.IdArea,t3.Descripcion as DescripcionArea 
							FROM TblDocumentos t0 
							inner join CatGestion t1 on t1.IdGestion = t0.IdGestion
							left join CatAreas t3 on t3.IdArea = t0.IdArea
							where t0.IdDocumento = ".$id);
		return $result->result_array();
	}

	public function getHistorialDocumento($id)
	{
		$padre = $this->db->query("SELECT * FROM TblDocumentos  where IdDocumento = ".$id);
		$and = "";
		if($padre->num_rows()>0 && $padre->result_array()[0]["IdPadre"] != null){
			$and = "or IdPadre = ".$padre->result_array()[0]["IdPadre"];
		}
		//echo "SELECT * FROM TblDocumentos where IdPadre = ".$id." or IdPadre = ".$padre->result_array()[0]["IdPadre"];
		$result = $this->db->query("SELECT * FROM TblDocumentos where IdPadre = ".$id."".$and." order by FechaCrea desc");
		return $result->result_array();
	}
}

/* End of file .php */
