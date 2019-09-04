<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Alert;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel common\models\UserBackendSerach */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**{summary}：摘要部分。参阅 renderSummary()。
 * {errors}：过滤器模型错误摘要。参阅 renderErrors()。
 * {items}：列表项。参阅 renderItems()。
 * {sorter}：排序。参阅 renderSorter()。
 * {pager}：分页。参阅 renderPager()。*/

$this->title = '管理员列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-backend-index">
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

    <?php echo $this->render('_search',[
            'searchModel'=>$searchModel,
            'role_name'=>$role_name,
    ]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered table-striped text-center'],
        'layout' => '<div class="box box-primary">
                <div class="box-header">' . Html::a("添加管理员", ['adduser'], ['class' => 'btn btn-success btn-sm pull-left']) . '
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
//            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'headerOptions' => ['width' => '5%']],
            ['attribute' => 'username', 'headerOptions' => ['width' => '15%']],
            ['attribute' => 'nickname', 'headerOptions' => ['width' => '15%']],
            ['attribute' => 'role', 'value' => 'role_name.role_name', 'headerOptions' => ['width' => '15%']],
            ['attribute' => 'status', 'headerOptions' => ['width' => '15%'], 'format' => 'html', 'value' => function ($model) {
                $status = $model->status == 1 ? "开启" : "关闭";
                return "<small class='label label-info'>$status</small>";

            }],
            ['attribute' => 'created_at', 'headerOptions' => ['width' => '20%'], 'value' => function ($model) {
                return date("Y-m-d H:s:i", $model->created_at);
            }],
            ['class' => 'yii\grid\ActionColumn', 'header' => '操作', 'template' => '{edit}{delete}{resetpass}{role}',
                'buttons' => [
                    'edit' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-edit"></i>', $url, ['title' => '编辑', 'class' => 'col-xs-1 col-sm-1']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-trash"></i>', "#", ['title' => '删除', 'class' => 'col-xs-1 col-sm-1', 'onclick' => 'del(' . $key . ')']);
                    },

                    'resetpass' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-refresh"></i>', $url, ['title' => '重置密码', 'class' => 'col-xs-1 col-sm-1']);
                    },

                    'role' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-lock"></i>', $url, ['title' => '设置权限', 'class' => 'col-xs-1 col-sm-1']);
                    },
                ],

            ],
        ],
        'emptyText' => '没有筛选到任何内容哦',
    ]); ?>


</div>
<script>
    function del(id) {
        swal({
                title: "确定要删除该用户吗",
                text: "删除后将无法恢复",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "确定删除！",
                cancelButtonText: "取消删除",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function () {
                $.ajax({
                    url: "<?=Url::to(['user-backend/delete'])?>",
                    type: 'post',
                    data: {'id': id},
                    dataType: 'json',
                    success: function (data) {
                        var data1 =eval(data);
                        if (data1.code == 1) {
                            swal({
                                    title: "删除成功",
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "确定删除！",
                                },
                                function () {
                                    history.go(0);
                                },
                            );
                        }else{
                            swal('删除失败',"",'error');
                        }
                    },
                });
            },
        )
    };

</script>
