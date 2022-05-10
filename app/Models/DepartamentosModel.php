<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class DepartamentosModel extends Model
{
    protected $table = 'nom_area';
    protected $primaryKey = 'id_area';
    protected $allowedFields = ['codigo', 'nombre'];

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('nom_area');
    }

    public function mostrar_area()
    {
        $sql = $this->db->query("SELECT nom_area.id_area, nom_area.codigo, nom_area.nombre FROM nom_area");
        return $sql->getResultArray();
    }

    public function insertar_area($data)
    {
        if ($this->db->table($this->table)->insert($data)) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }

    public function info_dep($id){
        $sql = $this->db->query("SELECT * FROM nom_area WHERE nom_area.id_area = '$id'");
        return $sql->getResultArray();
    }
}
