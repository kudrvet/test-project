<?php
namespace backend\controllers;

use backend\models\UserFormSearch;
use common\models\User;
use common\models\UserForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\SignupForm;
use yii\helpers\VarDumper;
use yii\grid\GridView;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login','signup'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','forms','user-forms'],
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

    public function actionIndex()
    {
        $userForm = new UserForm();
        if ($userForm->load(Yii::$app->request->post())) {
            if ($userForm->save()) {
                Yii::$app->session->setFlash('success', 'Data is saved');
                return $this->refresh();
            }
        }
        else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('index', ['userForm' => $userForm]);
        }
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['login']);
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()){

            $user = new User();
            $user->username = $model->username;
            $user->email = $model->email;
            $user->setPassword($model->password);
            $user->generateAuthKey();
            $user->save();

            Yii::$app->session->setFlash('success', 'Thank you for registration');

            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionForms()
    {
        $searchModel = new UserFormSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());
        $formGridView = GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'options' => ['style' => 'table-layout:auto'],
                'columns' => [
                    [
                        'attribute' => 'id',
                        'contentOptions' => ['style' => 'width:0', 'white-space: nowrap']
                    ],
                    [
                        'attribute' => 'name',
                        'contentOptions' => ['style' => 'width:0', 'white-space: nowrap']
                    ],
                    [
                        'attribute' => 'surname',
                        'contentOptions' => ['style' => 'width:0', 'white-space: nowrap']
                    ],
                    [
                        'attribute' => 'email',
                        'contentOptions' => ['style' => 'width:15']
                    ],
                    [
                        'attribute' => 'phone',
                        'contentOptions' => ['style' => 'width:15%']
                    ],

                    [
                        'attribute' => 'text',
                        'headerOptions' => ['style' => 'width:30%'],
                    ],
                ]
            ]

        );
        return $this->render('forms',['view'=> $formGridView]);
    }
}
