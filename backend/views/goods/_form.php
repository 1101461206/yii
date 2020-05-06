<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ImsShopGoods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ims-shop-goods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uniacid')->textInput() ?>

    <?= $form->field($model, 'pcate')->textInput() ?>

    <?= $form->field($model, 'ccate')->textInput() ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'displayorder')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thumb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'goodssn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productsn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marketprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'costprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'originalprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'totalcnf')->textInput() ?>

    <?= $form->field($model, 'sales')->textInput() ?>

    <?= $form->field($model, 'salesreal')->textInput() ?>

    <?= $form->field($model, 'spec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createtime')->textInput() ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maxbuy')->textInput() ?>

    <?= $form->field($model, 'usermaxbuy')->textInput() ?>

    <?= $form->field($model, 'hasoption')->textInput() ?>

    <?= $form->field($model, 'dispatch')->textInput() ?>

    <?= $form->field($model, 'thumb_url')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'isnew')->textInput() ?>

    <?= $form->field($model, 'ishot')->textInput() ?>

    <?= $form->field($model, 'isdiscount')->textInput() ?>

    <?= $form->field($model, 'isrecommand')->textInput() ?>

    <?= $form->field($model, 'issendfree')->textInput() ?>

    <?= $form->field($model, 'istime')->textInput() ?>

    <?= $form->field($model, 'iscomment')->textInput() ?>

    <?= $form->field($model, 'timestart')->textInput() ?>

    <?= $form->field($model, 'timeend')->textInput() ?>

    <?= $form->field($model, 'viewcount')->textInput() ?>

    <?= $form->field($model, 'deleted')->textInput() ?>

    <?= $form->field($model, 'hascommission')->textInput() ?>

    <?= $form->field($model, 'commission1_rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'commission1_pay')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'commission2_rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'commission2_pay')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'commission3_rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'commission3_pay')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'score')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taobaoid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taotaoid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taobaourl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updatetime')->textInput() ?>

    <?= $form->field($model, 'share_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'share_icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cash')->textInput() ?>

    <?= $form->field($model, 'commission_thumb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isnodiscount')->textInput() ?>

    <?= $form->field($model, 'showlevels')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'buylevels')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'showgroups')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'buygroups')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'isverify')->textInput() ?>

    <?= $form->field($model, 'storeids')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'noticeopenid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tcate')->textInput() ?>

    <?= $form->field($model, 'noticetype')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'needfollow')->textInput() ?>

    <?= $form->field($model, 'followtip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'followurl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deduct')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'virtual')->textInput() ?>

    <?= $form->field($model, 'ccates')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'discounts')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nocommission')->textInput() ?>

    <?= $form->field($model, 'hidecommission')->textInput() ?>

    <?= $form->field($model, 'pcates')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tcates')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cates')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'artid')->textInput() ?>

    <?= $form->field($model, 'detail_logo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail_shopname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail_btntext1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail_btnurl1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail_btntext2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail_btnurl2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail_totaltitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isdiscount_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isdiscount_time')->textInput() ?>

    <?= $form->field($model, 'isdiscount_discounts')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'commission')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'saleupdate42392')->textInput() ?>

    <?= $form->field($model, 'deduct2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ednum')->textInput() ?>

    <?= $form->field($model, 'saleupdate')->textInput() ?>

    <?= $form->field($model, 'edmoney')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edareas')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'diyformtype')->textInput() ?>

    <?= $form->field($model, 'diyformid')->textInput() ?>

    <?= $form->field($model, 'diymode')->textInput() ?>

    <?= $form->field($model, 'dispatchtype')->textInput() ?>

    <?= $form->field($model, 'dispatchid')->textInput() ?>

    <?= $form->field($model, 'dispatchprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manydeduct')->textInput() ?>

    <?= $form->field($model, 'shorttitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saleupdate37975')->textInput() ?>

    <?= $form->field($model, 'shopid')->textInput() ?>

    <?= $form->field($model, 'allcates')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'minbuy')->textInput() ?>

    <?= $form->field($model, 'invoice')->textInput() ?>

    <?= $form->field($model, 'repair')->textInput() ?>

    <?= $form->field($model, 'seven')->textInput() ?>

    <?= $form->field($model, 'money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'minprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maxprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buyshow')->textInput() ?>

    <?= $form->field($model, 'buycontent')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'saleupdate51117')->textInput() ?>

    <?= $form->field($model, 'virtualsend')->textInput() ?>

    <?= $form->field($model, 'virtualsendcontent')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'verifytype')->textInput() ?>

    <?= $form->field($model, 'diyfields')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'diysaveid')->textInput() ?>

    <?= $form->field($model, 'diysave')->textInput() ?>

    <?= $form->field($model, 'quality')->textInput() ?>

    <?= $form->field($model, 'groupstype')->textInput() ?>

    <?= $form->field($model, 'showtotal')->textInput() ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'minpriceupdated')->textInput() ?>

    <?= $form->field($model, 'sharebtn')->textInput() ?>

    <?= $form->field($model, 'catesinit3')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'showtotaladd')->textInput() ?>

    <?= $form->field($model, 'merchid')->textInput() ?>

    <?= $form->field($model, 'checked')->textInput() ?>

    <?= $form->field($model, 'thumb_first')->textInput() ?>

    <?= $form->field($model, 'merchsale')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'catch_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'catch_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'catch_source')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saleupdate40170')->textInput() ?>

    <?= $form->field($model, 'saleupdate35843')->textInput() ?>

    <?= $form->field($model, 'labelname')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'autoreceive')->textInput() ?>

    <?= $form->field($model, 'cannotrefund')->textInput() ?>

    <?= $form->field($model, 'saleupdate33219')->textInput() ?>

    <?= $form->field($model, 'bargain')->textInput() ?>

    <?= $form->field($model, 'buyagain')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buyagain_islong')->textInput() ?>

    <?= $form->field($model, 'buyagain_condition')->textInput() ?>

    <?= $form->field($model, 'buyagain_sale')->textInput() ?>

    <?= $form->field($model, 'buyagain_commission')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'saleupdate32484')->textInput() ?>

    <?= $form->field($model, 'saleupdate36586')->textInput() ?>

    <?= $form->field($model, 'diypage')->textInput() ?>

    <?= $form->field($model, 'cashier')->textInput() ?>

    <?= $form->field($model, 'saleupdate53481')->textInput() ?>

    <?= $form->field($model, 'saleupdate30424')->textInput() ?>

    <?= $form->field($model, 'isendtime')->textInput() ?>

    <?= $form->field($model, 'usetime')->textInput() ?>

    <?= $form->field($model, 'endtime')->textInput() ?>

    <?= $form->field($model, 'merchdisplayorder')->textInput() ?>

    <?= $form->field($model, 'exchange_stock')->textInput() ?>

    <?= $form->field($model, 'exchange_postage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ispresell')->textInput() ?>

    <?= $form->field($model, 'presellprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'presellover')->textInput() ?>

    <?= $form->field($model, 'presellovertime')->textInput() ?>

    <?= $form->field($model, 'presellstart')->textInput() ?>

    <?= $form->field($model, 'preselltimestart')->textInput() ?>

    <?= $form->field($model, 'presellend')->textInput() ?>

    <?= $form->field($model, 'preselltimeend')->textInput() ?>

    <?= $form->field($model, 'presellsendtype')->textInput() ?>

    <?= $form->field($model, 'presellsendstatrttime')->textInput() ?>

    <?= $form->field($model, 'presellsendtime')->textInput() ?>

    <?= $form->field($model, 'edareas_code')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'unite_total')->textInput() ?>

    <?= $form->field($model, 'buyagain_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'threen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intervalfloor')->textInput() ?>

    <?= $form->field($model, 'intervalprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isfullback')->textInput() ?>

    <?= $form->field($model, 'isstatustime')->textInput() ?>

    <?= $form->field($model, 'statustimestart')->textInput() ?>

    <?= $form->field($model, 'statustimeend')->textInput() ?>

    <?= $form->field($model, 'nosearch')->textInput() ?>

    <?= $form->field($model, 'showsales')->textInput() ?>

    <?= $form->field($model, 'islive')->textInput() ?>

    <?= $form->field($model, 'liveprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opencard')->textInput() ?>

    <?= $form->field($model, 'cardid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'verifygoodsnum')->textInput() ?>

    <?= $form->field($model, 'verifygoodsdays')->textInput() ?>

    <?= $form->field($model, 'verifygoodslimittype')->textInput() ?>

    <?= $form->field($model, 'verifygoodslimitdate')->textInput() ?>

    <?= $form->field($model, 'minliveprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maxliveprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dowpayment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempid')->textInput() ?>

    <?= $form->field($model, 'isstoreprice')->textInput() ?>

    <?= $form->field($model, 'beforehours')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
