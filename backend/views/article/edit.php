<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;


/* @var $this yii\web\View */
/* @var $model backend\models\Adminuser */

$this->title = '修改新闻';
$this->params['breadcrumbs'][] = ['label' => '管理员列表', 'url' => ['article/index']];

?>


<?php
if (Yii::$app->getSession()->hasFlash('error')) {
    echo Alert::widget([
        'options' => [
            'class' => 'alert-error',
        ],
        'body' => Yii::$app->getSession()->getFlash('error'),
    ]);
}
echo $this->render('form', [
    'model' => $model,
    'role_name' => $role_name,
])

?>




