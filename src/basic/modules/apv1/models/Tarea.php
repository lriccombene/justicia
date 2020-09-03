<?php
use Yii;
namespace app\modules\apv1\models;

class Tarea extends \app\models\Tarea
{
    public function fields (){

        return ['id', 'nombre','descripcion'];

    }
}
