<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ImsShopGoods;

/**
 * ImsShopGoodsSearch represents the model behind the search form of `backend\models\ImsShopGoods`.
 */
class ImsShopGoodsSearch extends ImsShopGoods
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'uniacid', 'pcate', 'ccate', 'type', 'status', 'displayorder', 'total', 'totalcnf', 'sales', 'salesreal', 'createtime', 'maxbuy', 'usermaxbuy', 'hasoption', 'dispatch', 'isnew', 'ishot', 'isdiscount', 'isrecommand', 'issendfree', 'istime', 'iscomment', 'timestart', 'timeend', 'viewcount', 'deleted', 'hascommission', 'updatetime', 'cash', 'isnodiscount', 'isverify', 'tcate', 'needfollow', 'virtual', 'nocommission', 'hidecommission', 'artid', 'isdiscount_time', 'saleupdate42392', 'ednum', 'saleupdate', 'diyformtype', 'diyformid', 'diymode', 'dispatchtype', 'dispatchid', 'manydeduct', 'saleupdate37975', 'shopid', 'minbuy', 'invoice', 'repair', 'seven', 'buyshow', 'saleupdate51117', 'virtualsend', 'verifytype', 'diysaveid', 'diysave', 'quality', 'groupstype', 'showtotal', 'minpriceupdated', 'sharebtn', 'showtotaladd', 'merchid', 'checked', 'thumb_first', 'merchsale', 'saleupdate40170', 'saleupdate35843', 'autoreceive', 'cannotrefund', 'saleupdate33219', 'bargain', 'buyagain_islong', 'buyagain_condition', 'buyagain_sale', 'saleupdate32484', 'saleupdate36586', 'diypage', 'cashier', 'saleupdate53481', 'saleupdate30424', 'isendtime', 'usetime', 'endtime', 'merchdisplayorder', 'exchange_stock', 'ispresell', 'presellover', 'presellovertime', 'presellstart', 'preselltimestart', 'presellend', 'preselltimeend', 'presellsendtype', 'presellsendstatrttime', 'presellsendtime', 'unite_total', 'intervalfloor', 'isfullback', 'isstatustime', 'statustimestart', 'statustimeend', 'nosearch', 'showsales', 'islive', 'opencard', 'verifygoodsnum', 'verifygoodsdays', 'verifygoodslimittype', 'verifygoodslimitdate', 'tempid', 'isstoreprice', 'beforehours'], 'integer'],
            [['title', 'thumb', 'unit', 'description', 'content', 'goodssn', 'productsn', 'spec', 'credit', 'thumb_url', 'taobaoid', 'taotaoid', 'taobaourl', 'share_title', 'share_icon', 'commission_thumb', 'showlevels', 'buylevels', 'showgroups', 'buygroups', 'storeids', 'noticeopenid', 'noticetype', 'followtip', 'followurl', 'ccates', 'discounts', 'pcates', 'tcates', 'cates', 'detail_logo', 'detail_shopname', 'detail_btntext1', 'detail_btnurl1', 'detail_btntext2', 'detail_btnurl2', 'detail_totaltitle', 'isdiscount_title', 'isdiscount_discounts', 'commission', 'edareas', 'shorttitle', 'allcates', 'money', 'province', 'city', 'buycontent', 'virtualsendcontent', 'diyfields', 'subtitle', 'catesinit3', 'keywords', 'catch_id', 'catch_url', 'catch_source', 'labelname', 'buyagain_commission', 'edareas_code', 'threen', 'intervalprice', 'cardid'], 'safe'],
            [['productprice', 'marketprice', 'costprice', 'originalprice', 'weight', 'commission1_rate', 'commission1_pay', 'commission2_rate', 'commission2_pay', 'commission3_rate', 'commission3_pay', 'score', 'deduct', 'deduct2', 'edmoney', 'dispatchprice', 'minprice', 'maxprice', 'buyagain', 'exchange_postage', 'presellprice', 'buyagain_price', 'liveprice', 'minliveprice', 'maxliveprice', 'dowpayment'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ImsShopGoods::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'uniacid' => $this->uniacid,
            'pcate' => $this->pcate,
            'ccate' => $this->ccate,
            'type' => $this->type,
            'status' => $this->status,
            'displayorder' => $this->displayorder,
            'productprice' => $this->productprice,
            'marketprice' => $this->marketprice,
            'costprice' => $this->costprice,
            'originalprice' => $this->originalprice,
            'total' => $this->total,
            'totalcnf' => $this->totalcnf,
            'sales' => $this->sales,
            'salesreal' => $this->salesreal,
            'createtime' => $this->createtime,
            'weight' => $this->weight,
            'maxbuy' => $this->maxbuy,
            'usermaxbuy' => $this->usermaxbuy,
            'hasoption' => $this->hasoption,
            'dispatch' => $this->dispatch,
            'isnew' => $this->isnew,
            'ishot' => $this->ishot,
            'isdiscount' => $this->isdiscount,
            'isrecommand' => $this->isrecommand,
            'issendfree' => $this->issendfree,
            'istime' => $this->istime,
            'iscomment' => $this->iscomment,
            'timestart' => $this->timestart,
            'timeend' => $this->timeend,
            'viewcount' => $this->viewcount,
            'deleted' => $this->deleted,
            'hascommission' => $this->hascommission,
            'commission1_rate' => $this->commission1_rate,
            'commission1_pay' => $this->commission1_pay,
            'commission2_rate' => $this->commission2_rate,
            'commission2_pay' => $this->commission2_pay,
            'commission3_rate' => $this->commission3_rate,
            'commission3_pay' => $this->commission3_pay,
            'score' => $this->score,
            'updatetime' => $this->updatetime,
            'cash' => $this->cash,
            'isnodiscount' => $this->isnodiscount,
            'isverify' => $this->isverify,
            'tcate' => $this->tcate,
            'needfollow' => $this->needfollow,
            'deduct' => $this->deduct,
            'virtual' => $this->virtual,
            'nocommission' => $this->nocommission,
            'hidecommission' => $this->hidecommission,
            'artid' => $this->artid,
            'isdiscount_time' => $this->isdiscount_time,
            'saleupdate42392' => $this->saleupdate42392,
            'deduct2' => $this->deduct2,
            'ednum' => $this->ednum,
            'saleupdate' => $this->saleupdate,
            'edmoney' => $this->edmoney,
            'diyformtype' => $this->diyformtype,
            'diyformid' => $this->diyformid,
            'diymode' => $this->diymode,
            'dispatchtype' => $this->dispatchtype,
            'dispatchid' => $this->dispatchid,
            'dispatchprice' => $this->dispatchprice,
            'manydeduct' => $this->manydeduct,
            'saleupdate37975' => $this->saleupdate37975,
            'shopid' => $this->shopid,
            'minbuy' => $this->minbuy,
            'invoice' => $this->invoice,
            'repair' => $this->repair,
            'seven' => $this->seven,
            'minprice' => $this->minprice,
            'maxprice' => $this->maxprice,
            'buyshow' => $this->buyshow,
            'saleupdate51117' => $this->saleupdate51117,
            'virtualsend' => $this->virtualsend,
            'verifytype' => $this->verifytype,
            'diysaveid' => $this->diysaveid,
            'diysave' => $this->diysave,
            'quality' => $this->quality,
            'groupstype' => $this->groupstype,
            'showtotal' => $this->showtotal,
            'minpriceupdated' => $this->minpriceupdated,
            'sharebtn' => $this->sharebtn,
            'showtotaladd' => $this->showtotaladd,
            'merchid' => $this->merchid,
            'checked' => $this->checked,
            'thumb_first' => $this->thumb_first,
            'merchsale' => $this->merchsale,
            'saleupdate40170' => $this->saleupdate40170,
            'saleupdate35843' => $this->saleupdate35843,
            'autoreceive' => $this->autoreceive,
            'cannotrefund' => $this->cannotrefund,
            'saleupdate33219' => $this->saleupdate33219,
            'bargain' => $this->bargain,
            'buyagain' => $this->buyagain,
            'buyagain_islong' => $this->buyagain_islong,
            'buyagain_condition' => $this->buyagain_condition,
            'buyagain_sale' => $this->buyagain_sale,
            'saleupdate32484' => $this->saleupdate32484,
            'saleupdate36586' => $this->saleupdate36586,
            'diypage' => $this->diypage,
            'cashier' => $this->cashier,
            'saleupdate53481' => $this->saleupdate53481,
            'saleupdate30424' => $this->saleupdate30424,
            'isendtime' => $this->isendtime,
            'usetime' => $this->usetime,
            'endtime' => $this->endtime,
            'merchdisplayorder' => $this->merchdisplayorder,
            'exchange_stock' => $this->exchange_stock,
            'exchange_postage' => $this->exchange_postage,
            'ispresell' => $this->ispresell,
            'presellprice' => $this->presellprice,
            'presellover' => $this->presellover,
            'presellovertime' => $this->presellovertime,
            'presellstart' => $this->presellstart,
            'preselltimestart' => $this->preselltimestart,
            'presellend' => $this->presellend,
            'preselltimeend' => $this->preselltimeend,
            'presellsendtype' => $this->presellsendtype,
            'presellsendstatrttime' => $this->presellsendstatrttime,
            'presellsendtime' => $this->presellsendtime,
            'unite_total' => $this->unite_total,
            'buyagain_price' => $this->buyagain_price,
            'intervalfloor' => $this->intervalfloor,
            'isfullback' => $this->isfullback,
            'isstatustime' => $this->isstatustime,
            'statustimestart' => $this->statustimestart,
            'statustimeend' => $this->statustimeend,
            'nosearch' => $this->nosearch,
            'showsales' => $this->showsales,
            'islive' => $this->islive,
            'liveprice' => $this->liveprice,
            'opencard' => $this->opencard,
            'verifygoodsnum' => $this->verifygoodsnum,
            'verifygoodsdays' => $this->verifygoodsdays,
            'verifygoodslimittype' => $this->verifygoodslimittype,
            'verifygoodslimitdate' => $this->verifygoodslimitdate,
            'minliveprice' => $this->minliveprice,
            'maxliveprice' => $this->maxliveprice,
            'dowpayment' => $this->dowpayment,
            'tempid' => $this->tempid,
            'isstoreprice' => $this->isstoreprice,
            'beforehours' => $this->beforehours,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'thumb', $this->thumb])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'goodssn', $this->goodssn])
            ->andFilterWhere(['like', 'productsn', $this->productsn])
            ->andFilterWhere(['like', 'spec', $this->spec])
            ->andFilterWhere(['like', 'credit', $this->credit])
            ->andFilterWhere(['like', 'thumb_url', $this->thumb_url])
            ->andFilterWhere(['like', 'taobaoid', $this->taobaoid])
            ->andFilterWhere(['like', 'taotaoid', $this->taotaoid])
            ->andFilterWhere(['like', 'taobaourl', $this->taobaourl])
            ->andFilterWhere(['like', 'share_title', $this->share_title])
            ->andFilterWhere(['like', 'share_icon', $this->share_icon])
            ->andFilterWhere(['like', 'commission_thumb', $this->commission_thumb])
            ->andFilterWhere(['like', 'showlevels', $this->showlevels])
            ->andFilterWhere(['like', 'buylevels', $this->buylevels])
            ->andFilterWhere(['like', 'showgroups', $this->showgroups])
            ->andFilterWhere(['like', 'buygroups', $this->buygroups])
            ->andFilterWhere(['like', 'storeids', $this->storeids])
            ->andFilterWhere(['like', 'noticeopenid', $this->noticeopenid])
            ->andFilterWhere(['like', 'noticetype', $this->noticetype])
            ->andFilterWhere(['like', 'followtip', $this->followtip])
            ->andFilterWhere(['like', 'followurl', $this->followurl])
            ->andFilterWhere(['like', 'ccates', $this->ccates])
            ->andFilterWhere(['like', 'discounts', $this->discounts])
            ->andFilterWhere(['like', 'pcates', $this->pcates])
            ->andFilterWhere(['like', 'tcates', $this->tcates])
            ->andFilterWhere(['like', 'cates', $this->cates])
            ->andFilterWhere(['like', 'detail_logo', $this->detail_logo])
            ->andFilterWhere(['like', 'detail_shopname', $this->detail_shopname])
            ->andFilterWhere(['like', 'detail_btntext1', $this->detail_btntext1])
            ->andFilterWhere(['like', 'detail_btnurl1', $this->detail_btnurl1])
            ->andFilterWhere(['like', 'detail_btntext2', $this->detail_btntext2])
            ->andFilterWhere(['like', 'detail_btnurl2', $this->detail_btnurl2])
            ->andFilterWhere(['like', 'detail_totaltitle', $this->detail_totaltitle])
            ->andFilterWhere(['like', 'isdiscount_title', $this->isdiscount_title])
            ->andFilterWhere(['like', 'isdiscount_discounts', $this->isdiscount_discounts])
            ->andFilterWhere(['like', 'commission', $this->commission])
            ->andFilterWhere(['like', 'edareas', $this->edareas])
            ->andFilterWhere(['like', 'shorttitle', $this->shorttitle])
            ->andFilterWhere(['like', 'allcates', $this->allcates])
            ->andFilterWhere(['like', 'money', $this->money])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'buycontent', $this->buycontent])
            ->andFilterWhere(['like', 'virtualsendcontent', $this->virtualsendcontent])
            ->andFilterWhere(['like', 'diyfields', $this->diyfields])
            ->andFilterWhere(['like', 'subtitle', $this->subtitle])
            ->andFilterWhere(['like', 'catesinit3', $this->catesinit3])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'catch_id', $this->catch_id])
            ->andFilterWhere(['like', 'catch_url', $this->catch_url])
            ->andFilterWhere(['like', 'catch_source', $this->catch_source])
            ->andFilterWhere(['like', 'labelname', $this->labelname])
            ->andFilterWhere(['like', 'buyagain_commission', $this->buyagain_commission])
            ->andFilterWhere(['like', 'edareas_code', $this->edareas_code])
            ->andFilterWhere(['like', 'threen', $this->threen])
            ->andFilterWhere(['like', 'intervalprice', $this->intervalprice])
            ->andFilterWhere(['like', 'cardid', $this->cardid]);

        return $dataProvider;
    }
}
