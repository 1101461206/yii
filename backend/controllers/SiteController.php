<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\BackLoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        $this->layout="main-login";

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

}
