<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Uni_medModel extends Model
{
    protected $table = 'nom_unidad_medida';
    protected $primaryKey = 'id_uni_med';
    protected $allowedFields = ['nombre', 'sigla'];

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('nom_unidad_medida');
    }

    public function mostrar_uni_med()
    {
        $sql = $this->db->query("SELECT nom_unidad_medida.id_uni_med, nom_unidad_medida.nombre, nom_unidad_medida.sigla FROM nom_unidad_medida");

        return $sql->getResultArray();
    }

    public function insertar_uni_med($data)
    {
        if ($this->db->table($this->table)->insert($data)) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }

    public function info_uni_med($id){
        $sql = $this->db->query("SELECT * FROM nom_unidad_medida WHERE nom_unidad_medida.id_uni_med = '$id'");
        return $sql->getResultArray();;
    }
}
