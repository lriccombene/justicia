<?php
use Yii;
namespace app\modules\apv1\models;

class Responsable extends \app\models\Responsable
{
    public function fields (){

        return ['id','usuario','ordentrabajo'];

    }
}
