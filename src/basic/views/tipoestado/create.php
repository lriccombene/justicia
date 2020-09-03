<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipoestado */

$this->title = 'Create Tipoestado';
$this->params['breadcrumbs'][] = ['label' => 'Tipoestados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoestado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
