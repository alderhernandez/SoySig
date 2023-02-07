<?php
class LoginModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($name,$pass)
    {
        if ($name != FALSE && $pass != FALSE) {
            $this->db->where('Usuario', $name);
            $this->db->where('Clave', $pass);
            
            $this->db->where("Estado",'ACTIVO');
            $query = $this->db->get('usuarios');

            if ($query->num_rows() == 1) {
                return $query->result_array();
            }
            return 0;
        }
    }

   
}
?>