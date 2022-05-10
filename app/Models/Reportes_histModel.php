<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Reportes_histModel extends Model
{
    protected $table = 'reporte_hist_estado';
    protected $primaryKey = 'id_rep_est';
    protected $allowedFields = ['fk_reporte', 'fk_estado', 'fecha'];

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('reporte_hist_estado');
    }

    public function nom_reporte()
    {
        $sql = $this->db->query("SELECT reporte.id_reporte FROM reporte");
        return $sql->getResultArray();
    }

    public function nom_estado()
    {
        $sql = $this->db->query("SELECT nom_estado.id_estado, nom_estado.nombre FROM nom_estado");
        return $sql->getResultArray();
    }

    public function mostrar_hist_est()
    {
        $sql = $this->db->query("SELECT reporte_hist_estado.id_rep_est, reporte.id_reporte , nom_estado.nombre, reporte_hist_estado.fecha FROM reporte_hist_estado 
                                        JOIN reporte, nom_estado
                                WHERE 
                                        reporte_hist_estado.fk_reporte = reporte.id_reporte AND 			
                                        reporte_hist_estado.fk_estado = nom_estado.id_estado ");

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
