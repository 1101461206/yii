<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\userroleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '角色管理 ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userrole-index">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered table-striped text-center'],
        'layout' => '<div class="box box-primary">
                <div class="box-header">' . Html::a("添加角色", ['create'], ['class' => 'btn btn-success btn-sm pull-left']) . '
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
            ['attribute' => 'roleid', 'headerOptions' => ['width' => '5%']],
            ['attribute' => 'role_name', 'headerOptions' => ['width' => '20%']],
            ['attribute' => 'created', 'headerOptions' => ['width' => '20%'],'value'=>function($model){
               return date("Y-m-d H:i:s",$model->created);
            }
            ],
            ['attribute' => 'is_delete', 'headerOptions' => ['width' => '15%'],'format' => 'html','value'=>function($model){
                $status=$model->is_delete==0?"开启":"关闭";
                return "<small class='label label-info'>".$status."</small>";

            }],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{edit}{delete}{resetpass}{role}',
                'buttons' => [
                    'edit' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-edit"></i>', $url, ['title' => '编辑', 'class' => 'col-xs-1 col-sm-1']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-trash"></i>', "#", ['title' => '删除', 'class' => 'col-xs-1 col-sm-1', 'onclick' => 'del(' . $key . ')']);
                    },
                    'role' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-lock"></i>', $url, ['title' => '设置权限', 'class' => 'col-xs-1 col-sm-1']);
                    },
                ],

            ],
        ],
    ]); ?>

</div>
