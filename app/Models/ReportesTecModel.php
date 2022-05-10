<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ReportesTecModel extends Model
{
    protected $table = 'reporte_tecnico';
    protected $primaryKey = 'id_repor_tec';
    protected $allowedFields = ['fk_reporte', 'fk_tecnico'];

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('reporte_tecnico');
    }

    public function asig_tec($data)
    {
        if ($this->db->table($this->table)->insert($data)) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }

    public function ultimo_codigo()
    {
        $sql = $this->db->query("SELECT id_reporte FROM reporte ORDER BY id_reporte DESC LIMIT 1");
        return $sql->getResultArray();
    }    

   /*  public function area()
    {
        $sql = $this->db->query("SELECT reporte.fk_area as 'area' FROM reporte WHERE reporte.id_reporte = 86");
        return $sql->getResultArray();
    } */
    
    /* public function tecnico_x_area($id)
    {
    $sql = $this->db->query("SELECT nom_tecnicos.id_tecnico, nom_tecnicos.nombre FROM nom_tecnicos WHERE nom_tecnicos.fk_area = $id");
        return $sql->getResultArray();
    }
 */
}
