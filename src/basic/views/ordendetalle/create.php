<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ordendetalle */

$this->title = 'Create Ordendetalle';
$this->params['breadcrumbs'][] = ['label' => 'Ordendetalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordendetalle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
