<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdentrabajoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ordentrabajos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordentrabajo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ordentrabajo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nro',
            'id_supervisor',
            'id_inmueble',
            'id_tarea',
            //'fecinicio',
            //'descripcion',
            //'archivo',
            //'id_ordendetalle',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
