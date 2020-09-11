<?php
use Yii;
namespace app\modules\apv1\models;

class Ordendetalle extends \app\models\Ordendetalle
{
    public function fields (){

        return ['id','tipoestado','usuario','fecinicio','fecfinal','observaciones','ordentrabajo'];

    }
}
