<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Orden_trabModel extends Model
{
    protected $table = 'orden_trabajo';
    protected $primaryKey = 'id_ord_trab';
    protected $allowedFields = ['fk_area', 'fk_cliente', 'fk_tecnico', 'fk_estado', 'fk_reporte', 'fk_planificacion', 'fecha', 'descripcion'];

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('orden_trabajo');
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

    public function nom_tecnico()
    {
        $sql = $this->db->query("SELECT nom_tecnicos.id_tecnico, nom_tecnicos.nombre FROM nom_tecnicos");
        return $sql->getResultArray();
    }

    public function nom_estado()
    {
        $sql = $this->db->query("SELECT nom_estado.id_estado, nom_estado.nombre FROM nom_estado");
        return $sql->getResultArray();
    }

    public function nom_reporte()
    {
        $sql = $this->db->query("SELECT reporte.id_reporte FROM reporte");
        return $sql->getResultArray();
    }

    public function nom_planificacion()
    {
        $sql = $this->db->query("SELECT planificacion.id_planificacion FROM planificacion");
        return $sql->getResultArray();
    }

    public function mostrar_orden_trabajo()
    {
        $sql = $this->db->query("SELECT orden_trabajo.id_ord_trab, nom_area.nombre as 'area', nom_cliente.nombre as 'cliente', nom_tecnicos.nombre as 'tecnico',nom_estado.nombre as 'estado', reporte.id_reporte as 'reporte', planificacion.id_planificacion as 'planificacion',orden_trabajo.fecha, orden_trabajo.descripcion 																

                                        FROM orden_trabajo
                            
                                            JOIN nom_area, nom_cliente, nom_tecnicos, nom_estado, reporte, planificacion
                                        WHERE 
                                            orden_trabajo.fk_area = nom_area.id_area AND 			
                                            orden_trabajo.fk_cliente = nom_cliente.id_cliente AND			
                                            orden_trabajo.fk_tecnico = nom_tecnicos.id_tecnico AND 
                                            orden_trabajo.fk_estado = nom_estado.id_estado AND 			
                                            orden_trabajo.fk_reporte = reporte.id_reporte AND			
                                            orden_trabajo.fk_planificacion = planificacion.id_planificacion");

        return $sql->getResultArray();
    }

    public function insertar_ord_trab($data)
    {
        if ($this->db->table($this->table)->insert($data)) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }    
}
