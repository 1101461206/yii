<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;


/**
 * 全局异常处理器
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        //$this->layout=false;

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


//    public function actionError()
//    {
//        $exception = Yii::$app->errorHandler->exception;
//        if ($exception !== null) {
//            return $this->render('error', ['exception' => $exception]);
//        }
//    }

}
