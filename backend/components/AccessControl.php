<?php

namespace backend\components;

use vendor\project\StatusTest;
use Yii;
use yii\base\ActionFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class AccessControl extends ActionFilter
{
    /**
     *  对用户请求的路由进行验证
     * @return true 表示有权访问
     */
    public function beforeAction($action)
    {
        $file = dirname(dirname(dirname(__FILE__))) . "/a.php";
        // 当前登录用户的id
        $user = Yii::$app->getUser();
        $userId = $user->id;
        // 当前路由
        $actionId = $action->getUniqueId();

//        $text = fopen($file, "w") or die("dd");
//        fwrite($text, $actionId . "\n");
//        fclose($text);

        if (in_array($actionId, $this->ignoreList())) {
            return true;
        } else {
            //$user->id=54;
            if ($user->getIsGuest()) {
                Yii::$app->user->loginRequired();
                return true;
            }
            $user_role = $user->identity->role;
            // 获取当前用户已经分配过的路由权限
            // 写的比较简单，有过基础的可自行完善，比如解决"*"的问题，看不懂的该行注释自行忽略
            $params = [':roleid' => $user_role, ':type' => 1];
            $role_info = Yii::$app->db->createCommand('select p.permission_id,p.permission_route from user_permission_relation r left join user_permission p on r.permission_id=p.permission_id where r.role_id=:roleid and p.type=:type')
                ->bindValues($params)
                ->queryAll();
            $role_info = ArrayHelper::map($role_info, 'permission_id', 'permission_route');
            //超级管理员
//        var_dump($actionId);
//        exit;
            if ($user_role === "1") {
                return true;
            }
            if (in_array($actionId, $role_info)) {
                //验证权限
                return true;
            } else {
               // throw new ForbiddenHttpException('没有权限!');
                throw new NotFoundHttpException('没有权限！');
            }

        }

    }


    /**
     * 忽略列表
     */
    public function ignoreList()
    {
        return array(
            'backsite/login',
            'backsite/captcha',
            'debug/default/toolbar',
            'backsite/logout',
            'site/error',
        );
    }

}