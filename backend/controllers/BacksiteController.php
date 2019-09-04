<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\BackLoginForm;

class BacksiteController extends Controller
{
    public function actionLogin()
    {
        $this->layout="main-login";
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new BackLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['user-backend/index']);
        } else {
            $model->password_hash = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        }

    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->actionLogin();
    }


}