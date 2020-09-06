<?php

namespace app\modules\apv1\controllers;


use app\modules\apv1\models\TipoestadoSearch;
use app\modules\apv1\models\Tipoestado;
use Yii;
use yii\rest\ActiveController;

/**
 * Default controller for the `apv1` module
 */
class TipoestadoController extends ActiveController
{


    public $modelClass ="app\modules\apv1\models\Tipoestado";

    public function actions()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect('../index.php');
        }

        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
//        $actions['index']['dataFilter'] = ['class'=>ActiveDataFilter::class,'searchModel' => Post::class];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new TipoestadoSearch();
        $dataProvider =  $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider;
    }

}
