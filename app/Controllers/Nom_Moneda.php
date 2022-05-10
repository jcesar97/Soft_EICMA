<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MonedaModel;
use App\Models\BitacoraModel;
use App\Models\LoginModel;

class Nom_Moneda extends BaseController
{
    protected $bitacora;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->bitacora=new BitacoraModel();
    }
    
    public function index()
    {
        $model = new MonedaModel();
        $data['moneda'] = $model->mostrar_moneda();

        return view('Nomencladores/moneda_view', $data);
    }

    public function add()
    {
        helper(['form', 'url']);

        $model = new MonedaModel();
        $log = new LoginModel();

        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'sigla' => $this->request->getVar('sigla'),
        ];
        $save = $model->insertar_moneda($data);

        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,  
            'detalles_disp' => $detalles_disp,
            'evento' => 'Agregar moneda',
            'estado_actual' => 'nombre:'.$data['nombre']."\n".
                               'sigla:'.$data['sigla'],
        ]);


        if ($save != false) {
            $data = $model->where('id_moneda', $save)->first();
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false, 'data' => $data]);
        }
    }

    public function edit($id = null)
    {
        $model = new MonedaModel();
        $data = $model->where('id_moneda', $id)->first();

        if ($data) {
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new MonedaModel();
        $log = new LoginModel();

        $id = $this->request->getVar('id_moneda');

        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'sigla' => $this->request->getVar('sigla'),
        ];

        $info_mon = $model->info_mon($id);

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
            'evento' => 'Editar moneda',
            'estado_anterior' => 'nombre:'.$info_mon[0]['nombre']."\n".
                                 'sigla:'.$info_mon[0]['sigla'],

            'estado_actual' => 'nombre:'.$data['nombre']."\n".
                               'sigla:'.$data['sigla'],
        ]);
        if ($update != false) {
            $data = $model->where('id_moneda', $id)->first();
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false, 'data' => $data]);
        }
    }

    public function delete($id = null)
    {
        $model = new MonedaModel();
        $log = new LoginModel();

        $info_mon = $model->info_mon($id);
        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,
            'detalles_disp' => $detalles_disp,
            'evento' => 'Eliminar moneda',
            'estado_anterior' => 'nombre:'.$info_mon[0]['nombre']."\n".
                                 'sigla:'.$info_mon[0]['sigla'],
        ]);

        $delete = $model->where('id_moneda', $id)->delete();
        if ($delete) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }
}
