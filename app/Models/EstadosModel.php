<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class EstadosModel extends Model
{
    protected $table = 'nom_estado';
    protected $primaryKey = 'id_estado';
    protected $allowedFields = ['nombre'];

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('nom_estado');
    }

    public function mostrar_estado()
    {
        $sql = $this->db->query("SELECT nom_estado.id_estado, nom_estado.nombre FROM nom_estado");

        return $sql->getResultArray();
    }

    public function insertar_estado($data)
    {
        if ($this->db->table($this->table)->insert($data)) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }

    public function info_est($id){
        $sql = $this->db->query("SELECT * FROM nom_estado WHERE nom_estado.id_estado = '$id'");
        return $sql->getResultArray();
    }
}
