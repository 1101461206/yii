<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = '宣传文字';
$this->params['breadcrumbs'][] = '首页设置';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="imsindex-index">
    <!-- Horizontal Form -->
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
            <?= $form->field($model, 'disseminate_top')->textInput() ?>
            <?= $form->field($model, 'disseminate_down')->textInput() ?>
        </div>
        <div class="box-footer">
            <div class='col-sm-2 control-label'></div>
            <?= Html::submitButton('添加', ['class' => 'btn btn-info']) ?>
        </div>


        <?php ActiveForm::end(); ?>


    </div>
    <!-- /.box -->
</div>
