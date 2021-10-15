<?php

use backend\models\userroleSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\userroleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '新闻类别 ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userrole-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered table-striped text-center'],
        'layout' => '<div class="box box-primary">
                <div class="box-header">' . Html::a("添加类别", ['create'], ['class' => 'btn btn-success btn-sm pull-left']) . '
                    <div class="pull-right col-xs-2">
                        {summary}
                    </div>
                </div >
                <div class="box-body">
                    {items}
                </div>
                <div class="box-body">
                    {pager}
                </div>
             </div>',
        'pager' => ['options' => ['class' => 'pagination', 'style' => 'margin:10px 10px;']],//分页样式
        'columns' => [
            ['attribute' => 'tid', 'headerOptions' => ['width' => '5%']],
            ['attribute' => 'name', 'headerOptions' => ['width' => '20%']],
//            ['attribute' => 'created', 'headerOptions' => ['width' => '20%'], 'value' => function ($model) {
//                return date("Y-m-d H:i:s", $model->created);
//            }
//            ],
//            ['attribute' => 'is_delete', 'headerOptions' => ['width' => '15%'], 'format' => 'html', 'value' => function ($model) {
//                $status = $model->is_delete == 0 ? "开启" : "关闭";
//                $class = $model->is_delete == 0 ? "label label-info" : "label label-danger";
//
//                return "<small class='$class'>" . $status . "</small>";
//
//            }],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{edit}{delete}{resetpass}{role}{status}',
                'buttons' => [
                    'edit' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-edit"></i><span>编辑</span>', "#", ['title' => '编辑', 'class' => 'btn btn-info btn-xs', 'onclick' => 'edit_name(' . $key . ')', 'style' => 'margin-left: 5px']);
//                        return Html::a('<i class="glyphicon glyphicon-edit"></i>', $url, ['title' => '编辑', 'class' => 'col-xs-1 col-sm-1']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-trash"></i><span>删除</span>', "#", ['title' => '删除', 'class' => 'btn btn-info btn-xs', 'onclick' => 'del(' . $key . ')', 'style' => 'margin-left: 5px']);
                    },
                    'role' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-lock"></i><span>权限</span>', $url, ['title' => '权限', 'class' => 'btn btn-info btn-xs ', 'style' => 'margin-left: 5px']);
                    },
//                    'status' => function ($url, $model, $key) {
//                        if ($model->is_delete == 0) {
//                            return Html::button('<i class="glyphicon glyphicon-remove"></i><span>关闭</span>', ['title' => '修改状态', 'class' => 'btn btn-info btn-xs ', 'style' => 'margin-left: 5px', 'onclick' => 'status(' . $key . ',' . $model->is_delete . ')']);
//
//                        } else {
//                            return Html::button('<i class="glyphicon glyphicon-ok"></i><span>开启</span>', ['title' => '修改状态', 'class' => 'btn btn-info btn-xs', 'style' => 'margin-left: 5px', 'onclick' => 'status(' . $key . ',' . $model->is_delete . ')']);
//                        }
//
//                    }
                ],

            ],
        ],
    ]); ?>

</div>
<script>
    function del(id) {
        swal.fire({
            title: "确定要删除该角色吗",
            text: "删除后将无法恢复",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "确定删除！",
            cancelButtonText: "取消删除",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }).then((value) => {
            if (value.value) {
                $.ajax({
                    url: "<?=Url::to(['userrole/delete'])?>",
                    type: 'post',
                    data: {'id': id},
                    dataType: 'json',
                    success: function (data) {
                        var data1 = eval(data);
                        if (data1.code == 1) {
                            swal.fire({
                                title: "删除成功",
                                icon: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "确定删除！",
                            }).then((value) => {
                                history.go(0);
                            })


                        } else {
                            swal.fire(data1.msg, "", 'error');
                        }
                    },
                });
            }

        })
    };


    function status(id, status) {
        swal.fire({
            title: "确定修改状态吗",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "确定修改！",
            cancelButtonText: "取消修改",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }).then((values) => {
            if(values.value){
                $.ajax({
                    url: "<?=Url::to(['userrole/user-status'])?>",
                    type: 'post',
                    data: {'id': id, 'status': status},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        var data1 = eval(data);
                        if (data1.code == 1) {
                            swal.fire({
                                title: "修改成功",
                                icon: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "确定",
                            }).then((value) => {
                                history.go(0);
                            })
                        } else {
                            swal.fire('修改失败', "", 'error');
                        }
                    },
                });
            }
        })
    };

    function edit_name(id) {
        swal.fire({
            title: '输入名称',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off',
            },
            showCancelButton: true,
            confirmButtonText: '修改',
            cancelButtonText: '取消',
            showLoaderOnConfirm: true,
            inputValidator:(inputvalues)=>{
                if(!inputvalues){
                    return "您必须填写一个角色名称";
                }
            },
            preConfirm:()=>{
                allowOutsideClick:false;
            }
        }).then(function(valuse){
            if(valuse.value){
                $.ajax({
                    url: "<?=Url::to(['userrole/edit-name'])?>",
                    type: 'post',
                    data: {'id': id, 'name': valuse.value},
                    dataType: 'json',
                    success: function (data) {
                        $data1 = eval(data);
                        if ($data1.code == 1) {
                            swal.fire({
                                title: "修改成功",
                                icon: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "确定",

                            }).then( function () {
                                history.go(0);
                            });

                        } else {
                            swal.fire("修改失败", '', 'error');
                        }
                    }
                });
            }
        });
    };
</script>