<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ClientesModel extends Model
{
    protected $table = 'nom_cliente';
    protected $primaryKey = 'id_cliente';
    protected $allowedFields = ['codigo', 'nombre'];

    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('nom_cliente');
    }

    public function mostrar_cliente()
    {
        $sql = $this->db->query("SELECT nom_cliente.id_cliente, nom_cliente.codigo, nom_cliente.nombre FROM nom_cliente");

        return $sql->getResultArray();
    }


    public function insertar_cliente($data)
    {
        if ($this->db->table($this->table)->insert($data)) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }

    public function info_cliente($id){
        $sql = $this->db->query("SELECT * FROM nom_cliente WHERE nom_cliente.id_cliente = '$id'");
        return $sql->getResultArray();
    }


}
