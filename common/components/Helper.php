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
     * @name  文件名字
     * @path  图片路径
     * @type  命名类型，0-按日期自动命名 1-保持原文件名不变
     * @img_name  图片名称
     * @code  1-更新成功，上传成功 2-更新失败
     *
     */
    public static function update_img($model, $name, $path,$type=0)
    {
        $file = UploadedFile::getInstance($model, $name);
        $time_y = date("Ym", time());
        $time_d = date('d', time());
        if($type==0){
            $path = $path . "/" . $time_y . "/" . $time_d . "/";
        }elseif ($type==1){
            $path=$path."/";
        }

        $data = "";
        if ($file) {
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            if($type==0){
                $img_name = time() . "_" . $file->baseName . "." . $file->extension;
            }elseif ($type==1){
                $img_name=$file->name;
            }

            $info = $file->saveAs($path . $img_name);
            $data = "";
            if ($info) {
                $data['code'] = 1;
                if($type==0){
                    $data['img_url'] = $time_y . "/" . $time_d . "/" . $img_name;
                }elseif($type==1){
                    $data['img_url'] = $img_name;
                }
            } else {
                $data['code'] = 2;
            }
        } else {
            //检测是否更新图片
            if (!empty($model->$name)) {
                $data['code'] = 1;
                $data['img_url'] = $model->$name;
            } else {
                $data['code'] = 2;
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