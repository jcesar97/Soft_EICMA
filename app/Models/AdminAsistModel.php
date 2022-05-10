<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class AdminAsistModel extends Model
{
    protected $table = 'login_usuarios';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['fk_id_rol', 'nombre', 'apellidos', 'area', 'email', 'password', 'fecha_creacion', 'fecha_actualizacion', 'estado'];

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('login_usuarios');
    }//

    public function nom_area()
    {
        $sql = $this->db->query("SELECT nom_area.id_area, nom_area.nombre FROM nom_area");
        return $sql->getResultArray();
    }

    public function tipo_rol()
    {
        $sql = $this->db->query("SELECT login_roles.id_rol, login_roles.tipo_rol FROM login_roles");
        return $sql->getResultArray();
    }

    public function mostrar_usuarios($area)
    {
        $sql = $this->db->query("	SELECT login_usuarios.id_user, login_roles.tipo_rol, login_usuarios.nombre, login_usuarios.apellidos, 
		nom_area.nombre as 'area', login_usuarios.email, login_usuarios.`password`, login_usuarios.fecha_creacion, login_usuarios.fecha_actualizacion
        FROM login_usuarios JOIN login_roles, nom_area WHERE login_usuarios.fk_id_rol = login_roles.id_rol AND login_usuarios.area = nom_area.id_area");

        return $sql->getResultArray();;
    }

    public function insertar_usuario($data)
    {
        if ($this->db->table($this->table)->insert($data)) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }
    
    public function datos_usuario($id)
    {
        $sql = $this->db->query("SELECT * FROM login_usuarios WHERE login_usuarios.id_user = '$id'");
        return $sql->getResultArray();
    }

    public function existe_email($email)
    {
        $sql = $this->db->query("SELECT * FROM login_usuarios WHERE login_usuarios.email = '$email'");
        return $sql->getResultArray();
    }

    public function info_usu($id){
        $sql = $this->db->query("SELECT * FROM login_usuarios WHERE login_usuarios.id_user = '$id'");
        return $sql->getResultArray();
    }
}
