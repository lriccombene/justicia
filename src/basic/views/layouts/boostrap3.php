<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
//use app\models\Usuario;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div> <?php
    $banderita=false;
    if(Yii::$app->user->isGuest ){}
    else{
        if(Yii::$app->user->identity->username === "admin")
        {
            $banderita=true;
        }
    }

    ?></div>

<div class="wrap">
    <?php



    NavBar::begin([
        'brandLabel' => "Sistema Justicia 2020",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            //  ['label' => 'Tarea', 'url' => ['/tarea/index'],'visible'=>!Yii::$app->can('supervisor')],
               ['label' => 'Tarea', 'url' => ['/tarea/index'], 'visible' => Yii::$app->user->can('supervisor')],
            ['label' => 'Inmueble', 'url' => ['/inmueble/index'],'visible' => Yii::$app->user->can('supervisor')],
            ['label' => 'Tipo Estado', 'url' => ['/tipoestado/index'],'visible' => Yii::$app->user->can('supervisor')],
            ['label' => 'Orden Trabajo', 'url' => ['/ordentrabajo/index'], 'visible' => Yii::$app->user->can('supervisor')],
            ['label' => 'Orden Detalle', 'url' => ['/ordendetalle/index'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Usuarios', 'url' => ['/user/admin'], 'visible' => $banderita],
            ['label' => 'Mi Perfil', 'url' => ['/user/settings/account'], 'visible' => !Yii::$app->user->isGuest],

            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/user/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; JUSTICIA  <?= date('Y') ?></p>


    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
