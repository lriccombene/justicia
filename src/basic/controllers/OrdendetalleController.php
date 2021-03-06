<?php

namespace app\controllers;

use Yii;
use app\models\Ordendetalle;
use app\models\OrdendetalleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * OrdendetalleController implements the CRUD actions for Ordendetalle model.
 */
class OrdendetalleController extends Controller
{
    /**
     * {@inheritdoc}
     */
     public function behaviors()
     {
      // var_dump('holaaa');
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
                         'roles' => ['admin',  'supervisor','operario'], //El Rol admin y administrativo pueden acceder a todas las acciones
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
     * Lists all Ordendetalle models.
     * @return mixed
     */
    public function actionIndex()
    {
      if (Yii::$app->user->isGuest) {
           return $this->goHome();
       }

       $model = new Ordendetalle();

       return $this->render('index',[
           'model'=>$model,
       ]);

    }

    /**
     * Displays a single Ordendetalle model.
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
     * Creates a new Ordendetalle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ordendetalle();
        $model->id_usuario= $id =Yii::$app->user->identity->id;
      //  var_dump($model->id_usuario);

      $request = Yii::$app->request;
      $id_orden = $request->get('id_ordentrabajo');
      //var_dump($id_orden);
      if($id_orden<>NULL){
        $model->id_ordentrabajo=$id_orden;
      }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ordendetalle model.
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
     * Deletes an existing Ordendetalle model.
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
     * Finds the Ordendetalle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ordendetalle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ordendetalle::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
