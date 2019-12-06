<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use common\widgets\Awsome;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = '宣传图文';
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
            $propaganda = "";
            if ($model['propaganda']) {
                $propaganda = "/frontend/web/upload/" . $model['propaganda'];
            }
            ?>
            <?= $form->field($model, 'propaganda', ['inputOptions' => ['class' => 'dropify', 'data-height' => '180', 'data-default-file' => $propaganda]])->fileInput([
                    'options' => ['multiple' => false]
                ]
            )->label('宣传图：584*618')?>

            <?= $form->field($model, 'propaganda_top_left',[ 'template' => "{label}<div class='col-sm-3'>{input}</div><div class='col-sm-1'><a href='#' onclick=\"choice_fa('imsindex-propaganda_top_left')\">选择图标</a></div>\n{error}"])->textInput()?>
            <?= $form->field($model, 'propaganda_top_top')->textInput() ?>
            <?= $form->field($model, 'propaganda_top_butter')->textInput() ?>

            <?= $form->field($model, 'propaganda_middle_left',[ 'template' => "{label}<div class='col-sm-3'>{input}</div><div class='col-sm-1'><a href='#' onclick=\"choice_fa('imsindex-propaganda_middle_left')\">选择图标</a></div>\n{error}"])->textInput() ?>
            <?= $form->field($model, 'propaganda_middle_top')->textInput() ?>
            <?= $form->field($model, 'propaganda_middle_butter')->textInput() ?>

            <?= $form->field($model, 'propaganda_down_left',[ 'template' => "{label}<div class='col-sm-3'>{input}</div><div class='col-sm-1'><a href='#' onclick=\"choice_fa('imsindex-propaganda_down_left')\">选择图标</a></div>\n{error}"])->textInput() ?>
            <?= $form->field($model, 'propaganda_down_top')->textInput() ?>
            <?= $form->field($model, 'propaganda_down_butter')->textInput() ?>

            <!---->
        </div>
        <div class="box-footer">
            <div class='col-sm-2 control-label'></div>
            <?= Html::submitButton('添加', ['class' => 'btn btn-info']) ?>
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
