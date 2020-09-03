<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ordentrabajo */

$this->title = 'Update Ordentrabajo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ordentrabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ordentrabajo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
