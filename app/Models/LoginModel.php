<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'login_usuarios';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['fk_id_rol', 'nombre', 'apellidos', 'email', 'password', 'fecha_creacion', 'fecha_actualizacion'];

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $builder = $db->table('login_usuarios');
    }
    public function existe_email($email)
    {
        $query = $this->db->query("SELECT * FROM login_usuarios WHERE login_usuarios.email = '$email'");
        return $query->getResultArray();
    }

    public function num_email($email)
    {
        $query = $this->db->query("SELECT COUNT(DISTINCT login_usuarios.email)as 'cant' FROM login_usuarios  WHERE login_usuarios.email = '$email'");
        return $query->getResultArray();
    }

}