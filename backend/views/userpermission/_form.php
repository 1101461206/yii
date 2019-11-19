<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use backend\models\Userrole;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\Userrole */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-info">
    <div class="box-header with-border">
        <p style="color: red;">备注：顶级菜单和二级菜单都为空时，该权限为顶级菜单。顶级菜单不为空二级菜单为空时，为二级菜单。</p>
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

        <?= $form->field($model, 'permission_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'pid')->dropdownList(\yii\helpers\ArrayHelper::map($pid, 'permission_id', 'permission_name'),['prompt'=>'请选择','style'=>'width:200px'])->label('顶级菜单') ?>
        <?= $form->field($model, 'fid')->dropdownList(\yii\helpers\ArrayHelper::map($fid, 'permission_id', 'permission_name'),['prompt'=>'请选择','style'=>'width:200px'])->label('二级菜单') ?>
        <?= $form->field($model, 'permission_route')->textInput(['maxlength' => true]) ?>

        <!--        --><?//= $form->field($model, 'is_delete')->radioList([0=>"开启",1=>"关闭"],['style'=>'padding-top:7px;']) ?>




    </div>
    <div class="box-footer">
        <div class='col-sm-2 control-label'></div>
        <button type="submit" class="btn btn-info">添加</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>


