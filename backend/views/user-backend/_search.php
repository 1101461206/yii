<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model UserBackend\models\UserBackendSerach */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="user-backend-search">
    <!-- Horizontal Form -->
    <div class="box box-solid">
        <div class="box-header with-border">
            <h5 class="box-title">筛选</h5>
            <!--                    <div class="box-tools pull-right">-->
            <!--                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
            <!--                    </div>-->
        </div>
        <!-- /.box-header -->
        <!-- form start -->

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
            <?= $form->field($searchModel, 'username') ?>

            <?php echo $form->field($searchModel, 'nickname') ?>

            <?php echo $form->field($searchModel, 'status')->dropDownList(['' => '请选择', '1' => '开启', '0' => '关闭']) ?>

            <?= $form->field($searchModel, 'role')->dropdownList(\yii\helpers\ArrayHelper::map($role_name, 'roleid', 'role_name'), ['' => '请选择']) ?>

            <div class="form-group col-sm-1">
                <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>
