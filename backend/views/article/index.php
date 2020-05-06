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

$this->title = '新闻列表';
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

    <?php echo $this->render('_search', [
        'searchModel' => $searchModel,
        'type' => $type,
    ]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered table-striped text-center'],
        'layout' => '<div class="box box-primary">
                <div class="box-header">
                   <a href="'.Url::to(['article/add']).'" class="btn btn-success btn-sm pull-left">添加新闻</a>
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
            ['attribute' => 'id', 'headerOptions' => ['width' => '3%']],
            ['attribute' => 'article_title', 'headerOptions' => ['width' => '20%']],
            ['attribute' => 'article_category', 'value' => 'type.name', 'headerOptions' => ['width' => '10%']],
            ['attribute' => 'article_readnum','headerOptions' => ['width' => '10%']],
            ['attribute' => 'article_author', 'headerOptions' => ['width' => '10%']],

            ['attribute' => 'status', 'headerOptions' => ['width' => '10%'], 'format' => 'html', 'value' => function ($model) {
                $status = $model->status == 1 ? "开启" : "关闭";
                $class = $model->status == 0 ? "label label-danger" : "label label-info";
                return "<small class='$class'>$status</small>";

            }],
            ['attribute' => 'article_date', 'headerOptions' => ['width' => '20%'], 'value' => function ($model) {
                return date("Y-m-d H:s:i", $model->article_date);
            }],
            ['class' => 'yii\grid\ActionColumn', 'header' => '操作', 'headerOptions' => ['width' => '15%'], 'template' => '{edit}{status}',
                'buttons' => [
                    'edit' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-edit"></i><span>编辑</span>', $url, ['title' => '编辑', 'class' => 'btn btn-info btn-xs', 'style' => 'margin-left: 5px']);
                    },

                    'status'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-edit"></i><span>修改状态</span>', "#", ['title' => '修改状态', 'class' => 'btn btn-info btn-xs', 'style' => 'margin-left: 5px','onclick'=>'editstatus('.$key.','.$model->status.')']);
                    }
                ],

            ],
        ],
        'emptyText' => '没有筛选到任何内容哦',
    ]); ?>


</div>
<script>
    function editstatus(id,status) {
        swal.fire({
            icon: "info",
            title: "确定要修改状态",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "确定！",
            cancelButtonText: "取消",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?=Url::to(['article/status'])?>",
                    type: 'post',
                    data: {'id': id,'status':status},
                    dataType: 'json',
                    success: function (data) {
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

</script>
