<?php

use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\userroleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '权限列表 ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userrole-index">
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
    <!--    --><?php //echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    --><?php //echo $this->render('_search', ['model' => $model]); ?>

    <div class="box box-primary">

        <div class="box-header">
            <?= Html::a("添加权限", ['create'], ['class' => 'btn btn-success btn-sm pull-left']) ?>
        </div>

        <div class="box-body">
            <table class="table table-bordered table-striped text-center ">
                <tr>
                    <th style="width: 5%">id</th>
                    <th style="width: 15%">名称</th>
                    <th style="width: 15%">级别</th>
                    <th style="width: 10%">上级</th>
                    <th style="width: 10%">顶级</th>
                    <th style="width: 15%">路由</th>
                    <th style="width: 10%">状态</th>
                    <th style="width: 20%">操作</th>
                </tr>
                <?php

                foreach ($data as $k => $v) {
                    ?>
                    <tr style="color: red;font-weight: bold; ">
                        <td><?=$v['id']?></td>
                        <td><?=$v['name']?></td>
                        <td>顶级菜单栏</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <small class='<?=$v['is_delete']=="0"?"label label-info":"label label-danger"?>'><?=$v['is_delete']==0?"启用":"关闭"?></small>
                        </td>
                        <td>
                           <?=Html::a('<i class="glyphicon glyphicon-pencil"></i><span>编辑</span>', Url::to(['userpermission/edit','id'=>$v['id']]), ['title' => '编辑', 'class' => 'btn btn-info btn-xs','style'=>'margin-left: 5px']);?>
                           <?=Html::a('<i class="glyphicon glyphicon-cog"></i><span>状态</span>', "#", ['title' => '关闭', 'class' => 'btn btn-info btn-xs', 'onclick' => 'del('.$v['id'].','.$v['is_delete'].')','style'=>'margin-left: 5px']);?>
                        </td>
                    </tr>
                    <?php
                    if(!empty($v['fid'])){
                        foreach ($v['fid'] as $fk=>$fv){
//                        echo "<pre>";
//                        var_dump($fv);
//                        echo "<pre>";

                            ?>
                            <tr>
                                <td><?=$fv['id']?></td>
                                <td><?=$fv['name']?></td>
                                <td>二级菜单栏</td>
                                <td><?=$v['name']?></td>
                                <td><?=$v['name']?></td>
                                <td><?=$fv['page']?></td>
                                <td><small class='<?=$fv['is_delete']=="0"?"label label-info":"label label-danger"?>'><?=$fv['is_delete']==0?"启用":"关闭"?></small></td>
                                <td>
                                    <?=Html::a('<i class="glyphicon glyphicon-pencil "></i><span>编辑</span>', Url::to(['userpermission/edit','id'=>$fv['id']]), ['title' => '编辑', 'class' => 'btn btn-info btn-xs','style'=>'margin-left: 5px']);?>
                                    <?=Html::a('<i class="glyphicon glyphicon-cog"></i><span>状态</span>', "#", ['title' => '关闭', 'class' => 'btn btn-info btn-xs', 'onclick' => 'del('.$fv['id'].','.$fv['is_delete'].')','style'=>'margin-left: 5px']);?>
                                </td>
                            </tr>
                            <?php
                            if(!empty($fv['list'])){
                                foreach ($fv['list'] as $lk=>$lv){
                                    ?>
                                    <tr>
                                        <td><?=$lv['id']?></td>
                                        <td><?=$lv['name']?></td>
                                        <td>三级级菜单栏</td>
                                        <td><?=$fv['name']?></td>
                                        <td><?=$v['name']?></td>
                                        <td><?=$lv['page']?></td>
                                        <td><small class='<?=$lv['is_delete']=="0"?"label label-info":"label label-danger"?>'><?=$lv['is_delete']==0?"启用":"关闭"?></small></td>
                                        <td>
                                            <?=Html::a('<i class="glyphicon glyphicon-pencil "></i><span>编辑</span>', Url::to(['userpermission/edit','id'=>$lv['id']]), ['title' => '编辑', 'class' => 'btn btn-info btn-xs','style'=>'margin-left: 5px']);?>
                                            <?=Html::a('<i class="glyphicon glyphicon-cog"></i><span>状态</span>', "#", ['title' => '关闭', 'class' => 'btn btn-info btn-xs', 'onclick' => 'del('.$lv['id'].','.$lv['is_delete'].')','style'=>'margin-left: 5px']);?>
                                        </td>
                                    </tr>
                                    <?php
                                }

                            }
                        }
                    }


                }
                ?>
            </table>
        </div>
        <div class="box-body">

        </div>
    </div>

    <!--    --><? //= GridView::widget([
    //        'dataProvider' => $data,
    //        //'filterModel' => $searchModel,
    //        'tableOptions' => ['class' => ''],
    //       // 'pager' => ['options' => ['class' => 'pagination', 'style' => 'margin:10px 10px;']],//分页样式
    //        'columns' => [
    //           // ['attribute' => 'roleid', 'headerOptions' => ['width' => '5%']],
    //         //   ['attribute' => 'role_name', 'headerOptions' => ['width' => '20%']],
    //        //    ['attribute' => 'created', 'headerOptions' => ['width' => '20%'],'value'=>function($model){
    //          //     return date("Y-m-d H:i:s",$model->created);
    //         //   }
    //        //    ],
    ////            ['attribute' => 'is_delete', 'headerOptions' => ['width' => '15%'],'format' => 'html','value'=>function($model){
    ////                $status=$model->is_delete==0?"开启":"关闭";
    ////                $class=$model->is_delete==0?"label label-info":"label label-danger";
    ////
    ////                return "<small class='$class'>".$status."</small>";
    ////
    ////            }],
    ////            [
    ////                'class' => 'yii\grid\ActionColumn',
    ////                'header' => '操作',
    ////                'template' => '{edit}{delete}{resetpass}{role}{status}',
    ////                'buttons' => [
    ////                    'edit' => function ($url, $model, $key) {
    ////                        return Html::a('<i class="glyphicon glyphicon-edit"></i><span>编辑</span>', "#", ['title' => '编辑', 'class' => 'btn btn-info btn-xs','onclick'=>'edit_name('. $key .')','style'=>'margin-left: 5px']);
    //////                        return Html::a('<i class="glyphicon glyphicon-edit"></i>', $url, ['title' => '编辑', 'class' => 'col-xs-1 col-sm-1']);
    ////                    },
    ////                    'delete' => function ($url, $model, $key) {
    ////                        return Html::a('<i class="glyphicon glyphicon-cog"></i><span>状态</span>', "#", ['title' => '关闭', 'class' => 'btn btn-info btn-xs', 'onclick' => 'del(' . $key . ')','style'=>'margin-left: 5px']);
    ////                    },
    ////                    'role' => function ($url, $model, $key) {
    ////                        return Html::a('<i class="glyphicon glyphicon-lock"></i><span>权限</span>', $url, ['title' => '权限', 'class' => 'btn btn-info btn-xs ','style'=>'margin-left: 5px']);
    ////                    },
    ////                    'status'=>function($url,$model,$key){
    ////                        if($model->is_delete==0){
    ////                            return Html::button('<i class="glyphicon glyphicon-remove"></i><span>关闭</span>', ['title' => '修改状态', 'class' => 'btn btn-info btn-xs ','style'=>'margin-left: 5px','onclick'=>'status('.$key.','.$model->is_delete.')']);
    ////
    ////                        }else{
    ////                            return Html::button('<i class="glyphicon glyphicon-ok"></i><span>开启</span>', ['title' => '修改状态', 'class' => 'btn btn-info btn-xs','style'=>'margin-left: 5px','onclick'=>'status('.$key.','.$model->is_delete.')']);
    ////                        }
    ////
    ////                    }
    ////                ],
    ////
    ////            ],
    //        ],
    //    ]); ?>

