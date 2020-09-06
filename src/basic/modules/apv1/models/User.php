<?php
use Yii;
namespace app\modules\apv1\models;

class User extends \app\models\User
{
    public function fields (){

        return ['id', 'username'];

    }
}
