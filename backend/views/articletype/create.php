<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\imsArticleType */

$this->title = '添加新闻类别';
$this->params['breadcrumbs'][] = ['label' => 'Ims Article Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ims-article-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
