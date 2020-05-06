<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '重置密码';
$this->params['breadcrumbs'][] = ['label' => '管理员列表', 'url' => ['user-backend/index']];
?>
<div class="box box-info">
    <div class="box-header with-border">
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
        'fieldConfig' => [
            'options' => ['class' => 'form-group'],
            'template' => "{label}<div class='col-sm-4'>{input}</div>\n{error}",
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ],

    ]); ?>
    <div class="box-body">


        <?= $form->field($model, 'username')->textInput(['disabled'=>'']) ?>

        <?= $form->field($model, 'nickname')->textInput(['maxlength' => true,'disabled'=>'']) ?>

        <?php echo $form->field($model, 'password_hash')->passwordInput()->label('重置密码'); ?>

    </div>
    <div class="box-footer">
        <div class='col-sm-2 control-label'></div>
        <?= Html::submitButton('添加', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
