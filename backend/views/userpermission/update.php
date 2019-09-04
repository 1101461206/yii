<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Userpermission */

$this->title = 'Update User Permission: ' . $model->permission_id;
$this->params['breadcrumbs'][] = ['label' => 'User Permissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->permission_id, 'url' => ['view', 'id' => $model->permission_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-permission-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
