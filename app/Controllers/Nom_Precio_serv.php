<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Precio_servModel;
use App\Models\BitacoraModel;
use App\Models\LoginModel;

class Nom_Precio_serv extends BaseController
{
    protected $bitacora;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->bitacora=new BitacoraModel();
    }

    public function index()
    {
        $model = new Precio_servModel();

        $data ['serv'] = $model->nom_servicio();
        $data ['mon'] = $model->nom_moneda();
        $data['precio_serv'] = $model->mostrar_prec_serv();

        return view('Nomencladores/precio_serv_view', $data);       
    }

    public function add()
    {

        helper(['form', 'url']);

        $model = new Precio_servModel();
        $log = new LoginModel();

        $data = [
            'fk_servicio' => $this->request->getVar('servicio'),
            'fk_moneda' => $this->request->getVar('sigla'),
            'precio'  => $this->request->getVar('precio'),
        ];

        $save = $model->insertar_prec_serv($data);

        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,  
            'detalles_disp' => $detalles_disp,
            'evento' => 'Agregar precio de servicio',
            'estado_actual' => 'fk_servicio:'.$data['fk_servicio']."\n".
                               'fk_moneda:'.$data['fk_moneda']."\n".
                               'precio:'.$data['precio'],
        ]);

        if ($save != false) {
            $data = $model->where('id_prec_serv', $save)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }
    }

    public function edit($id = null)
    {
        $model = new Precio_servModel();
        $data = $model->where('id_prec_serv', $id)->first();

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new Precio_servModel();
        $log = new LoginModel();

        $id = $this->request->getVar('id_prec_serv');

        $data = [
            'fk_servicio' => $this->request->getVar('servicio'),
            'fk_moneda' => $this->request->getVar('sigla'),
            'precio'  => $this->request->getVar('precio'),
        ];

        $info_prec_serv = $model->info_prec_serv($id);
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
            'evento' => 'Editar precio de servicio',
            'estado_anterior' => 'fk_servicio:'.$info_prec_serv[0]['fk_servicio']."\n".
                                 'fk_moneda:'.$info_prec_serv[0]['fk_moneda']."\n".
                                 'precio:'.$info_prec_serv[0]['precio'],

            'estado_actual' => 'fk_servicio:'.$data['fk_servicio']."\n". 
                               'fk_moneda:'.$data['fk_moneda']."\n".
                               'precio:'.$data['precio'],
        ]);

        if ($update != false) {    
            $data = $model->where('id_prec_serv', $id)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }
    }

    public function delete($id = null)
    {
        $model = new Precio_servModel();
        $log = new LoginModel();

        $info_prec_serv = $model->info_prec_serv($id);
        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,
            'detalles_disp' => $detalles_disp,
            'evento' => 'Eliminar precio de servicio',
            'estado_anterior' => 'fk_servicio:'.$info_prec_serv[0]['fk_servicio']."\n".
                                 'fk_moneda:'.$info_prec_serv[0]['fk_moneda']."\n".
                                 'precio:'.$info_prec_serv[0]['precio'],
        ]);

        $delete = $model->where('id_prec_serv', $id)->delete();
        if ($delete) {
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false));
        }
    }
}
