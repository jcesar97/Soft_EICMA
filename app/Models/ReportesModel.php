<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;;
use CodeIgniter\Model;

class ReportesModel extends Model
{
    protected $table = 'reporte';
    protected $primaryKey = 'id_reporte';
    protected $allowedFields = ['fk_cliente', 'fk_estado', 'fk_area', 'fk_tecnico', 'fecha', 'codigo', 'descripcion', 'fecha_asignado', 'fecha_cancelado', 'fecha_terminado'];

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('reporte');
    }

    public function nom_cliente()
    {
        $sql = $this->db->query("SELECT nom_cliente.id_cliente, nom_cliente.nombre FROM nom_cliente");
        return $sql->getResultArray();
    }

    public function nom_estado()
    {
        $sql = $this->db->query("SELECT nom_estado.id_estado, nom_estado.nombre FROM nom_estado");
        return $sql->getResultArray();
    }

    public function nom_area()
    {
        $sql = $this->db->query("SELECT nom_area.id_area, nom_area.nombre FROM nom_area");
        return $sql->getResultArray();
    }

    public function nom_tecnico($area)
    {
        $sql = $this->db->query("SELECT nom_tecnicos.id_tecnico, nom_tecnicos.nombre FROM nom_tecnicos WHERE nom_tecnicos.fk_area = $area");
        return $sql->getResultArray();
    }

    public function mostrar_reporte()
    {
        $sql = $this->db->query("SELECT reporte.id_reporte, nom_cliente.nombre as 'cliente', nom_estado.nombre as 'estado', nom_area.nombre as 'area', reporte.fecha, reporte.fecha_asignado, reporte.fecha_cancelado, reporte.fecha_terminado,
        reporte.codigo,reporte.usuario, reporte.descripcion FROM reporte 
                                       JOIN nom_cliente, nom_estado, nom_area
                                WHERE 
                                       reporte.fk_cliente = nom_cliente.id_cliente AND 			
                                       reporte.fk_area = nom_area.id_area AND			
                                       reporte.fk_estado = nom_estado.id_estado");

        return $sql->getResultArray();
    }

    public function mostrar_rep_area($area){
        $sql = $this->db->query("SELECT reporte.id_reporte, nom_cliente.nombre as 'cliente', nom_estado.nombre as 'estado', nom_area.nombre as 'area', reporte.fecha, reporte.fecha_asignado, reporte.fecha_cancelado, reporte.fecha_terminado,
        reporte.codigo,reporte.usuario, reporte.descripcion FROM reporte 
                                       JOIN nom_cliente, nom_estado, nom_area
                                WHERE 
                                       reporte.fk_cliente = nom_cliente.id_cliente AND 			
                                       reporte.fk_area = nom_area.id_area AND			
                                       reporte.fk_estado = nom_estado.id_estado AND 
									   reporte.fk_area = $area");

        return $sql->getResultArray();
    }

    public function idReporte($id){
        $sql = $this->db->query("SELECT * FROM reporte WHERE reporte.id_reporte = '$id'");

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

    public function ultimo_codigo()
    {
        $sql = $this->db->query("SELECT id_reporte FROM reporte ORDER BY id_reporte DESC LIMIT 1");
        return $sql->getResultArray();
    }   
    
    public function info_rep($id){
        $sql = $this->db->query("SELECT * FROM reporte WHERE reporte.id_reporte = '$id'");
        return $sql->getResultArray();
    }
}
