<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipoestado */

$this->title = 'Crear Tipo Estado';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoestado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
