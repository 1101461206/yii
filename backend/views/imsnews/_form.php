<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Imsnews */
/* @var $form yii\widgets\ActiveForm */
?>

<!--<div class="--><!---form">-->
<div class="box box-info">
    <div class="box-header with-border">
    </div>
    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
        'fieldConfig' => [
            'options' => ['class' => 'form-group'],
            'template' => "{label}<div class='col-sm-4'>{input}</div>\n{error}",
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ],

    ]); ?>
    <div class="box-body">
<!--        --><?// //
//        $img = "";
//        if ($model['img']) {
//            $img = "/frontend/web/upload/" . $model['img'];
//        }
//        ?>
<!--        --><?//= $form->field($model, 'img', ['inputOptions' => ['class' => 'dropify', 'data-height' => '180', 'data-default-file' => $img]])->fileInput([
//                'options' => ['multiple' => false]
//            ]
//        )->label('轮循图：600*410')?>
<!--        --><?//= $form->field($model, 'img_text')->textInput() ?>
<!--        --><?//= $form->field($model, 'img_content')->textInput() ?>
<!--        --><?//= $form->field($model, 'status')->radioList([0 => '关闭', 1 => '开启'], ['item' => function ($index, $label, $name, $checked, $value) {
//            $checked = $checked ? "checked" : "";
//            $return = '<label class="custom-control custom-radio col-md-4" >';
//            $return .= ' <input type="radio" class="custom-control-input" name="' . $name . '" value="' . $value . '"' . $checked . '><span class="custom-control-label"> ' . $label . '</span> </label>';
//            return $return;
//        }, 'style' => ['padding' => '5px']
//        ]) ?>
<!---->
<!--        --><?//= $form->field($model, 'img_type')->radioList([1=> '放大图片', 2 => '跳转连接'], ['item' => function ($index, $label, $name, $checked, $value) {
//            $checked = $checked ? "checked" : "";
//            $return = '<label class="custom-control custom-radio col-md-4" >';
//            $return .= ' <input type="radio" class="custom-control-input" name="' . $name . '" value="' . $value . '"' . $checked . '><span class="custom-control-label"> ' . $label . '</span> </label>';
//            return $return;
//        }, 'style' => ['padding' => '5px']
//        ]) ?>
<!---->
<!--        --><?//= $form->field($model,'link')->textInput()?>

        <?= $form->field($model, 'content',['template'=>"{label}<div class='col-sm-9'>{input}</div>\n{error}"])->widget(\yii\redactor\widgets\Redactor::className(),[
                'clientOptions'=>[
                    'lang' => 'zh_cn',
                    'plugins' => ['counter','limiter','imagemanager','fontcolor','imagemanager','definedliks','video','table','textdirection','textexpander','fontsize'],

                    ]
        ]) ?>

    </div>
    <div class="box-footer">
        <div class='col-sm-2 control-label'></div>
        <?= Html::submitButton('提交', ['class' => 'btn btn-info']) ?>
    </div>
    <?php ActiveForm::end(); ?>


</div>

</div>
