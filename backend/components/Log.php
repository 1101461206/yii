<?php

namespace backend\components;

use backend\models\UserPermissionRelation;
use common\models\User;
use Yii;
use backend\models\LogForm;
/**
 * 日志操作
 * @user 操作人
 * @info 操作内容
 * @time 操作时间
 * @IP   操作IP地址
 * @status 0-失败 1-成功
 *
 */
class Log
{
   function ins($type,$content,$status){
        $model=new LogForm();
        $model->ip=$_SERVER['REMOTE_ADDR'];
        $model->user=Yii::$app->user->identity->username;
        $model->creatime=time();
        $model->type=$type;
        $model->content=$content;
        $model->status=$status;
        $model->save();
   }


}