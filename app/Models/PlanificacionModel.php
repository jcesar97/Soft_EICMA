<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class PlanificacionModel extends Model
{
    protected $table = 'planificacion';
    protected $primaryKey = 'id_planificacion';
    protected $allowedFields = ['fk_area', 'fk_cliente', 'fk_frecuencia'];

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('planificacion');
    }

    public function nom_area()
    {
        $sql = $this->db->query("SELECT nom_area.id_area, nom_area.nombre FROM nom_area");
        return $sql->getResultArray();
    }

    public function nom_cliente()
    {
        $sql = $this->db->query("SELECT nom_cliente.id_cliente, nom_cliente.nombre FROM nom_cliente");
        return $sql->getResultArray();
    }

    public function nom_frecuencia()
    {
        $sql = $this->db->query("SELECT nom_frecuencia.id_frecuencia, nom_frecuencia.nombre FROM nom_frecuencia ");
        return $sql->getResultArray();
    }

    public function mostrar_planificacion()
    {
        $sql = $this->db->query("SELECT planificacion.id_planificacion, nom_area.nombre as 'area', nom_cliente.nombre as 'cliente', nom_frecuencia.nombre as 'frecuencia' 																FROM planificacion
					
                                        JOIN nom_area, nom_cliente, nom_frecuencia
                                WHERE 
                                planificacion.fk_area = nom_area.id_area AND 			
                                planificacion.fk_cliente = nom_cliente.id_cliente AND			
                                planificacion.fk_frecuencia = nom_frecuencia.id_frecuencia 	");

        return $sql->getResultArray();
    }

    public function insertar_rep_est($data)
    {
        if ($this->db->table($this->table)->insert($data)) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }

    
}
