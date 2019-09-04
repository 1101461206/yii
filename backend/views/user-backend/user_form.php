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
        <?= $form->field($model, 'username')->textInput() ?>
        <?php if(empty($model->password_hash)) {
           echo $form->field($model, 'password_hash')->passwordInput();
        }
        ?>
        <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'role')->dropdownList(\yii\helpers\ArrayHelper::map($role_name, 'roleid', 'role_name')) ?>

        <?= $form->field($model, 'status')->radioList([0 => '关闭', 1 => '开启'], ['item' => function ($index, $label, $name, $checked, $value) {
            $checked = $checked ? "checked" : "";
            $return = '<label class="custom-control custom-radio col-md-4" >';
            $return .= ' <input type="radio" class="custom-control-input" name="' . $name . '" value="' . $value . '"' . $checked . '><span class="custom-control-label"> ' . $label . '</span> </label>';
            return $return;
        }, 'style' => ['padding' => '5px']
        ]) ?>

        <?
        $thumb = "";
        if ($model['thumb']) {
            $thumb = "/backend/upload/" . $model['thumb'];
        }
        ?>
        <?= $form->field($model, 'thumb', ['inputOptions' => ['class' => 'dropify', 'data-height' => '180', 'data-default-file' => $thumb]])->fileInput([
                'options' => ['multiple' => false]
            ]
        ) ?>
        <?
        $img = "";
        if ($model['img']) {
            $img = "/backend/upload/" . $model['img'];
        }
        ?>
        <?= $form->field($model, 'img', ['inputOptions' => ['class' => 'dropify', 'data-height' => '180', 'data-default-file' => $img]])->fileInput([
                'options' => ['multiple' => false]
            ]
        ) ?>

    </div>
    <div class="box-footer">
        <div class='col-sm-2 control-label'></div>
        <?= Html::submitButton('添加', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<!-- /.box -->
<?= Html::jsFile('@web/vendor/dropify/js/dropify.js') ?>
<script>
    $('.dropify').dropify({
        messages: {
            'default': '点击或拖拽文件到这里',
            'replace': '点击或拖拽文件到这里来替换文件',
            'remove': '移除文件',
            'error': '对不起，你上传的文件太大了',
        }
    });

    // function loding(){
    //     document.getElementById('loding').className = 'overlay';
    // }
</script>
