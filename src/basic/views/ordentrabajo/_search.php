<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdentrabajoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ordentrabajo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nro') ?>

    <?= $form->field($model, 'id_supervisor') ?>

    <?= $form->field($model, 'id_inmueble') ?>

    <?= $form->field($model, 'id_tarea') ?>

    <?php // echo $form->field($model, 'fecinicio') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'archivo') ?>

    <?php // echo $form->field($model, 'id_ordendetalle') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
