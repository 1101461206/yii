<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\imsIndexImgSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="img-index-img-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'img') ?>

    <?= $form->field($model, 'img_text') ?>

    <?= $form->field($model, 'img_content') ?>

    <?= $form->field($model, 'img_type') ?>

    <?php // echo $form->field($model, 'img_fa') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'link') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
