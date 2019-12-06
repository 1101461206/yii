<?php

namespace common\widgets;

use Yii;
use yii\base\Component;
use yii\base\Widget;
use yii\helpers\Html;
use common\models\Awesome;

class Awsome extends Widget
{
    public $name;
    public function init()
    {
        parent::init();
        if ($this->name === null) {

        }

    }

    public function run()
    {
        parent::run();
        $list=$this->awsome_list();
       // var_dump($this->name);
        return $this->render('awsome',['list'=>$list]);
       // return Html::encode($this->message);
    }

    public function awsome_list(){
        $model= new Awesome();
        $list=$model::find()->select(['name'])->asArray()->all();
        return $list;
    }


}