<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '轮循图片_修改';
$this->params['breadcrumbs'][] = '首页设置';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="imsindex-index">
    <?= Html::cssFile('@web/vendor/dropify/css/dropify.css'); ?>
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
            <? //
            $img = "";
            if ($model['img']) {
                $img = "/frontend/web/upload/" . $model['img'];
            }
            ?>
            <?= $form->field($model, 'img', ['inputOptions' => ['class' => 'dropify', 'data-height' => '180', 'data-default-file' => $img]])->fileInput([
                    'options' => ['multiple' => false]
                ]
            )->label('轮循图：600*410')?>
            <?= $form->field($model, 'img_text')->textInput() ?>
            <?= $form->field($model, 'img_content')->textInput() ?>
            <?= $form->field($model, 'status')->radioList([0 => '关闭', 1 => '开启'], ['item' => function ($index, $label, $name, $checked, $value) {
                $checked = $checked ? "checked" : "";
                $return = '<label class="custom-control custom-radio col-md-4" >';
                $return .= ' <input type="radio" class="custom-control-input" name="' . $name . '" value="' . $value . '"' . $checked . '><span class="custom-control-label"> ' . $label . '</span> </label>';
                return $return;
            }, 'style' => ['padding' => '5px']
            ]) ?>

            <?= $form->field($model, 'img_type')->radioList([1=> '放大图片', 2 => '跳转连接'], ['item' => function ($index, $label, $name, $checked, $value) {
                $checked = $checked ? "checked" : "";

                $return = '<label class="custom-control custom-radio col-md-4" >';
                $return .= ' <input type="radio" class="custom-control-input" name="' . $name . '" value="' . $value . '"' . $checked . '><span class="custom-control-label"> ' . $label . '</span> </label>';
                return $return;
            }, 'style' => ['padding' => '5px']
            ]) ?>

            <?= $form->field($model,'link')->textInput()?>

        </div>
        <div class="box-footer">
            <div class='col-sm-2 control-label'></div>
            <?= Html::submitButton('提交', ['class' => 'btn btn-info']) ?>
        </div>
        <?php ActiveForm::end(); ?>


    </div>
    <!-- /.box -->
    <script>
        async function choice_fa(name) {
            const {value: formValues}= await swal.fire({
                title:'选择图标',
                html:'<?=$list?>',
                width:'500px',
                focusConfirm: false,
                preConfirm: () => {
                    return $("input[name='radioname']:checked").val();
                }
            });
            if(formValues){
                document.getElementById(name).value=formValues;
            }
        }
    </script>
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


</div>
