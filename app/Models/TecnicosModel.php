<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class TecnicosModel extends Model
{
    protected $table = 'nom_tecnicos';
    protected $primaryKey = 'id_tecnico';
    protected $allowedFields = ['fk_area', 'carnet', 'nombre'];

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('nom_tecnicos');
    }

    public function nom_area()
    {
        $sql = $this->db->query("SELECT nom_area.id_area, nom_area.nombre FROM nom_area");

        return $sql->getResultArray();
    }

    public function mostrar_tecnico()
    {
        $sql = $this->db->query("SELECT nom_tecnicos.id_tecnico, nom_area.nombre as 'area',nom_tecnicos.carnet, nom_tecnicos.nombre
        FROM nom_tecnicos JOIN nom_area WHERE nom_tecnicos.fk_area = nom_area.id_area");

        return $sql->getResultArray();
    }

    public function insertar_tecnico($data)
    {
        if ($this->db->table($this->table)->insert($data)) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }

    public function info_tec($id){
        $sql = $this->db->query("SELECT * FROM nom_tecnicos WHERE nom_tecnicos.id_tecnico = '$id'");
        return $sql->getResultArray();
    }
}
