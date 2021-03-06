<?php

namespace app\controllers;

use Yii;
use app\models\Tipoestado;
use app\models\TipoestadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TipoestadoController implements the CRUD actions for Tipoestado model.
 */
class TipoestadoController extends Controller
{
    /**
     * {@inheritdoc}
     */
     public function behaviors()
     {
         return [
             'verbs' => [
                 'class' => VerbFilter::className(),
                 'actions' => [
                     'delete' => ['POST'],
                 ],
             ],
             'access' => [ //Definir el filtro de acceso
                 'class' => AccessControl::className(),
                 'rules' => [ //Definir politicas de acceso
                     [
                         'allow' => true,
                         'roles' => ['admin',  'supervisor'], //El Rol admin y administrativo pueden acceder a todas las acciones
                     ],
                     [
                         'allow' => true,
                         'actions' => ['index', 'view'], //Ministro solo puede acceder al index y view
                         'roles' => ['visitante'],
                     ],
                 ],
             ],
         ];
     }

    /**
     * Lists all Tipoestado models.
     * @return mixed
     */
     public function actionIndex()
     {
       /*  $searchModel = new TareaSearch();
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

         return $this->render('index', [
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
         ]);*/
         if (Yii::$app->user->isGuest) {
              return $this->goHome();
          }

          $model = new Tipoestado();
          return $this->render('index',[
              'model'=>$model,
          ]);


     }

    /**
     * Displays a single Tipoestado model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tipoestado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tipoestado();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tipoestado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tipoestado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tipoestado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tipoestado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tipoestado::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
