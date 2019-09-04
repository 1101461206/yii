<?php

use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Userrole */

$this->title = '修改权限';
$this->params['breadcrumbs'][] = ['label' => '角色列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

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


<div class="box box-info">
    <div class="box-header with-border">
    </div>
    <div class="box-body">
        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
            'fieldConfig' => [
                // 'options' => ['class' => 'form-group'],
                'template' => "{input}",
                //'labelOptions' => ['class' => 'col-sm-2 control-label'],
            ],

        ]); ?>
        <div class="form-group">
            <label class="col-sm-2 control-label"  style="border: 0;font-size: 20px;font-weight: bold;"><?php echo $role_name->role_name; ?></label>
            <div class="col-sm-4">

            </div>
        </div>

        <?= Html::hiddenInput('role_id', $role_name->roleid) ?>
        <?php
        foreach ($role_all as $k => $v) {
            ?>
            <div class="form-group">
                <?= Html::checkboxList("permission_id", !empty($role_all_def[$k]) ? $role_all_def[$k]['pid'] : "", $v['p_info'], ['class' => 'col-sm-2', 'style' => 'text-align: right', 'itemOptions' => ['onclick' => 'but(' . $v['pid'] . ')', 'id' => 'id' . $v['pid']]]) ?>
                <?= Html::checkboxList("permission_id", !empty($role_all_def[$k]) ? $role_all_def[$k]['list'] : "", $v['list'], ['class' => 'col-sm-4', 'itemOptions' => ['class' => 'but' . $v['pid'],'onclick'=>'pid('.$v['pid'].')']]) ?>
            </div>
            <?
        }

        ?>


    </div>
    <div class="box-footer">
        <div class='col-sm-2 control-label'></div>
        <button type="submit" class="btn btn-info">添加</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    function but(id) {
        var pid = 'id' + id;
        id = "but" + id;
        var p = document.getElementById(pid).checked;
        var hobby = document.getElementsByClassName(id);
        var type = "";
        if (p) {
            type = true;
        } else {
            type = false;
        }
        for (var i = 0; i < hobby.length; i++) {
            var h = hobby[i];
            h.checked = type;
        }

    }

    function pid(id) {
        var pid = 'id' + id;
        var p=document.getElementById(pid).checked;
        if(p==false){
            document.getElementById(pid).checked = true;
        }

    }
</script>