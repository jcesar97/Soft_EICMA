<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Precio_servModel extends Model
{
    protected $table = 'nom_precio_servicios';
    protected $primaryKey = 'id_prec_serv';
    protected $allowedFields = ['fk_servicio', 'fk_moneda', 'precio'];

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('nom_precio_servicios');
    }

    public function nom_servicio()
    {
        $sql = $this->db->query("SELECT nom_servicios.id_servicio, nom_servicios.nombre FROM nom_servicios ");
        return $sql->getResultArray();
    }

    public function nom_moneda()
    {
        $sql = $this->db->query("SELECT nom_moneda.id_moneda, nom_moneda.sigla FROM nom_moneda ");
        return $sql->getResultArray();
    }

    public function mostrar_prec_serv()
    {
        $sql = $this->db->query("SELECT nom_precio_servicios.id_prec_serv, 
        nom_servicios.nombre ,  nom_moneda.sigla, nom_precio_servicios.precio FROM nom_servicios JOIN nom_moneda, nom_precio_servicios WHERE 
        nom_precio_servicios.fk_servicio = nom_servicios.id_servicio AND nom_precio_servicios.fk_moneda = nom_moneda.id_moneda
        ");

        return $sql->getResultArray();
    }

    public function insertar_prec_serv($data)
    {
        if ($this->db->table($this->table)->insert($data)) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }

    public function info_prec_serv($id){
        $sql = $this->db->query("SELECT * FROM nom_precio_servicios WHERE nom_precio_servicios.id_prec_serv = '$id'");
        return $sql->getResultArray();
    }

    
}
