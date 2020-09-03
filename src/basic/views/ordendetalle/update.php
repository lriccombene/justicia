<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ordendetalle */

$this->title = 'Update Ordendetalle: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ordendetalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ordendetalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
