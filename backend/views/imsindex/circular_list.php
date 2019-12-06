<?php

use Yii;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = '三园图标列表';
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
    <!-- Horizontal Form -->

        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-bordered table-striped text-center'],
            'layout' => '<div class="box box-primary">
                <div class="box-header">
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
//                ['attribute' => 'img', 'headerOptions' => ['width' => '15%'],'format'=>'raw','value'=>function($model){
//                    $path='/frontend/upload'.'/'.$model->img;
//                    return Html::img($path,['width'=>'50px','height'=>'50px','onclick'=>'fa_img()']);
//                }],
                ['attribute' => 'img', 'headerOptions' => ['width' => '15%'],'format'=>['image',['width'=>'50px','height'=>'50px']],'value'=>function($model){
                    if($model->img){
                        $path_img='/frontend/web/'.$model->img;
                        return $path_img;
                    }

                }],
                ['attribute'=>'fa', 'headerOptions' => ['width' => '15%'],'format'=>'html','value'=>function($model){
                    return "<i class='fa fa-$model->fa fa-3x'></i>";
                }],

                ['attribute' => 'title', 'headerOptions' => ['width' => '15%']],
                ['attribute' => 'type', 'headerOptions' => ['width' => '15%'],'format'=>'html','value'=>function($model){
                    switch ($model->type){
                        case 1:
                            if($model->img){
                                $type="跳转图片";
                            }else{
                                $type="跳转链接";
                            }

                            break;
                        default:
                            $type="无";
                            break;
                    }
                    return $type;
                }],
                ['attribute' => 'content', 'headerOptions' => ['width' => '15%'],],
                ['class' => 'yii\grid\ActionColumn', 'header' => '操作', 'headerOptions' => ['width' => '15%'], 'template' => '{edit}',
                    'buttons' => [
                        'edit' => function ($url, $model, $key) {
                            return Html::a('<i class="glyphicon glyphicon-edit"></i><span>编辑</span>', Url::to(['imsindex/circularedit','id'=>$key]), ['title' => '编辑', 'class' => 'btn btn-info btn-xs', 'style' => 'margin-left: 5px']);
                        },




                    ],

                ],
            ],
            'emptyText' => '没有筛选到任何内容哦',
        ]); ?>



    <!-- /.box -->

<script>
    function status(id,statua) {
        Swal.fire({
            title: '修改状态！',
            text: '你确定修改吗！',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "确定修改！",
            cancelButtonText: "取消修改",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }).then((values)=>{
            if(values.value){
                $.ajax({
                    url: "<?=Url::to(['imsindex/imgstatus'])?>",
                    type: 'post',
                    data: {'id': id, 'status': statua},
                    dataType: 'json',
                    success: function (data) {
                        var data1 = eval(data);
                        if (data1.code == 1) {


                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: '成功',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                history.go(0);
                            });
                        } else {
                            swal.fire(data1.msg, "", 'error');
                        }
                    },
                });
            };
        });
    }
</script>
</div>
