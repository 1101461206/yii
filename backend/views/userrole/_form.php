<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Userrole */
/* @var $form yii\widgets\ActiveForm */
?>

<!--<div class="--><!---form">-->
<div class="box box-info">
    <div class="box-header with-border">
    </div>
    <div class="box-body">
        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
            'fieldConfig' => [
                'options' => ['class' => 'form-group'],
                'template' => "{label}
        <div class='col-sm-4'>{input}</div>
        \n{error}",
                'labelOptions' => ['class' => 'col-sm-2 control-label'],
            ],

        ]); ?>

        <?= $form->field($model, 'role_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'is_delete')->radioList([0=>"开启",1=>"关闭"],['style'=>'padding-top:7px;']) ?>
        <div class="form-group ">
        <label class="col-sm-2 control-label" for="userrole-role_name">权限</label>
        <div class="col-sm-4 ">
            <div style="padding-top: 7px;">
           <table style="width: 1000px; ">
               <tbody>
               <tr>
                   <th style="width: 50px"></th>
                   <th style="width: 50px"></th>
                   <th style="width: 50px"></th>
                   <th style="width: 50px"></th>
                   <th style="width: 50px"></th>
                   <th style="width: 50px"></th>
                   <th style="width: 50px"></th>
                   <th style="width: 50px"></th>
                   <th style="width: 50px"></th>
                   <th style="width: 550px"></th>
               </tr>
               </tbody>

               <?php
               foreach ($role_all as $k => $v) {
                   ?>
                   <tr>
                       <td colspan="2">
                           <?= Html::checkboxList("permission_id", !empty($role_all_def[$k]) ? $role_all_def[$k]['pid'] : "", $v['p_info'], ['style' => 'text-align: left', 'itemOptions' => ['onclick' => 'but(' . $v['pid'] . ')', 'id' => 'id' . $v['pid']]]) ?>
                       </td>

                   </tr>
                   <?php
                   foreach ($v['list'] as $kk => $vv) {
                       ?>
                       <tr>
                           <td></td>
                           <td colspan="2">
                               <?= Html::checkboxList("permission_id", !empty($role_all_def[$k]) ? $role_all_def[$k]['list'] : "", $vv['fid'], ['style' => 'text-align: left', 'itemOptions' => ['class' => 'but' . $v['pid'], 'onclick' => 'pid(' . $v['pid'] . ')']]) ?>
                           </td>
                           <?php
                           if (!empty($vv['f_list'])) {
                               ?>
                               <td colspan="5" style="padding-left: 20px;">
                                   <?= Html::checkboxList("permission_id", !empty($role_all_def[$k]) ? $role_all_def[$k]['list'] : "", $vv['f_list'], ['itemOptions' => ['class' => 'but' . $v['pid'], 'onclick' => 'pid(' . $v['pid'] . ')']]) ?>
                               </td>
                               <?php
                           }

                           ?>
                       </tr>
                       <?php
                   }
               }
               ?>

           </table>
            </div>
       </div>
        </>

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
        var p = document.getElementById(pid).checked;
        if (p == false) {
            document.getElementById(pid).checked = true;
        }

    }
</script>
