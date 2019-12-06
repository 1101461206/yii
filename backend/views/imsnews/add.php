<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Imsnews */

$this->title = '添加文章';
$this->params['breadcrumbs'][] = ['label' => '文章列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imsnews-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
