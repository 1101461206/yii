<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ImsShopGoodsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ims-shop-goods-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'uniacid') ?>

    <?= $form->field($model, 'pcate') ?>

    <?= $form->field($model, 'ccate') ?>

    <?= $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'displayorder') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'thumb') ?>

    <?php // echo $form->field($model, 'unit') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'goodssn') ?>

    <?php // echo $form->field($model, 'productsn') ?>

    <?php // echo $form->field($model, 'productprice') ?>

    <?php // echo $form->field($model, 'marketprice') ?>

    <?php // echo $form->field($model, 'costprice') ?>

    <?php // echo $form->field($model, 'originalprice') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'totalcnf') ?>

    <?php // echo $form->field($model, 'sales') ?>

    <?php // echo $form->field($model, 'salesreal') ?>

    <?php // echo $form->field($model, 'spec') ?>

    <?php // echo $form->field($model, 'createtime') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'credit') ?>

    <?php // echo $form->field($model, 'maxbuy') ?>

    <?php // echo $form->field($model, 'usermaxbuy') ?>

    <?php // echo $form->field($model, 'hasoption') ?>

    <?php // echo $form->field($model, 'dispatch') ?>

    <?php // echo $form->field($model, 'thumb_url') ?>

    <?php // echo $form->field($model, 'isnew') ?>

    <?php // echo $form->field($model, 'ishot') ?>

    <?php // echo $form->field($model, 'isdiscount') ?>

    <?php // echo $form->field($model, 'isrecommand') ?>

    <?php // echo $form->field($model, 'issendfree') ?>

    <?php // echo $form->field($model, 'istime') ?>

    <?php // echo $form->field($model, 'iscomment') ?>

    <?php // echo $form->field($model, 'timestart') ?>

    <?php // echo $form->field($model, 'timeend') ?>

    <?php // echo $form->field($model, 'viewcount') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <?php // echo $form->field($model, 'hascommission') ?>

    <?php // echo $form->field($model, 'commission1_rate') ?>

    <?php // echo $form->field($model, 'commission1_pay') ?>

    <?php // echo $form->field($model, 'commission2_rate') ?>

    <?php // echo $form->field($model, 'commission2_pay') ?>

    <?php // echo $form->field($model, 'commission3_rate') ?>

    <?php // echo $form->field($model, 'commission3_pay') ?>

    <?php // echo $form->field($model, 'score') ?>

    <?php // echo $form->field($model, 'taobaoid') ?>

    <?php // echo $form->field($model, 'taotaoid') ?>

    <?php // echo $form->field($model, 'taobaourl') ?>

    <?php // echo $form->field($model, 'updatetime') ?>

    <?php // echo $form->field($model, 'share_title') ?>

    <?php // echo $form->field($model, 'share_icon') ?>

    <?php // echo $form->field($model, 'cash') ?>

    <?php // echo $form->field($model, 'commission_thumb') ?>

    <?php // echo $form->field($model, 'isnodiscount') ?>

    <?php // echo $form->field($model, 'showlevels') ?>

    <?php // echo $form->field($model, 'buylevels') ?>

    <?php // echo $form->field($model, 'showgroups') ?>

    <?php // echo $form->field($model, 'buygroups') ?>

    <?php // echo $form->field($model, 'isverify') ?>

    <?php // echo $form->field($model, 'storeids') ?>

    <?php // echo $form->field($model, 'noticeopenid') ?>

    <?php // echo $form->field($model, 'tcate') ?>

    <?php // echo $form->field($model, 'noticetype') ?>

    <?php // echo $form->field($model, 'needfollow') ?>

    <?php // echo $form->field($model, 'followtip') ?>

    <?php // echo $form->field($model, 'followurl') ?>

    <?php // echo $form->field($model, 'deduct') ?>

    <?php // echo $form->field($model, 'virtual') ?>

    <?php // echo $form->field($model, 'ccates') ?>

    <?php // echo $form->field($model, 'discounts') ?>

    <?php // echo $form->field($model, 'nocommission') ?>

    <?php // echo $form->field($model, 'hidecommission') ?>

    <?php // echo $form->field($model, 'pcates') ?>

    <?php // echo $form->field($model, 'tcates') ?>

    <?php // echo $form->field($model, 'cates') ?>

    <?php // echo $form->field($model, 'artid') ?>

    <?php // echo $form->field($model, 'detail_logo') ?>

    <?php // echo $form->field($model, 'detail_shopname') ?>

    <?php // echo $form->field($model, 'detail_btntext1') ?>

    <?php // echo $form->field($model, 'detail_btnurl1') ?>

    <?php // echo $form->field($model, 'detail_btntext2') ?>

    <?php // echo $form->field($model, 'detail_btnurl2') ?>

    <?php // echo $form->field($model, 'detail_totaltitle') ?>

    <?php // echo $form->field($model, 'isdiscount_title') ?>

    <?php // echo $form->field($model, 'isdiscount_time') ?>

    <?php // echo $form->field($model, 'isdiscount_discounts') ?>

    <?php // echo $form->field($model, 'commission') ?>

    <?php // echo $form->field($model, 'saleupdate42392') ?>

    <?php // echo $form->field($model, 'deduct2') ?>

    <?php // echo $form->field($model, 'ednum') ?>

    <?php // echo $form->field($model, 'saleupdate') ?>

    <?php // echo $form->field($model, 'edmoney') ?>

    <?php // echo $form->field($model, 'edareas') ?>

    <?php // echo $form->field($model, 'diyformtype') ?>

    <?php // echo $form->field($model, 'diyformid') ?>

    <?php // echo $form->field($model, 'diymode') ?>

    <?php // echo $form->field($model, 'dispatchtype') ?>

    <?php // echo $form->field($model, 'dispatchid') ?>

    <?php // echo $form->field($model, 'dispatchprice') ?>

    <?php // echo $form->field($model, 'manydeduct') ?>

    <?php // echo $form->field($model, 'shorttitle') ?>

    <?php // echo $form->field($model, 'saleupdate37975') ?>

    <?php // echo $form->field($model, 'shopid') ?>

    <?php // echo $form->field($model, 'allcates') ?>

    <?php // echo $form->field($model, 'minbuy') ?>

    <?php // echo $form->field($model, 'invoice') ?>

    <?php // echo $form->field($model, 'repair') ?>

    <?php // echo $form->field($model, 'seven') ?>

    <?php // echo $form->field($model, 'money') ?>

    <?php // echo $form->field($model, 'minprice') ?>

    <?php // echo $form->field($model, 'maxprice') ?>

    <?php // echo $form->field($model, 'province') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'buyshow') ?>

    <?php // echo $form->field($model, 'buycontent') ?>

    <?php // echo $form->field($model, 'saleupdate51117') ?>

    <?php // echo $form->field($model, 'virtualsend') ?>

    <?php // echo $form->field($model, 'virtualsendcontent') ?>

    <?php // echo $form->field($model, 'verifytype') ?>

    <?php // echo $form->field($model, 'diyfields') ?>

    <?php // echo $form->field($model, 'diysaveid') ?>

    <?php // echo $form->field($model, 'diysave') ?>

    <?php // echo $form->field($model, 'quality') ?>

    <?php // echo $form->field($model, 'groupstype') ?>

    <?php // echo $form->field($model, 'showtotal') ?>

    <?php // echo $form->field($model, 'subtitle') ?>

    <?php // echo $form->field($model, 'minpriceupdated') ?>

    <?php // echo $form->field($model, 'sharebtn') ?>

    <?php // echo $form->field($model, 'catesinit3') ?>

    <?php // echo $form->field($model, 'showtotaladd') ?>

    <?php // echo $form->field($model, 'merchid') ?>

    <?php // echo $form->field($model, 'checked') ?>

    <?php // echo $form->field($model, 'thumb_first') ?>

    <?php // echo $form->field($model, 'merchsale') ?>

    <?php // echo $form->field($model, 'keywords') ?>

    <?php // echo $form->field($model, 'catch_id') ?>

    <?php // echo $form->field($model, 'catch_url') ?>

    <?php // echo $form->field($model, 'catch_source') ?>

    <?php // echo $form->field($model, 'saleupdate40170') ?>

    <?php // echo $form->field($model, 'saleupdate35843') ?>

    <?php // echo $form->field($model, 'labelname') ?>

    <?php // echo $form->field($model, 'autoreceive') ?>

    <?php // echo $form->field($model, 'cannotrefund') ?>

    <?php // echo $form->field($model, 'saleupdate33219') ?>

    <?php // echo $form->field($model, 'bargain') ?>

    <?php // echo $form->field($model, 'buyagain') ?>

    <?php // echo $form->field($model, 'buyagain_islong') ?>

    <?php // echo $form->field($model, 'buyagain_condition') ?>

    <?php // echo $form->field($model, 'buyagain_sale') ?>

    <?php // echo $form->field($model, 'buyagain_commission') ?>

    <?php // echo $form->field($model, 'saleupdate32484') ?>

    <?php // echo $form->field($model, 'saleupdate36586') ?>

    <?php // echo $form->field($model, 'diypage') ?>

    <?php // echo $form->field($model, 'cashier') ?>

    <?php // echo $form->field($model, 'saleupdate53481') ?>

    <?php // echo $form->field($model, 'saleupdate30424') ?>

    <?php // echo $form->field($model, 'isendtime') ?>

    <?php // echo $form->field($model, 'usetime') ?>

    <?php // echo $form->field($model, 'endtime') ?>

    <?php // echo $form->field($model, 'merchdisplayorder') ?>

    <?php // echo $form->field($model, 'exchange_stock') ?>

    <?php // echo $form->field($model, 'exchange_postage') ?>

    <?php // echo $form->field($model, 'ispresell') ?>

    <?php // echo $form->field($model, 'presellprice') ?>

    <?php // echo $form->field($model, 'presellover') ?>

    <?php // echo $form->field($model, 'presellovertime') ?>

    <?php // echo $form->field($model, 'presellstart') ?>

    <?php // echo $form->field($model, 'preselltimestart') ?>

    <?php // echo $form->field($model, 'presellend') ?>

    <?php // echo $form->field($model, 'preselltimeend') ?>

    <?php // echo $form->field($model, 'presellsendtype') ?>

    <?php // echo $form->field($model, 'presellsendstatrttime') ?>

    <?php // echo $form->field($model, 'presellsendtime') ?>

    <?php // echo $form->field($model, 'edareas_code') ?>

    <?php // echo $form->field($model, 'unite_total') ?>

    <?php // echo $form->field($model, 'buyagain_price') ?>

    <?php // echo $form->field($model, 'threen') ?>

    <?php // echo $form->field($model, 'intervalfloor') ?>

    <?php // echo $form->field($model, 'intervalprice') ?>

    <?php // echo $form->field($model, 'isfullback') ?>

    <?php // echo $form->field($model, 'isstatustime') ?>

    <?php // echo $form->field($model, 'statustimestart') ?>

    <?php // echo $form->field($model, 'statustimeend') ?>

    <?php // echo $form->field($model, 'nosearch') ?>

    <?php // echo $form->field($model, 'showsales') ?>

    <?php // echo $form->field($model, 'islive') ?>

    <?php // echo $form->field($model, 'liveprice') ?>

    <?php // echo $form->field($model, 'opencard') ?>

    <?php // echo $form->field($model, 'cardid') ?>

    <?php // echo $form->field($model, 'verifygoodsnum') ?>

    <?php // echo $form->field($model, 'verifygoodsdays') ?>

    <?php // echo $form->field($model, 'verifygoodslimittype') ?>

    <?php // echo $form->field($model, 'verifygoodslimitdate') ?>

    <?php // echo $form->field($model, 'minliveprice') ?>

    <?php // echo $form->field($model, 'maxliveprice') ?>

    <?php // echo $form->field($model, 'dowpayment') ?>

    <?php // echo $form->field($model, 'tempid') ?>

    <?php // echo $form->field($model, 'isstoreprice') ?>

    <?php // echo $form->field($model, 'beforehours') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
