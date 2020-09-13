<?php
use Yii;
namespace app\modules\apv1\models;

class Ordentrabajo extends \app\models\Ordentrabajo
{
    public function fields (){

        return ['id','nro','inmueble','tarea','fecinicio','horainicio','descripcion','supervisor','archivo'];

    }
}
