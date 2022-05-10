<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FrecuenciaModel;
use App\Models\BitacoraModel;
use App\Models\LoginModel;

class Nom_Frecuencia extends BaseController
{
    protected $bitacora;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->bitacora=new BitacoraModel();
    }

    public function index()
    {
        $model = new FrecuenciaModel();
        $data['frecuencia'] = $model->mostrar_frecuencia();

        return view('Nomencladores/frecuencia_view', $data);
    }

    public function add()
    {
        helper(['form', 'url']);

        $model = new FrecuenciaModel();
        $log = new LoginModel();

        $data = [
            'nombre' => $this->request->getVar('nombre'),
        ];

        $save = $model->insertar_frecuencia($data);

        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,  
            'detalles_disp' => $detalles_disp,
            'evento' => 'Agregar frecuencia',
            'estado_actual' => 'nombre:'.$data['nombre'],
        ]);

        if ($save != false) {
            $data = $model->where('id_frecuencia', $save)->first();
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false, 'data' => $data]);
        }
    }

    public function edit($id = null)
    {
        $model = new FrecuenciaModel();
        $data = $model->where('id_frecuencia', $id)->first();

        if ($data) {
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new FrecuenciaModel();
        $log = new LoginModel();
        $id = $this->request->getVar('id_frecuencia');

        $data = [
            'nombre' => $this->request->getVar('nombre'),
        ];

        $info_frec = $model->info_frec($id);

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
            'evento' => 'Editar frecuencia',
            'estado_anterior' => 'nombre:'.$info_frec[0]['nombre'],

            'estado_actual' => 'nombre:'.$data['nombre'],
        ]);
        if ($update != false) {
            $data = $model->where('id_frecuencia', $id)->first();
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false, 'data' => $data]);
        }
    }

    public function delete($id = null)
    {
        $model = new FrecuenciaModel();
        $log = new LoginModel();

        $info_frec = $model->info_frec($id);
        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,
            'detalles_disp' => $detalles_disp,
            'evento' => 'Eliminar frecuencia',
            'estado_anterior' => 'nombre:'.$info_frec[0]['nombre'],
        ]);

        $delete = $model->where('id_frecuencia', $id)->delete();
        if ($delete) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }
}
