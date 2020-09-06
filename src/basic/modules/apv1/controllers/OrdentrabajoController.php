<?php

namespace app\modules\apv1\controllers;


use app\modules\apv1\models\OrdentrabajoSearch;

use Yii;
use yii\rest\ActiveController;

/**
 * Default controller for the `apv1` module
 */
class OrdentrabajoController extends ActiveController
{


    public $modelClass ="app\modules\apv1\models\Ordentrabajo";

    public function actions()
    {
        //if (Yii::$app->user->isGuest) {
      //      $this->redirect('../index.php');
      //  }

        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
//        $actions['index']['dataFilter'] = ['class'=>ActiveDataFilter::class,'searchModel' => Post::class];
        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new OrdentrabajoSearch();
        $dataProvider =  $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider;
    }

}
