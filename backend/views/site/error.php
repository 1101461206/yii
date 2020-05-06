<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = "";
?>
<section class="content">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="error-page content" style="text-align: center">
        <h2 class="text-info" style="font-size: 100px;font-weight: 300;"><i class="fa fa-warning text-yellow"></i></h2>
        <p class="clearfix"></p>
        <div>
            <h3>访问错误，原因:</h3>

            <p>
            <h4 style="color: red"><?= nl2br(Html::encode($message)) ?></h4>
            </p>

            <p>
                请您联系管理员！
            </p>
        </div>
    </div>

</section>
