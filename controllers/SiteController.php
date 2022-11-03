<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\ArrayDataProvider;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\helpers\Html;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
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
        $data=[
            ['id'=>1,'name'=>'name1'],
            ['id'=>2,'name'=>'name2'],
            ['id'=>3,'name'=>'name3'],
            ['id'=>4,'name'=>'name4'],
            ['id'=>5,'name'=>'name5'],
            ['id'=>6,'name'=>'name6'],
            ['id'=>7,'name'=>'name7'],
            ['id'=>8,'name'=>'name8'],
            ['id'=>9,'name'=>'name9'],
            ['id'=>10,'name'=>'name10'],
            ['id'=>11,'name'=>'name11'],
            ['id'=>12,'name'=>'name12'],
            ['id'=>13,'name'=>'name13'],
        ];
        $provider=new ArrayDataProvider([
            'allModels'=>$data,
            'pagination'=>[
                'pagesize'=>5,
            ],
            
        ]);
        $gridColumns = [
            ['class' => 'kartik\grid\SerialColumn'],
            'id',
            'name',
        ];
        $fullExportMenu = ExportMenu::widget([
            'dataProvider' => $provider,
            'columns' => $gridColumns,
            'target' => ExportMenu::TARGET_BLANK,
            'pjaxContainerId' => 'kv-pjax-container',
            'exportContainer' => [
                'class' => 'btn-group mr-2 me-2'
            ],
            'dropdownOptions' => [
                'label' => 'Full',
                'class' => 'btn btn-outline-secondary btn-default',
                'itemsBefore' => [
                    '<div class="dropdown-header">Export All Data</div>',
                ],
            ],
        ]);
        return $this->render('index',['provider1' => $provider,
    'fullExportMenu' =>$fullExportMenu ]);
    //return $this->render('index',['provider1'=>$provider]);
    }
 public function actionuser()
    {
         $this -> layout-'/print';
         
    return $this->render('/user/_print',[
        'searchModel' => $searchModel,
    ]);
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
