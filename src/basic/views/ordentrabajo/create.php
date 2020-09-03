<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ordentrabajo */

$this->title = 'Create Ordentrabajo';
$this->params['breadcrumbs'][] = ['label' => 'Ordentrabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordentrabajo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
