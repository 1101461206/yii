<?php

namespace backend\components;

use Yii;
use yii\base\ActionFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class AccessControl extends ActionFilter
{
    /**
     *  对用户请求的路由进行验证
     * @return true 表示有权访问
     */
    public function beforeAction($action)
    {
        // 当前登录用户的id
        $user = Yii::$app->getUser();

        //$user->id=54;

        if ($user->getIsGuest()) {
            echo "<script>alert('请先登录');location.href='?r=backsite/login'</script>";
        }
        $user_role = $user->identity->role;
        // 当前路由
        $actionId = $action->getUniqueId();

        // 获取当前用户已经分配过的路由权限
        // 写的比较简单，有过基础的可自行完善，比如解决"*"的问题，看不懂的该行注释自行忽略
        $params = [':roleid' => $user_role, ':type' => 1];

        $role_info = Yii::$app->db->createCommand('select p.permission_id,p.permission_route from user_permission_relation r left join user_permission p on r.permission_id=p.permission_id where r.role_id=:roleid and p.type=:type')
            ->bindValues($params)
            ->queryAll();

        $role_info = ArrayHelper::map($role_info, 'permission_id', 'permission_route');
        //超级管理员
        if($user_role==="1"){
            return true;
        }
        //验证权限
        if (in_array($actionId, $role_info)) {
            return true;
        }else{
            throw new ForbiddenHttpException('没有权限!');
        }


//
//        $userId = $user->id;
//

    }


}