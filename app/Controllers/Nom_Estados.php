<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EstadosModel;
use App\Models\BitacoraModel;
use App\Models\LoginModel;

class Nom_Estados extends BaseController
{
    protected $bitacora;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->bitacora = new BitacoraModel();
    }

    public function index()
    {
        $model = new EstadosModel();
        $data['estados'] = $model->mostrar_estado();

        return view('Nomencladores/estados_view', $data);
    }

    public function add()
    {
        helper(['form', 'url']);

        $model = new EstadosModel();
        $log = new LoginModel();

        $data = [
            'nombre' => $this->request->getVar('nombre'),
        ];
        
        $save = $model->insertar_estado($data);

        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,  
            'detalles_disp' => $detalles_disp,
            'evento' => 'Agregar estado',
            'estado_actual' => 'nombre:'.$data['nombre'],
        ]);


        if ($save != false) {
            $data = $model->where('id_estado', $save)->first();
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false, 'data' => $data]);
        }
    }

    public function edit($id = null)
    {
        $model = new EstadosModel();
        $data = $model->where('id_estado', $id)->first();

        if ($data) {
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new EstadosModel();
        $log = new LoginModel();

        $id = $this->request->getVar('id_estado');

        $data = [
            'nombre' => $this->request->getVar('nombre'),
        ];

        $info_est = $model->info_est($id);

        $update = $model->update($id, $data);

        $usuario = $log->existe_email(session('email'));
       

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,  
            'detalles_disp' => $detalles_disp,
            'evento' => 'Editar estado',
            'estado_anterior' => 'nombre:'.$info_est[0]['nombre'],

            'estado_actual' => 'nombre:'.$data['nombre'],
        ]);
        if ($update != false) {
            $data = $model->where('id_estado', $id)->first();
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false, 'data' => $data]);
        }
    }

    public function delete($id = null)
    {
        $model = new EstadosModel();
        $log = new LoginModel();

        $info_est = $model->info_est($id);
        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,
            'detalles_disp' => $detalles_disp,
            'evento' => 'Eliminar estado',
            'estado_anterior' => 'nombre:'.$info_est[0]['nombre'],
        ]);

        $delete = $model->where('id_estado', $id)->delete();
        if ($delete) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }
}
