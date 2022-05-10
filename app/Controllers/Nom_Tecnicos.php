<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TecnicosModel;
use App\Models\DepartamentosModel;
use App\Models\BitacoraModel;
use App\Models\LoginModel;
class Nom_Tecnicos extends BaseController
{
    protected $bitacora;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->bitacora=new BitacoraModel();
    }


    public function index()
    {
        $model = new TecnicosModel();
        $data['area'] = $model->nom_area();
        $data['tecnicos'] = $model->mostrar_tecnico();

        return view('Nomencladores/tecnicos_view', $data);
    }

    public function add()
    {
        helper(['form', 'url']);

        $model = new TecnicosModel();
        $log = new LoginModel();
        
        $data = [
            'fk_area' => $this->request->getVar('area'),
            'carnet' => $this->request->getVar('carnet'),
            'nombre'  => $this->request->getVar('nombre'),
        ];
        $save = $model->insertar_tecnico($data);

        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,  
            'detalles_disp' => $detalles_disp,
            'evento' => 'Agregar tecnico',
            'estado_actual' => 'fk_area:'.$data['fk_area']."\n".
                               'carnet:'.$data['carnet']."\n".
                               'nombre:'.$data['nombre'],
        ]);

        if ($save != false) {
            $data = $model->where('id_tecnico', $save)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }
    }

    public function edit($id = null)
    {
        $model = new TecnicosModel();
        $data = $model->where('id_tecnico', $id)->first();

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new TecnicosModel();
        $log = new LoginModel();

        $id = $this->request->getVar('id_tecnico');

        $data = [
            'fk_area'  => $this->request->getVar('area'),
            'carnet' => $this->request->getVar('carnet'),
            'nombre'  => $this->request->getVar('nombre')
        ];

        $info_tec = $model->info_tec($id);
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
            'evento' => 'Editar tecnico',
            'estado_anterior' => 'fk_area:'.$info_tec[0]['fk_area']."\n".
                                 'carnet:'.$info_tec[0]['carnet']."\n".
                                 'nombre:'.$info_tec[0]['nombre'],

            'estado_actual' => 'fk_area:'.$data['fk_area']."\n".
                               'carnet:'.$data['carnet']."\n".
                               'nombre:'.$data['nombre'],
        ]);

        if ($update != false) {
            $data = $model->where('id_tecnico', $id)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }
    }

    public function delete($id = null)
    {
        $model = new TecnicosModel();
        $log = new LoginModel();

        $info_tec = $model->info_tec($id);
        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,
            'detalles_disp' => $detalles_disp,
            'evento' => 'Eliminar tecnico',
            'estado_anterior' => 'fk_area:'.$info_tec[0]['fk_area']."\n".
                                 'carnet:'.$info_tec[0]['carnet']."\n".
                                 'nombre:'.$info_tec[0]['nombre'],
        ]);

        $delete = $model->where('id_tecnico', $id)->delete();
        if ($delete) {
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false));
        }
    }
}
