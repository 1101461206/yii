<?php

use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use common\widgets\Awsome;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'banner设置';
$this->params['breadcrumbs'][] = '首页设置';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="imsindex-index">
    <?php
    if (Yii::$app->getSession()->hasFlash('success')) {
        Alert::widget([
            'options' => [
                'class' => 'alert-success', //这里是提示框的class
            ],
            'body' => Yii::$app->getSession()->getFlash('success'), //消息体
        ]);
    }
    if (Yii::$app->getSession()->hasFlash('error')) {
        Alert::widget([
            'options' => [
                'class' => 'alert-error',
            ],
            'body' => Yii::$app->getSession()->getFlash('error'),
        ]);
    }
    ?>
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
            <?= $form->field($model, 'title')->textInput() ?>
            <?
            $banner = "";
            if ($model['banner']) {
                $banner = "/frontend/web/upload/" . $model['banner'];
            }
            ?>
            <?= $form->field($model, 'banner', ['inputOptions' => ['class' => 'dropify', 'data-height' => '180', 'data-default-file' => $banner]])->fileInput([
                    'options' => ['multiple' => false]
                ]
            )->label('Banner图：1376*669') ?>
            <?= $form->field($model, 'banner_text_top')->textInput() ?>
            <?= $form->field($model, 'banner_text_down')->textInput() ?>

        </div>
        <div class="box-footer">
            <div class='col-sm-2 control-label'></div>
            <?= Html::submitButton('设置', ['class' => 'btn btn-info']) ?>
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


</div>
