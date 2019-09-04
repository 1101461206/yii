<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;


/* @var $this yii\web\View */
/* @var $model backend\models\Adminuser */

$this->title = '修改管理员';
$this->params['breadcrumbs'][] = ['label' => '管理员列表', 'url' => ['user-backend/index']];

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
echo $this->render('user_form', [
    'model' => $model,
    'role_name' => $role_name,
])

?>




