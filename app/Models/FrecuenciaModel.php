<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class FrecuenciaModel extends Model
{
    protected $table = 'nom_frecuencia';
    protected $primaryKey = 'id_frecuencia';
    protected $allowedFields = ['nombre'];

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('nom_frecuencia');
    }

    public function mostrar_frecuencia()
    {
        $sql = $this->db->query("SELECT nom_frecuencia.id_frecuencia, nom_frecuencia.nombre FROM nom_frecuencia");

        return $sql->getResultArray();
    }

    public function insertar_frecuencia($data)
    {
        if ($this->db->table($this->table)->insert($data)) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }

    public function info_frec($id){
        $sql = $this->db->query("SELECT * FROM nom_frecuencia WHERE nom_frecuencia.id_frecuencia = '$id'");
        return $sql->getResultArray();
    }
}
