<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>

<?= Html::cssFile('@web/vendor/dropify/css/dropify.css') ?>
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
        <?= $form->field($model, 'article_title')->textInput() ?>
        <?= $form->field($model, 'article_category')->dropdownList(\yii\helpers\ArrayHelper::map($type, 'tid', 'name'),['prompt'=>"请选择"]) ?>
        <?= $form->field($model, 'article_likenum_v')->textInput() ?>
        <?= $form->field($model, 'article_readnum_v')->textInput() ?>

        <!--        --><?//= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'recommendation')->radioList([0 => '不推送', 1 => '推送'], ['item' => function ($index, $label, $name, $checked, $value) {
            $checked = $checked ? "checked" : "";
            $return = '<label class="custom-control custom-radio col-md-3" >';
            $return .= ' <input type="radio" class="custom-control-input" name="' . $name . '" value="' . $value . '"' . $checked . '><span class="custom-control-label"> ' . $label . '</span> </label>';
            return $return;
        }, 'style' => ['padding' => '5px']
        ]) ?>

        <?= $form->field($model, 'top')->radioList([0 => '不置顶', 1 => '置顶'], ['item' => function ($index, $label, $name, $checked, $value) {
            $checked = $checked ? "checked" : "";
            $return = '<label class="custom-control custom-radio col-md-3" >';
            $return .= ' <input type="radio" class="custom-control-input" name="' . $name . '" value="' . $value . '"' . $checked . '><span class="custom-control-label"> ' . $label . '</span> </label>';
            return $return;
        }, 'style' => ['padding' => '5px']
        ]) ?>


        <?= $form->field($model, 'status')->radioList([0 => '关闭', 1 => '开启'], ['item' => function ($index, $label, $name, $checked, $value) {
            $checked = $checked ? "checked" : "";
            $return = '<label class="custom-control custom-radio col-md-3" >';
            $return .= ' <input type="radio" class="custom-control-input" name="' . $name . '" value="' . $value . '"' . $checked . '><span class="custom-control-label"> ' . $label . '</span> </label>';
            return $return;
        }, 'style' => ['padding' => '5px']
        ]) ?>

        <?= $form->field($model, 'article_content',['template'=>"{label}<div class='col-sm-9'>{input}</div>\n{error}"])->widget(\yii\redactor\widgets\Redactor::className(),[
                'clientOptions'=>[
                    'lang' => 'zh_cn',
                    'plugins' => ['clips', 'fontcolor','imagemanager'],
                     'minHeight'=> '300px'
                ],
        ]) ?>

    </div>
    <div class="box-footer">
        <div class='col-sm-2 control-label'></div>
        <?= Html::submitButton('提交', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

