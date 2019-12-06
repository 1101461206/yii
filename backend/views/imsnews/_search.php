<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ImsnewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="user-backend-search">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h5 class="box-title">筛选</h5>
            <!--                    <div class="box-tools pull-right">-->
            <!--                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
            <!--                    </div>-->
        </div>


        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'form-horizontal'],
            'action' => ['index'],
            'method' => 'get',
            'fieldConfig' => [
                'options' => ['class' => 'col-lg-2'],
                'template' => "<div class='input-group'><span class='input-group-addon '>
                  {label}</span>{input}\n{error}</div>",
                'labelOptions' => ['class' => 'text-center','style'=>'margin:0px;'],
                'inputOptions' => ['class' => 'form-control']
            ],
        ]); ?>
        <div class="box-body ">
                <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'subheading') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'creattime') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'recommend') ?>

    <?php // echo $form->field($model, 'click') ?>

    <?php // echo $form->field($model, 'fabulous') ?>

            <div class="form-group col-sm-1">
                <?= Html::submitButton('搜索', ['class' => 'btn
                btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

