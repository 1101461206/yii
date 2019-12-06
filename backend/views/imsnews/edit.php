<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Imsnews */

$this->title = 'Update Imsnews: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Imsnews', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="imsnews-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
