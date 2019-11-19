<?php

namespace common\components;

use Yii;
use yii\base\Component;
use yii\web\UploadedFile;
use app\models\UploadForm;


class Helper
{

    public static function checkMobile($mobile)
    {

        return $mobile;
    }

    /**
     * 图片上传--单图
     */
    public static function update_img($model, $name, $path)
    {
        $file = UploadedFile::getInstance($model, $name);
        $time_y = date("Ym", time());
        $time_d = date('d', time());
        $path = $path . "/" . $time_y . "/" . $time_d . "/";
        $data = "";
        if ($file) {
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img_name = time() . "_" . $file->baseName . "." . $file->extension;
            $info = $file->saveAs($path . $img_name);
            $data = "";
            if ($info) {
                $data['code'] = 1;
                $data['img_url'] = $time_y . "/" . $time_d . "/" . $img_name;
            } else {
                $data['code'] = 2;
            }
        } else {
            //检测是否更新图片
            if (!empty($model->$name)) {
                $data['code'] = 1;
                $data['img_url'] = $model->$name;
            } else {
                $data['code'] = 0;
            }
        }
        return $data;
    }

    /**
     * 返回值格式化
     */
    public function mages_format($code,$msg,$type="josn",$error=""){
        switch ($type){
            case "josn":
                $data=array(
                    'code'=>$code,
                    'msg'=>$msg,
                );
                if($error){
                    $data['error']=$error;
                }
            $data=json_encode($data);
                break;

            default:
                break;

        }


    }

}