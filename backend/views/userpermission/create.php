<?php

use backend\models\Userrole;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Userrole */

$this->title = '添加权限';
$this->params['breadcrumbs'][] = ['label' => '权限列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userrole-create">

    <?= $this->render('_form', [
        'model' => $model,
        'fid'=>$fid,
        'pid'=>$pid,

    ]) ?>

</div>
