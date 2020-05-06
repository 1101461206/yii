<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\imsArticleType */
/* @var $form yii\widgets\ActiveForm */
?>

<!--<div class="--><!---form">-->
<div class="box box-info">
    <div class="box-header with-border">
    </div>
    <div class="box-body">
        <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
        'fieldConfig' => [
        'options' => ['class' => 'form-group'],
        'template' => "{label}
        <div class='col-sm-4'>{input}</div>
        \n{error}",
        'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ],

        ]); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
        <div class='col-sm-2 control-label'></div>
        <button type="submit" class="btn btn-info">添加</button>    </div>

    <?php ActiveForm::end(); ?>

</div>
