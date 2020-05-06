<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\imsArticleType */

$this->title = 'Update Ims Article Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ims Article Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->tid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ims-article-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
