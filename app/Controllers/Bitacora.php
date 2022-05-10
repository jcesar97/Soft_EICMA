<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BitacoraModel;
use PhpParser\Node\Expr\AssignOp\Concat;
use function PHPUnit\Framework\isEmpty;

class Bitacora extends BaseController
{
    public function index()
    {
        $model = new BitacoraModel();

        $data['bitac'] = $model->get_bitac();

        if (session('fk_id_rol') != 1) {
            return redirect()->to(base_url('/Login'));
        }

        return view('Trazas/trazas_view', $data);
    }
}
