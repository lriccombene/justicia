<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ordendetalle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ordendetalle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_tipoestado')->textInput() ?>

    <?= $form->field($model, 'id_usuario')->textInput() ?>

    <?= $form->field($model, 'fecinicio')->textInput() ?>

    <?= $form->field($model, 'fecfinal')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
