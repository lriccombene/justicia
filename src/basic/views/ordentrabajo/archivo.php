<?php
Yii::$app->params['boostrap']=4;
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

    <h1>Orden de Trabajo <?php  echo $model->nro;  ?></h1>
<div class="form-group">
    <?php $form = ActiveForm::begin(); ?>

      <?= $form->field($model, 'archivo')->fileInput() ?>
</div>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
