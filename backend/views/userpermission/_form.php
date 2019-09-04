<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Userpermission */
/* @var $form yii\widgets\ActiveForm */
?>

<!--<div class="--><!---form">-->
<div class="userrole-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
        'fieldConfig' => [
            'options' => ['class' => 'form-group'],
            'template' => "{label}<div class='col-sm-4'>{input}</div>\n{error}",
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ],

    ]); ?>

    <?= $form->field($model, 'permission_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'permission_route')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pid')->textInput() ?>

    <?= $form->field($model, 'aort')->textInput() ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update')->textInput() ?>

    <?= $form->field($model, 'is_delete')->textInput() ?>

    <div class="box-footer">
        <div class='col-sm-2 control-label'></div>
        <button type="submit" class="btn btn-info">添加</button>    </div>

    <?php ActiveForm::end(); ?>

</div>
