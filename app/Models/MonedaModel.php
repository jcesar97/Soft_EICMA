<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class MonedaModel extends Model
{
    protected $table = 'nom_moneda';
    protected $primaryKey = 'id_moneda';
    protected $allowedFields = ['nombre', 'sigla'];

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('nom_moneda');
    }

    public function mostrar_moneda()
    {
        $sql = $this->db->query("SELECT nom_moneda.id_moneda, nom_moneda.nombre, nom_moneda.sigla FROM nom_moneda");

        return $sql->getResultArray();
    }

    public function insertar_moneda($data)
    {
        if ($this->db->table($this->table)->insert($data)) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }

    public function info_mon($id){
        $sql = $this->db->query("SELECT * FROM nom_moneda WHERE nom_moneda.id_moneda = '$id'");
        return $sql->getResultArray();
    }
}
