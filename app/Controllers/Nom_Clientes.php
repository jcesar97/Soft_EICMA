<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ClientesModel;
use App\Models\BitacoraModel;
use App\Models\LoginModel;

class Nom_Clientes extends BaseController
{   
    protected $bitacora;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->bitacora=new BitacoraModel();
    }

    public function index()
    {
        $model = new ClientesModel();
        $data['clientes'] = $model->mostrar_cliente();

        return view('Nomencladores/clientes_view', $data);
    }

    public function add()
    {
        helper(['form', 'url']);

        $model = new ClientesModel();
        $log = new LoginModel();

        $data = [
            'codigo' => $this->request->getVar('codigo'),
            'nombre'  => $this->request->getVar('nombre'),
        ];
        $save = $model->insertar_cliente($data);

        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,  
            'detalles_disp' => $detalles_disp,
            'evento' => 'Agregar cliente',
            'estado_actual' => 'codigo:'.$data['codigo']."\n".
                               'nombre:'.$data['nombre'],
        ]);

        if ($save != false) {
            $data = $model->where('id_cliente', $save)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }
    }

    public function edit($id = null)
    {
        $model = new ClientesModel();
        $data = $model->where('id_cliente', $id)->first();

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new ClientesModel();
        $log = new LoginModel();

        $id = $this->request->getVar('id_cliente');

        $data = [
            'codigo' => $this->request->getVar('codigo'),
            'nombre'  => $this->request->getVar('nombre')
        ];

        $info_cliente = $model->info_cliente($id);

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
            'evento' => 'Editar cliente',
            'estado_anterior' => 'codigo:'.$info_cliente[0]['codigo']."\n".
                                 'nombre:'.$info_cliente[0]['nombre'],

            'estado_actual' => 'codigo:'.$data['codigo']."\n".
                               'nombre:'.$data['nombre'],
        ]);
        if ($update != false) {
            $data = $model->where('id_cliente', $id)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }
    }

    public function delete($id = null)
    {
        $model = new ClientesModel();
        $log = new LoginModel();

        $info_cliente = $model->info_cliente($id);
        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,
            'detalles_disp' => $detalles_disp,
            'evento' => 'Eliminar cliente',
            'estado_anterior' => 'codigo:'.$info_cliente[0]['codigo']."\n".
                                 'nombre:'.$info_cliente[0]['nombre'],
        ]);

        $delete = $model->where('id_cliente', $id)->delete();
        if ($delete) {
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false));
        }
    }
}