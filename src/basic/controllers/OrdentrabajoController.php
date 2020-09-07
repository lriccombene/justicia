<?php

namespace app\controllers;

use Yii;
use app\models\Ordentrabajo;
use app\models\OrdentrabajoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * OrdentrabajoController implements the CRUD actions for Ordentrabajo model.
 */
class OrdentrabajoController extends Controller
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
                         'roles' => ['admin', 'supervisor'], //El Rol admin y administrativo pueden acceder a todas las acciones
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
     * Lists all Ordentrabajo models.
     * @return mixed
     */
     public function actionIndex()
     {

         if (Yii::$app->user->isGuest) {
              return $this->goHome();
          }

          $model = new Ordentrabajo();

          return $this->render('index',[
              'model'=>$model,
          ]);


     }

    /**
     * Displays a single Ordentrabajo model.
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
    public function actionArchivo($id)
    {
      $model = $this->findModel($id);
      if ($model->load(Yii::$app->request->post())) {
            $model->archivo = UploadedFile::getInstance($model, 'archivo');
            //var_dump(  $model->archivo);
          }
      if ($model->archivo) {
        $a=Yii::getAlias('@app');

        $ruta=$a.'/web/ordentrabajo/'. $model->archivo->baseName . '.' . $model->archivo->extension;
        $model->archivo->saveAs($ruta);
        $model->archivo='/ordentrabajo/'. $model->archivo->baseName . '.' . $model->archivo->extension;
        //var_dump($model->archivo);
          if ( $model->save()) {
          //  var_dump($model);
              return $this->redirect(['view', 'id' => $model->id]);
          }

        }

      return $this->render('archivo', [
          'model' => $model,
      ]);
    }








    /**
     * Creates a new Ordentrabajo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      $model = new Ordentrabajo();

       if ($model->load(Yii::$app->request->post()) && $model->save()) {


           return $this->redirect(['view', 'id' => $model->id]);
       }
       $hoy = date("Y");
       $nro ='-'.$hoy;

       $max = Ordentrabajo::find()
          ->where(['like', 'nro',  '%'.$nro  , false])
              ->select('id')->max('id');
        if($max<>NULL){
           $obj = $this->findModel($max);
           $array = str_split($obj->nro, 6);
           $ultimoanio=substr($array[1],1);;

               $siguientenro=$array[0] + 1 ;
               $largo=strlen($siguientenro);

               $primeraparte='';
               for ($i = 1; $i <= (6-$largo); $i++) {
                 $primeraparte='0'. $primeraparte;
               }
               $model->nro =$primeraparte.$siguientenro.'-'.$hoy;

        }else{
           $model->nro ='000001'.$nro;
        }
        //$array[0] + 1 ;

       return $this->render('create', [
           'model' => $model,
       ]);
    }

    /**
     * Updates an existing Ordentrabajo model.
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
     * Deletes an existing Ordentrabajo model.
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
     * Finds the Ordentrabajo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ordentrabajo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ordentrabajo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
