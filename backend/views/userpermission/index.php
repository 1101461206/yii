<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '权限设置';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-permission-index">


    <?=  GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered table-striped text-center'],
        'layout' => '<div class="box box-primary">
                <div class="box-header">' . Html::a("添加权限", ['create'], ['class' => 'btn btn-success btn-sm pull-left']) . '
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
//    ['class' => 'yii\grid\SerialColumn'],
            'permission_name',
            'type',
            'create_time:datetime',


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
    ],

    ],
        ],
    ]); ?>


</div>
