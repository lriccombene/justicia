<?php
use Yii;
namespace app\modules\apv1\models;

class Inmueble extends \app\models\Inmueble
{
    public function fields (){

        return ['id', 'nombre','descripcion'];

    }
}
