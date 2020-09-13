<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Ordentrabajo;
use app\models\Ordendetalle;
use app\models\OrdentrabajoSearch;
use app\models\Responsable;

use yii\data\ActiveDataProvider;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
      $searchModel='';
       $dataProvider='';
       $model='';

      if (!Yii::$app->user->isGuest) {

             $id =Yii::$app->user->identity->id;

            $model = Ordentrabajo::find()
                    ->leftJoin( 'ordendetalle', ' ordentrabajo.id= ordendetalle.id_ordentrabajo' )
                     ->innerJoin( 'responsable', 'ordentrabajo.id= responsable.id_ordentrabajo' )
                     //->leftJoin( 'public.user', 'responsable.id_usuario= public.user.id' )
                     //->innerJoin( 'tipoestado', 'ordendetalle.id_tipoestado= tipoestado.id' )
                     //->where(['responsable.id_usuario' => $id])
                    ->orderBy(['ordentrabajo.fecinicio' => SORT_ASC])
                     ->all();
                  //   var_dump($model);

        /*    $model = Ordendetalle::find()
                             ->innerJoin( 'ordentrabajo', ' ordentrabajo.id= ordendetalle.id_ordentrabajo' )
                            // ->innerJoin( 'responsable', 'ordentrabajo.id= responsable.id_ordentrabajo' )
                            // ->innerJoin( 'tipoestado', 'ordendetalle.id_tipoestado= tipoestado.id' )
                            // ->where(['responsable.id_usuario' => $id])
                            // ->orderBy(['ordentrabajo.fecinicio' => SORT_ASC])
                             ->all();
*/
              /*       $query = Ordentrabajo::find()
                             ->leftJoin( 'responsable', 'ordentrabajo.id= responsable.id_ordentrabajo' )
                             ->where(['responsable.id_usuario' => $id])
                             ->all();
                     $dataProvider = new ActiveDataProvider([
                               'query' => $query,
                             ]);
*/
                     $searchModel = new OrdentrabajoSearch();
                      $dataProvider = $searchModel->search2(Yii::$app->request->queryParams,$id);
  //var_dump($model);

                           return $this->render('index', [
                                        'model' => $model, 'searchModel' => $searchModel,
                         'dataProvider' => $dataProvider,
                                    ]);
      }else{
        return  $this->redirect(array('/user/login'));
      }

    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
