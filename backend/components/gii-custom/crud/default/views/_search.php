<?php

use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->searchModelClass, '\\') ?> */
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


        <?= "<?php "?>$form = ActiveForm::begin([
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
            <?php
            $count = 0;
            foreach ($generator->getColumnNames() as $attribute) {
                if (++$count < 6) {
                    echo "    <?= " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
                } else {
                    echo "    <?php // echo " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
                }
            }
            ?>
            <div class="form-group col-sm-1">
                <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('搜索') ?>, ['class' => 'btn
                btn-primary']) ?>
            </div>
        </div>
        <?= "<?php " ?>ActiveForm::end(); ?>
    </div>
</div>