</div>
<script>
    function del(id,status) {
        swal({
                title: "确定要修改状态吗",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "确定修改！",
                cancelButtonText: "取消修改",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function () {
                $.ajax({
                    url: "<?=Url::to(['userpermission/delete'])?>",
                    type: 'post',
                    data: {'id': id,'status':status},
                    dataType: 'json',
                    success: function (data) {
                        var data1 = eval(data);
                        if (data1.code == 1) {
                            swal({
                                    title: data1.msg,
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "确定",
                                },
                                function () {
                                    history.go(0);
                                },
                            );
                        } else {
                            swal(data1.msg, "", 'error');
                        }
                    },
                });
            },
        )
    };


    function status(id, status) {
        swal({
                title: "确定修改状态吗",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "确定修改！",
                cancelButtonText: "取消修改",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function () {
                $.ajax({
                    url: "<?=Url::to(['userrole/user-status'])?>",
                    type: 'post',
                    data: {'id': id, 'status': status},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        var data1 = eval(data);
                        if (data1.code == 1) {
                            swal({
                                    title: "修改成功",
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "确定",
                                },
                                function () {
                                    history.go(0);
                                },
                            );
                        } else {
                            swal('修改失败', "", 'error');
                        }
                    },
                });
            },
        )
    };

    function edit_name(id) {
        swal({
            title: '输入名称',
            type: 'input',
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: '修改',
            cancelButtonText: '取消',
            animation: 'slide-from-top',
        }, function (inputValue) {
            // if(inputValue==false) return false;
            if (inputValue == '') {
                swal.showInputError('名称不能为空');
                return false;
            }
            $.ajax({
                url: "<?=Url::to(['userrole/edit-name'])?>",
                type: 'post',
                data: {'id': id, 'name': inputValue},
                dataType: 'json',
                success: function (data) {
                    $data1 = eval(data);
                    if ($data1.code == 1) {
                        swal({
                            title: "修改成功",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "确定",

                        }, function () {
                            history.go(0);
                        });

                    } else {
                        swal("修改失败", '', 'error');
                    }
                }
            });

        });
    };
</script>