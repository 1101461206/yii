<?php

namespace backend\controllers;

use common\models\User;
use Yii;
use backend\models\Userrole;
use backend\models\userroleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use backend\models\Userpermission;
use backend\models\UserPermissionRelation;

/**
 * UserroleController implements the CRUD actions for Userrole model.
 */
class CeshiController extends Controller
{
    public function actionImgdpi()
    {
        $filename = '/Applications/MAMP/htdocs/web/yii/backend/upload/201908/22/';
        $name='1566466863_timg.png';
        $file = file_get_contents($filename.$name);

//数据块长度为9
        $len = pack("N", 9);
//数据块类型标志为pHYs
        $sign = pack("A*", "pHYs");
//X方向和Y方向的分辨率均为300DPI（1像素/英寸=39.37像素/米），单位为米（0为未知，1为米）
        $data = pack("NNC", 300 * 39.37, 300 * 39.37, 0x1);
//CRC检验码由数据块符号和数据域计算得到
        $checksum = pack("N", crc32($sign . $data));
        $phys = $len . $sign . $data . $checksum;

        $pos = strpos($file, "pHYs");
        if ($pos > 0) {
            //修改pHYs数据块
            $file = substr_replace($file, $phys, $pos - 4, 21);
        } else {
            //IHDR结束位置（PNG头固定长度为8，IHDR固定长度为25）
            $pos = 33;
            //将pHYs数据块插入到IHDR之后
            $file = substr_replace($file, $phys, $pos, 0);
        }
//        file_put_contents($filename.'300_'.$name, $file);


        header("Content-type: image/jpeg");
        header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
        echo $file;

        exit;
    }


}
