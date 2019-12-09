<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\BackLoginForm;

class BacksiteController extends Controller
{
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
              //  'backColor' => 0x000000,//背景颜色
                'maxLength' => 6, //最大显示个数
                'minLength' => 5,//最少显示个数
                'padding' => 5,//间距
                'height' => 40,//高度
                'width' => 130,  //宽度
                'foreColor' => 000000,     //字体颜色
                'offset' => 4,        //设置字符偏移量 有效果
                //'controller'=>'login',        //拥有这个动作的controller
            ],
        ];
    }

    public function actionLogin()
    {
        $this->layout = "main-login";
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