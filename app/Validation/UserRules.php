<?php
namespace App\Validation;
use App\Models\UserModel;

class UserRules{
    public function validateUser(  array $datos_login)
    {
        $model = new UserModel();
        $user = $model->where('correo', $datos_login ['correo'])->first();

        if(!$user){
            return false;

        return password_verify($datos_login['pass'], $user['pass']);
        }
    }
}
