<?php

use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<!--<div class="--><? //= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?><!---form">-->
<div class="box box-info">
    <div class="box-header with-border">
    </div>
    <div class="box-body">
        <?= "<?php" ?> $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
        'fieldConfig' => [
        'options' => ['class' => 'form-group'],
        'template' => "{label}
        <div class='col-sm-4'>{input}</div>
        \n{error}",
        'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ],

        ]); ?>

        <?php foreach ($generator->getColumnNames() as $attribute) {
            if (in_array($attribute, $safeAttributes)) {
                echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
            }
        } ?>
    </div>
    <div class="box-footer">
        <div class='col-sm-2 control-label'></div>
        <?= Html::submitButton('添加', ['class' => 'btn btn-info']) ?>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
