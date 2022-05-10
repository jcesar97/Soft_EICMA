<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\BitacoraModel;

class Login extends BaseController
{   
    protected $bitacora;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->bitacora=new BitacoraModel();
    }

    public function index()
    {
        return view('login_view');
    }

    public function login()
    {   
        helper(['form', 'url']);
        $log = new LoginModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
       

        $datos_usuario = $log->existe_email($email);
        $cant_rows = $log->num_email($email);


        if ($cant_rows[0]['cant'] == 1 && password_verify($password, $datos_usuario[0]['password']) && $datos_usuario[0]['estado'] == 'activo') {
           
            $data = [
                'fk_id_rol' => $datos_usuario[0]['fk_id_rol'],
                'nombre' => $datos_usuario[0]['nombre'],
                'apellidos' => $datos_usuario[0]['apellidos'],
                'area' => $datos_usuario[0]['area'],
                'email' => $datos_usuario[0]['email'],
                'password' => $datos_usuario[0]['password'],
                'fecha_creacion' => $datos_usuario[0]['fecha_creacion'],
                'fecha_actualizacion' => $datos_usuario[0]['fecha_actualizacion'],
            ];

        
            $ip = $_SERVER['REMOTE_ADDR'];
            $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
            $uri = $_SERVER['REQUEST_URI'];

            $this->bitacora->save([
                'id_usuario' => $datos_usuario[0]['id_user'],
                'direccion_ip' => $ip,
                'uri' => $uri,  
                'detalles_disp' => $detalles_disp,
                'evento' => 'Inicio de sesion',
            ]);

            $session = session();
            $session->set($data);

            if ($datos_usuario[0]['fk_id_rol'] == 1) {
                return redirect()->to(base_url('index.php/Reportes/'));
            }
            elseif ($datos_usuario[0]['fk_id_rol'] == 3 ||$datos_usuario[0]['fk_id_rol'] == 7) {
                return redirect()->to(base_url('index.php/Reportes/'));
            }elseif ($datos_usuario[0]['fk_id_rol'] == 2 ||$datos_usuario[0]['fk_id_rol'] == 8) {
                return redirect()->to(base_url('index.php/Reportes/'));
            }

        } else {
            return redirect()->to(base_url('index.php/Login/'));
        }
    }

    public function salir()
    {
        $session = session();

        $log = new LoginModel();

        $usuario = $log->existe_email(session('email'));

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles_disp = $_SERVER['HTTP_USER_AGENT'];
        $uri = $_SERVER['REQUEST_URI'];

        $this->bitacora->save([
            'id_usuario' => $usuario[0]['id_user'],
            'direccion_ip' => $ip,
            'uri' => $uri,  
            'detalles_disp' => $detalles_disp,
            'evento' => 'Cierre de sesion',
        ]);


        $session->destroy();
        return redirect()->to(base_url('index.php/Login/'));
    }
}
