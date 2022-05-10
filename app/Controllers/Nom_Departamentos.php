<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DepartamentosModel;
use App\Models\BitacoraModel;
use App\Models\LoginModel;

class Nom_Departamentos extends BaseController
{
    protected $bitacora;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->bitacora=new BitacoraModel();
    }

    public function index()
    {
        $model = new DepartamentosModel();
        $data['deparamentos'] = $model->mostrar_area();

        return view('Nomencladores/departamentos_view', $data);
    }

    public function add()
    {
        helper(['form', 'url']);

        $model = new DepartamentosModel();
        $log = new LoginModel();

        $data = [
            'codigo' => $this->request->getVar('codigo'),
            'nombre' => $this->request->getVar('nombre'),
        ];

        $save = $model->insertar_area($data);

        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,  
            'detalles_disp' => $detalles_disp,
            'evento' => 'Agregar departamento',
            'estado_actual' => 'codigo:'.$data['codigo']."\n".
                               'nombre:'.$data['nombre'],
        ]);

        if ($save != false) {
            $data = $model->where('id_area', $save)->first();
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false, 'data' => $data]);
        }
    }

    public function edit($id = null)
    {
        $model = new DepartamentosModel();
        $data = $model->where('id_area', $id)->first();

        if ($data) {
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new DepartamentosModel();
        $log = new LoginModel();

        $id = $this->request->getVar('id_area');

        $data = [
            'codigo' => $this->request->getVar('codigo'),
            'nombre' => $this->request->getVar('nombre'),
        ];

        $info_dep = $model->info_dep($id);
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
            'evento' => 'Editar departamento',
            'estado_anterior' => 'codigo:'.$info_dep[0]['codigo']."\n".
                                 'nombre:'.$info_dep[0]['nombre'],

            'estado_actual' => 'codigo:'.$data['codigo']."\n".
                               'nombre:'.$data['nombre'],
        ]);
        
        if ($update != false) {
            $data = $model->where('id_area', $id)->first();
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false, 'data' => $data]);
        }
    }

    public function delete($id = null)
    {
        $model = new DepartamentosModel();
        $log = new LoginModel();

        $info_dep = $model->info_dep($id);
        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,
            'detalles_disp' => $detalles_disp,
            'evento' => 'Eliminar departamento',
            'estado_anterior' => 'codigo:'.$info_dep[0]['codigo']."\n".
                                 'nombre:'.$info_dep[0]['nombre'],
        ]);

        $delete = $model->where('id_area', $id)->delete();
        if ($delete) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }
}
