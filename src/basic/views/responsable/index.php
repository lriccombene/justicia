<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResponsableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Responsables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsable-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Responsable', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_ordentrabrajo',
            'id_usuario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
