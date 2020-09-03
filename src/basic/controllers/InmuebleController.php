<?php

namespace app\controllers;

use Yii;
use app\models\Inmueble;
use app\models\InmuebleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * InmuebleController implements the CRUD actions for Inmueble model.
 */
class InmuebleController extends Controller
{
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
                      'roles' => ['admin', 'administrativo'], //El Rol admin y administrativo pueden acceder a todas las acciones
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
  * Lists all Tarea models.
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

      $model = new Inmueble();
      return $this->render('index',[
          'model'=>$model,
      ]);


 }

    /**
     * Displays a single Inmueble model.
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
     * Creates a new Inmueble model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inmueble();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Inmueble model.
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
     * Deletes an existing Inmueble model.
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
     * Finds the Inmueble model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inmueble the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inmueble::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
