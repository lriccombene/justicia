<?php


use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Html;
$this->title = 'My Yii Application';
/* @var $this yii\web\View */
use app\models\Tipoestado;


?>
<div class="site-index">



    <div class="body-content">
      <?php
      //var_dump(Yii::$app->user->can('supervisor'));
            if(Yii::$app->user->can('supervisor')){
              include "indexsupervisor.php";
            }else{
              include "indexoperador.php";
            }

     ?>




    </div>
</div>
