<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ReportesModel;
use App\Models\ReportesTecModel;
use App\Models\BitacoraModel;
use App\Models\LoginModel;
use PhpParser\Node\Expr\AssignOp\Concat;

use function PHPUnit\Framework\isEmpty;;

class Reportes extends BaseController
{
    protected $bitacora;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->bitacora = new BitacoraModel();
    }

    public function index()
    {
        $model = new ReportesModel();
        $tec_model = new ReportesTecModel();

        $data['cliente'] = $model->nom_cliente();
        $data['estado'] = $model->nom_estado();
        $data['area'] = $model->nom_area();
        $data['tecnico'] = $model->nom_tecnico(session('area'));
        $data['reporte'] = $model->mostrar_reporte();
        $data['reporte_area'] = $model->mostrar_rep_area(session('area'));
        $data['reporte_tec'] = $model->mostrar_rep_area(session('area'));
        $data['codigo'] = $model->ultimo_codigo();


        if (!session('fk_id_rol') == 2 || !session('fk_id_rol') == 3) {
            return redirect()->to(base_url('index.php/Login'));
        }

        return view('Reportes/reportes_view', $data);
    }

    public function add()
    {
        helper(['form', 'url']);
        $model = new ReportesModel();
        $log = new LoginModel();

        $codigo = $model->ultimo_codigo();

        /*if ($codigo[0]['id_reporte'] == null) {
            $cod = 0;
        }
        else{
            $cod = $codigo[0]['id_reporte'];
        } */

        $data = [
            'fk_cliente' => $this->request->getVar('cliente'),
            'fk_estado' => 1,
            'fk_area'  => $this->request->getVar('area'),
            'usuario' => session('nombre'),
            'fecha' => $this->request->getVar('fecha'),
            'codigo' => $codigo[0]['id_reporte'] + 1,
            'descripcion' => $this->request->getVar('descripcion'),
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
            'evento' => 'Agregar reporte',
            'estado_actual' =>
            'cliente:' . $data['fk_cliente'] .
                'estado:' . $data['fk_estado'] .
                'area:' . $data['fk_area'] .
                'usuario:' . $data['usuario'] .
                'fecha:' . $data['fecha'] .
                'codigo:' . $data['codigo'] .
                'descripcion:' . $data['descripcion'],
        ]);

        if ($save != false) {
            $data = $model->where('id_reporte', $save)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }
    }

    public function edit($id = null)
    {
        $model = new ReportesModel();
        $data = $model->where('id_reporte', $id)->first();

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public function update()
    {
        helper(['form', 'url']);
        $model = new ReportesModel();
        $log = new LoginModel();

        $id = $this->request->getVar('id_reporte');

        $codigo = $model->ultimo_codigo();

        $data = [
            'fk_cliente' => $this->request->getVar('cliente'),
            'fk_estado' => $this->request->getVar('estado'),
            'fk_area'  => $this->request->getVar('area'),
            'fecha' => $this->request->getVar('fecha'),
            'codigo'  => $this->request->getVar('codigo'),
            'descripcion' => $this->request->getVar('descripcion'),
        ];

        $infRep = $model->infRep($id);
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
            'evento' => 'Actualizar reporte',
            'estado_anterior' =>
            'cliente:' . $infRep[0]['fk_cliente'] . "\n" .
                'estado:' . $infRep[0]['fk_estado'] . "\n" .
                'area:' . $infRep[0]['fk_area'] . "\n" .
                'usuario:' . $infRep[0]['usuario'] . "\n" .
                'codigo:' . $infRep[0]['codigo'] . "\n" .
                'descripcion:' . $infRep[0]['descripcion'] . "\n" .
                'fecha:' . $infRep[0]['fecha'] . "\n" .
                'fecha_asignado:' . $infRep[0]['fecha_asignado'] . "\n" .
                'fecha_cancelado:' . $infRep[0]['fecha_cancelado'] . "\n" .
                'fecha_terminado:' . $infRep[0]['fecha_terminado'],

            'estado_actual' =>
            'cliente:' . $data['fk_cliente'] . "\n" .
                'estado:' . $data['fk_estado'] . "\n" .
                'area:' . $data['fk_area'] . "\n" .
                'usuario:' . $infRep[0]['usuario'] . "\n" .
                'codigo:' . $data['codigo'] . "\n" .
                'descripcion:' . $data['descripcion'] . "\n" .
                'fecha:' . $data['fecha'] . "\n" .
                'fecha_asignado:' . $infRep[0]['fecha_asignado'] . "\n" .
                'fecha_cancelado:' . $infRep[0]['fecha_cancelado'] . "\n" .
                'fecha_terminado:' . $infRep[0]['fecha_terminado'],

        ]);

        if ($update != false) {
            $data = $model->where('id_reporte', $id)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }
    }

    public function cancelar()
    {
        helper(['form', 'url']);
        $model = new ReportesModel();
        $log = new LoginModel();
        $id = $this->request->getVar('id_reporte');
        $form = $model->where('id_reporte', $id)->first();

        $codigo = $model->ultimo_codigo();

        $data = [
            'fk_cliente' => $form['fk_cliente'],
            'fk_estado' =>  6,
            'fk_area'  =>  $form['fk_area'],
            'fecha' =>  $form['fecha'],
            'codigo'  =>  $form['codigo'],
            'descripcion' => $this->request->getVar('descripcion'),
            'fecha_asignado'  =>  $form['fecha_asignado'],
            'fecha_cancelado'  =>  $this->request->getVar('fecha_canc'),
            'fecha_terminado'  =>  $form['fecha_terminado'],
        ];

        $infRep = $model->infRep($id);

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
            'evento' => 'Cancelar reporte',
            'estado_anterior' =>
            'cliente:' . $infRep[0]['fk_cliente'] . "\n" .
                'estado:' . $infRep[0]['fk_estado'] . "\n" .
                'area:' . $infRep[0]['fk_area'] . "\n" .
                'usuario:' . $infRep[0]['usuario'] . "\n" .
                'codigo:' . $infRep[0]['codigo'] . "\n" .
                'descripcion:' . $infRep[0]['descripcion'] . "\n" .
                'fecha:' . $infRep[0]['fecha'] . "\n" .
                'fecha_asignado:' . $infRep[0]['fecha_asignado'] . "\n" .
                'fecha_cancelado:' . $infRep[0]['fecha_cancelado'] . "\n" .
                'fecha_terminado:' . $infRep[0]['fecha_terminado'],

            'estado_actual' =>
            'cliente:' . $data['fk_cliente'] . "\n" .
                'estado:' . $data['fk_estado'] . "\n" .
                'area:' . $data['fk_area'] . "\n" .
                'usuario:' . $infRep[0]['usuario'] . "\n" .
                'codigo:' . $data['codigo'] . "\n" .
                'descripcion:' . $data['descripcion'] . "\n" .
                'fecha:' . $data['fecha'] . "\n" .
                'fecha_asignado:' . $infRep[0]['fecha_asignado'] . "\n" .
                'fecha_cancelado:' . $data['fecha_cancelado'] . "\n" .
                'fecha_terminado:' . $infRep[0]['fecha_terminado'],

        ]);

        return redirect()->to('Reportes/index');
    }

    // TODO:
    //      Agregar a la bitacora
    public function asig_tecnico()
    {
        helper(['form', 'url']);
        $model = new ReportesTecModel();
        $rep = new ReportesModel();
        $log = new LoginModel();

        $miArray = $this->request->getVar('tecnico[]');

        foreach ($miArray as $key => $value) {
            $data = [
                'fk_reporte' => $this->request->getVar('id_reporte'),
                'fk_tecnico' => $value,
            ];
            $save = $model->asig_tec($data);
        }

        $id = $this->request->getVar('id_reporte');
        $infRep = $rep->infRep($id);

        $data = [
            'fk_cliente' => $infRep[0]['fk_cliente'],
            'fk_estado' => 2,
            'fk_area' => $infRep[0]['fk_area'],
            'usuario' => $infRep[0]['usuario'],
            'fecha' => $infRep[0]['fecha'],
            'codigo' => $infRep[0]['codigo'],
            'descripcion' => $infRep[0]['descripcion'],
            'fecha_asig' => $this->request->getVar('fecha_asig'),
            'fecha_cancelado' => $infRep[0]['fecha_cancelado'],
            'fecha_terminado' => $infRep[0]['fecha_terminado'],
        ];

        $update = $rep->update($id, $data);
        $update = $model->update($id, $data);

        if ($update != false) {
            $data = $rep->where('id_reporte', $id)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }

        return redirect()->to('Reportes/index');
    }

    // FIXME:
    //      Funcion incompleta .
    //      Esta comiendo mierda el metodo.
    public function cerrar()
    {
        $model = new ReportesModel();
        $log = new LoginModel();

        $id = $this->request->getVar('id_reporte');
        $form = $model->where('id_reporte', $id)->first();

        $codigo = $model->ultimo_codigo();

        $data = [
            'fk_cliente' => $form['fk_cliente'],
            'fk_estado' =>  8,
            'fk_area'  =>  $form['fk_area'],
            'fecha' =>  $form['fecha'],
            'codigo'  =>  $form['codigo'],
            'descripcion' => $this->request->getVar('descripcion'),
            'fecha_asignado'  =>  $form['fecha_asignado'],
            'fecha_cancelado'  =>  $form['fecha_cancelado'],
            'fecha_terminado'  =>  $this->request->getVar('fecha_cierre'),
        ];

        $infRep = $model->infRep($id);

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
            'evento' => 'Cancelar reporte',
            'estado_anterior' =>
            'cliente:' . $infRep[0]['fk_cliente'] . "\n" .
                'estado:' . $infRep[0]['fk_estado'] . "\n" .
                'area:' . $infRep[0]['fk_area'] . "\n" .
                'usuario:' . $infRep[0]['usuario'] . "\n" .
                'codigo:' . $infRep[0]['codigo'] . "\n" .
                'descripcion:' . $infRep[0]['descripcion'] . "\n" .
                'fecha:' . $infRep[0]['fecha'] . "\n" .
                'fecha_asignado:' . $infRep[0]['fecha_asignado'] . "\n" .
                'fecha_cancelado:' . $infRep[0]['fecha_cancelado'] . "\n" .
                'fecha_terminado:' . $infRep[0]['fecha_terminado'],

            'estado_actual' =>
            'cliente:' . $data['fk_cliente'] . "\n" .
                'estado:' . $data['fk_estado'] . "\n" .
                'area:' . $data['fk_area'] . "\n" .
                'usuario:' . $infRep[0]['usuario'] . "\n" .
                'codigo:' . $data['codigo'] . "\n" .
                'descripcion:' . $data['descripcion'] . "\n" .
                'fecha:' . $data['fecha'] . "\n" .
                'fecha_asignado:' . $infRep[0]['fecha_asignado'] . "\n" .
                'fecha_cancelado:' . $infRep[0]['fecha_cancelado'] . "\n" .
                'fecha_terminado:' . $data['fecha_terminado'],

        ]);

        return redirect()->to('Reportes/index');
    }
}
