<?php

namespace backend\models;

use Yii;
use ReflectionClass;
use Reflection;
use backend\controllers\UserroleController;
/**
 * userroleSearch represents the model behind the search form of `backend\models\Userrole`.
 */
class Pbac extends \yii\db\ActiveRecord
{
//    public function __construct($class)
//    {
//        $class= $this->class;
//    }

    public function parseRequest(){
        $path=Yii::getAlias('@backend')."/controllers";
       //var_dump($path);
       // var_dump(scandir($path));
//        new UserroleController();
//        var_dump(new ReflectionClass($path.'/UserroleController.php'));
//        exit;


    }
}
