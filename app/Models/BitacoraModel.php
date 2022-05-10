<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class BitacoraModel extends Model
{
    protected $table = 'login_trazas_sist';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $createdField = 'fecha';
    protected $updatedField = '';
    protected $deletedField = '';
    protected $allowedFields = [
        'id_usuario',
        'direccion_ip',
        'detalles_disp',
        'uri',
        'evento',
        'estado_anterior',
        'estado_actual',
    ];

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $builder = $db->table('login_trazas_sist');
    }

    public function get_bitac(){
        $sql = $this->db->query("SELECT * FROM login_trazas_sist");
        return $sql->getResultArray();
    }
}
