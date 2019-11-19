<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Userpermission */

$this->title = '修改权限';
$this->params['breadcrumbs'][] = ['label' => '权限列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-permission-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'fid'=>$fid,
        'pid'=>$pid,
    ]) ?>

</div>
