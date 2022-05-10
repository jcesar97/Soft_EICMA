<?php

namespace App\Controllers;;

use CodeIgniter\Controller;
use App\Models\ServiciosModel;
use App\Models\Uni_medModel;
use App\Models\BitacoraModel;
use App\Models\LoginModel;

class Nom_Servicios extends BaseController
{
    protected $bitacora;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->bitacora=new BitacoraModel();
    }

    public function index()
    {

        $model = new ServiciosModel();
        $data['uni_med'] = $model->nom_uniMed();
        $data['servicios'] = $model->mostrar_servicio();

        return view('Nomencladores/servicios_view', $data);       
    }

    public function add()
    {
        helper(['form', 'url']);

        $model = new ServiciosModel();
        $log = new LoginModel();
        
        $data = [
            'fk_uni_med' => $this->request->getVar('id_uni_med'),
            'codigo' => $this->request->getVar('codigo'),
            'nombre'  => $this->request->getVar('nombre'),
        ];

        $save = $model->insertar_servicio($data);

        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,  
            'detalles_disp' => $detalles_disp,
            'evento' => 'Agregar servicio',
            'estado_actual' => 'fk_uni_med:'.$data['fk_uni_med']."\n".
                               'codigo:'.$data['codigo']."\n".
                               'nombre:'.$data['nombre'],
        ]);

        if ($save != false) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }
    }

    public function edit($id = null)
    {
        $model = new ServiciosModel();
        $data = $model->where('id_servicio', $id)->first();
        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new ServiciosModel();
        $log = new LoginModel();

        $id = $this->request->getVar('id_servicio');

        $data = [
            'fk_uni_med' => $this->request->getVar('sigla'),
            'codigo' => $this->request->getVar('codigo'),
            'nombre'  => $this->request->getVar('nombre'),
        ];

        $info_serv = $model->info_serv($id);
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
            'evento' => 'Editar servicio',
            'estado_anterior' => 'fk_uni_med:'.$info_serv[0]['fk_uni_med']."\n".
                                 'codigo:'.$info_serv[0]['codigo']."\n".
                                 'nombre:'.$info_serv[0]['nombre'],

            'estado_actual' => 'fk_uni_med:'.$data['fk_uni_med']."\n".
                               'codigo:'.$data['codigo']."\n".
                               'nombre:'.$data['nombre'],
        ]);
        if ($update != false) {  
            //$data = $model->where('id_servicio', $id)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }
    }

    public function delete($id = null)
    {
        $model = new ServiciosModel();
        $log = new LoginModel();

        $info_serv = $model->info_serv($id);
        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,
            'detalles_disp' => $detalles_disp,
            'evento' => 'Eliminar servicio',
            'estado_anterior' => 'fk_uni_med:'.$info_serv[0]['fk_uni_med']."\n".
                                 'codigo:'.$info_serv[0]['codigo']."\n".
                                 'nombre:'.$info_serv[0]['nombre'],
        ]);

        $delete = $model->where('id_servicio', $id)->delete();
        if ($delete) {
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false));
        }
    }
}
