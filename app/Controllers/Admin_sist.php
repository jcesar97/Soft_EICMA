<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AdminAsistModel;
use App\Models\BitacoraModel;
use App\Models\LoginModel;
use PhpParser\Node\Expr\AssignOp\Concat;

use function PHPUnit\Framework\isEmpty;

class Admin_sist extends BaseController
{
    protected $bitacora;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->bitacora=new BitacoraModel();
    }
    
    public function index()
    {
        $model = new AdminAsistModel();

        $data['tipo_rol'] = $model->tipo_rol();
        $data['usuarios'] = $model->mostrar_usuarios(session('area'));
        $data['area'] = $model->nom_area();

        if (session('fk_id_rol') != 1) {
            return redirect()->to(base_url('/Login'));
        }

        return view('Admin_sist/adminSist_view', $data);
    }

    public function add()
    {
        $model = new AdminAsistModel();;
        $log = new LoginModel();

        $data = [
            'fk_id_rol' => $this->request->getVar('fk_id_rol'),
            'nombre' => $this->request->getVar('nombre'),
            'apellidos'  => $this->request->getVar('apellidos'),
            'area' => $this->request->getVar('area'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'fecha_creacion' => $this->request->getVar('fecha_creacion'),
            'fecha_actualizacion' => '',
            'estado' => 'activo',
        ];

        $confpass = $this->request->getVar('conf_pass');
        $existEmail = $model->existe_email($data['email']);

        $save = $model->insertar_usuario($data);

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
            'estado_actual' => 'rol:'.$data['fk_id_rol']."\n".
                               'nombre:'.$data['nombre']."\n".
                               'apellidos:'.$data['apellidos']."\n".
                               'area:'.$data['area']."\n".
                               'email:'.$data['email']."\n".
                               'fecha_creacion:'.$data['fecha_creacion']."\n".
                               'fecha_actualizacion:'.$data['fecha_actualizacion']."\n".
                               'estado:'.$data['estado'],
        ]);
       
        if ($save != false) {
            $data = $model->where('id_user', $save)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }

        //return redirect()->to('Admin_sist/index');
    }

    public function edit($id = null)
    {
        $model = new AdminAsistModel();
        $data = $model->where('id_user', $id)->first();

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }
    
    public function camb_pass()
    {
        helper(['form', 'url']);
        $model = new AdminAsistModel();
        $log = new LoginModel();

        $id = $this->request->getVar('id_user');

        $datos_usuario = $model->datos_usuario($id);

        $email = $this->request->getVar('email');
        $email_db = $datos_usuario[0]['email'];

        $pass = $this->request->getVar('ult_pass');
   
        if ($email == $email_db && password_verify($pass, $datos_usuario[0]['password'])) {
            $data = [
                'fk_id_rol' => $datos_usuario[0]['fk_id_rol'],
                'nombre' => $datos_usuario[0]['nombre'],
                'apellidos'  => $datos_usuario[0]['apellidos'],
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                'fecha_creacion' => $datos_usuario[0]['fecha_creacion'],
                'fecha_actualizacion' => $datos_usuario[0]['fecha_actualizacion'],
            ];

            $info_usu = $model->info_usu($id);
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
                'evento' => 'Cambiar contraseña',
                'estado_anterior' => 'rol:'.$info_usu[0]['fk_id_rol']."\n".
                                     'nombre:'.$info_usu[0]['nombre']."\n".
                                     'apellidos:'.$info_usu[0]['apellidos']."\n".
                                     'area:'.$info_usu[0]['area']."\n".
                                     'email:'.$info_usu[0]['email']."\n".
                                     'fecha_creacion:'.$info_usu[0]['fecha_creacion']."\n".
                                     'fecha_actualizacion:'.$info_usu[0]['fecha_actualizacion']."\n".
                                     'estado:'.$info_usu[0]['estado'],

                'estado_actual' => 'rol:'.$usuario[0]['fk_id_rol']."\n".
                                   'nombre:'.$usuario[0]['nombre']."\n".
                                   'apellidos:'.$usuario[0]['apellidos']."\n".
                                   'area:'.$usuario[0]['area']."\n".
                                   'email:'.$usuario[0]['email']."\n".
                                   'fecha_creacion:'.$usuario[0]['fecha_creacion']."\n".
                                   'fecha_actualizacion:'.$usuario[0]['fecha_actualizacion']."\n".
                                   'estado:'.$usuario[0]['estado'],
            ]);

            if ($update != false) {
                $data = $model->where('id_user', $id)->first();
                echo json_encode(array("status" => true, 'data' => $data));
            } else {
                echo json_encode(array("status" => false, 'data' => $data));
            }
        }
                
    }
      
    public function inhabilitar_usuario($id = null)
    {
        $model = new AdminAsistModel();
        $log = new LoginModel();

        $form = $model->where('id_user', $id)->first();

        $data = [
            'fk_id_rol' => $form['fk_id_rol'],
            'nombre' =>  $form['nombre'],
            'apellidos'  =>  $form['apellidos'],
            'email' =>  $form['email'],
            'password'  =>  $form['password'],
            'fecha_creacion' => $form['fecha_creacion'],
            'fecha_actualizacion' => $form['fecha_actualizacion'],
            'estado' =>  'inactivo',
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
            'evento' => 'Inhabilitar usuario',
            'estado_anterior' => 
                                'rol:'.$info_dep[0]['fk_id_rol']."\n".
                                'nombre:'.$info_dep[0]['nombre']."\n".
                                'apellidos:'.$info_dep[0]['apellidos']."\n".
                                'area:'.$info_dep[0]['area']."\n".
                                'email:'.$info_dep[0]['email']."\n".
                                'fecha_creacion:'.$info_dep   [0]['fecha_creacion']."\n".
                                'fecha_actualizacion:'.$info_dep[0]['fecha_actualizacion']."\n".
                                'estado:'.$info_dep[0]['estado'],

            'estado_actual' => 
                                'rol:'.$usuario[0]['fk_id_rol']."\n".
                                'nombre:'.$usuario[0]['nombre']."\n".
                                'apellidos:'.$usuario[0]['apellidos']."\n".
                                'area:'.$usuario[0]['area']."\n".
                                'email:'.$usuario[0]['email']."\n".
                                'fecha_creacion:'.$usuario[0]['fecha_creacion']."\n".
                                'fecha_actualizacion:'.$usuario[0]['fecha_actualizacion']."\n".
                                'estado:'.$usuario[0]['estado'],
        ]);

        return redirect()->to('Admin_sist/index');
    }
}
