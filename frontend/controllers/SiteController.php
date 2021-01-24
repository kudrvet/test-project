<?php
namespace frontend\controllers;

use common\models\UserForm;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $userForm = new UserForm();

        if ($userForm->load(Yii::$app->request->post()) && $userForm->save()) {
            Yii::$app->session->setFlash('success', 'Data is saved');
            return $this->refresh();
        }
            $errors = $userForm->getFirstErrors();
            return $this->render('index', ['userForm' => $userForm,'errors' => $errors]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionNews()
    {
        return $this->render('news');
    }

    public function actionServices()
    {
        return $this->render('services');
    }
}
