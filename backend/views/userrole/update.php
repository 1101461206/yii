<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Userrole */

$this->title = 'Update Userrole: ' . $model->roleid;
$this->params['breadcrumbs'][] = ['label' => 'Userroles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->roleid, 'url' => ['view', 'id' => $model->roleid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="userrole-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
