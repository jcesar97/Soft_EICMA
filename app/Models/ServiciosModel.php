<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ServiciosModel extends Model
{
    protected $table = 'nom_servicios';
    protected $primaryKey = 'id_servicio';
    protected $allowedFields = ['fk_uni_med', 'codigo', 'nombre'];

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('nom_servicios');
    }

    public function nom_uniMed()
    {
        $sql = $this->db->query("SELECT nom_unidad_medida.id_uni_med, nom_unidad_medida.sigla FROM nom_unidad_medida");

        return $sql->getResultArray();
    }

    public function mostrar_servicio()
    {
        $sql = $this->db->query("SELECT nom_servicios.id_servicio, nom_unidad_medida.nombre as 'uni_nom',  nom_servicios.codigo, nom_servicios.nombre
        FROM nom_servicios JOIN nom_unidad_medida WHERE nom_servicios.fk_uni_med = nom_unidad_medida.id_uni_med");

        return $sql->getResultArray();
    }

    public function insertar_servicio($data)
    {
        if ($this->db->table($this->table)->insert($data)) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }  
    
    public function info_serv($id){
        $sql = $this->db->query("SELECT * FROM nom_servicios WHERE nom_servicios.id_servicio = '$id'");
        return $sql->getResultArray();
    }
}

