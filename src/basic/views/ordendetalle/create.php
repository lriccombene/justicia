<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ordendetalle */

$this->title = 'Crear Detalle de orden';
$this->params['breadcrumbs'][] = ['label' => 'Orden detalle', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordendetalle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
