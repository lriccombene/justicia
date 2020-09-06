<?php
use Yii;
namespace app\modules\apv1\models;

class Tipoestado extends \app\models\Tipoestado
{
    public function fields (){

        return ['id', 'nombre','descripcion'];

    }
}
