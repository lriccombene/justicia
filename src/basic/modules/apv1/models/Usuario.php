<?php

namespace app\modules\apv1\models;

class Usuario extends \app\models\Usuario
{
    public function fields (){
        return ['id', 'name','username',"authKey", "password","accessToken"];
    }
}