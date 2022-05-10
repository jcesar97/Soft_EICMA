<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Uni_medModel;
use App\Models\BitacoraModel;
use App\Models\LoginModel;
class Nom_Uni_medida extends BaseController
{
    protected $bitacora;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->bitacora=new BitacoraModel();
    }

    public function index()
    {

        $model = new Uni_medModel();
        $data['uni_med'] = $model->mostrar_uni_med();

        return view('Nomencladores/uni_med_view', $data);
    }

    public function add()
    {
        helper(['form', 'url']);

        $model = new Uni_medModel();
        $log = new LoginModel();

        $data = [
            'nombre'  => $this->request->getVar('nombre'),
            'sigla'  => $this->request->getVar('sigla')
        ];
        $save = $model->insertar_uni_med($data);

        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,  
            'detalles_disp' => $detalles_disp,
            'evento' => 'Agregar unidad de medida',
            'estado_actual' => 'nombre:'.$data['nombre']."\n".
                               'sigla:'.$data['sigla'],
        ]);

        if ($save != false) {
            $data = $model->where('id_uni_med', $save)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }
    }

    public function edit($id = null)
    {
        $model = new Uni_medModel();
        $data = $model->where('id_uni_med', $id)->first();

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new Uni_medModel();
        $log = new LoginModel();

        $id = $this->request->getVar('id_uni_med');

        $data = [
            'nombre'  => $this->request->getVar('nombre'),
            'sigla'  => $this->request->getVar('sigla')
        ];

        $info_uni_med = $model->info_uni_med($id);
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
            'evento' => 'Editar unidad de medida',
            'estado_anterior' => 'nombre:'.$info_uni_med[0]['nombre']."\n".
                                 'sigla:'.$info_uni_med[0]['sigla'],

            'estado_actual' => 'nombre:'.$data['nombre']."\n".
                               'sigla:'.$data['sigla'],
        ]);

        if ($update != false) {
            $data = $model->where('id_uni_med', $id)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }
    }

    public function delete($id = null)
    {
        $model = new Uni_medModel();
        $log = new LoginModel();

        $info_uni_med = $model->info_uni_med($id);
        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,
            'detalles_disp' => $detalles_disp,
            'evento' => 'Eliminar unidad de medida',
            'estado_anterior' => 'nombre:'.$info_uni_med[0]['nombre']."\n".
                                 'sigla:'.$info_uni_med[0]['sigla'],
        ]);

        $delete = $model->where('id_uni_med', $id)->delete();
        if ($delete) {
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false));
        }
    }

}