<?php
namespace backend\controllers;

use Yii;
use yii\web\controller;

class RbacController extends Controller
{
    public function actionInit(){
        //添加的authManager组件，
        $auth= Yii::$app->authManager;
        //添加权限
        $userbancke=$auth->createPermission('/user-backend/index');
        $userbancke->description='管理员列表';
        $auth->add($userbancke);

        //创建一个角色并分配权限
        $userbanckerole=$auth->createRole('普通管理员');
        $auth->add($userbanckerole);
        $auth->addChild($userbanckerole,$userbancke);
        //指定用户
        $auth->assign($userbanckerole,21);

    }
}