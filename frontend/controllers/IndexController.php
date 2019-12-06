<?php

namespace frontend\controllers;

use backend\models\ImgIndexImg;
use backend\models\ImsIndex;
use backend\models\ImsCircular;

class IndexController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model=new ImsIndex();
        $info=$model::find()->where(['id'=>1])->one();
        $img_model=new ImgIndexImg();
        $img=$img_model::find()->where(['status'=>1])->asArray()->all();
        $circular_img=new ImsCircular();
        $circular=$circular_img::find()->all();

        return $this->render('index',[
            'info'=>$info,
            'img'=>$img,
            'circular'=>$circular,
        ]);
    }

}
