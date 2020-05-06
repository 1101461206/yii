<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ImsShopGoods */

$this->title = 'Create Ims Shop Goods';
$this->params['breadcrumbs'][] = ['label' => 'Ims Shop Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ims-shop-goods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
