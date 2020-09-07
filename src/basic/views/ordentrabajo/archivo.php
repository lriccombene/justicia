<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Tiponormativa;
use app\models\Ordertrabajo;

/* @var $this yii\web\View */
/* @var $model app\models\Normativas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="normativas-form">

    <?php $form = ActiveForm::begin(); ?>

      <?= $form->field($model, 'archivo')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
