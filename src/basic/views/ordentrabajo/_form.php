<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ordentrabajo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ordentrabajo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_supervisor')->textInput() ?>

    <?= $form->field($model, 'id_inmueble')->textInput() ?>

    <?= $form->field($model, 'id_tarea')->textInput() ?>

    <?= $form->field($model, 'fecinicio')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'archivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_ordendetalle')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
