<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ims_shop_goods".
 *
 * @property int $id
 * @property int|null $uniacid
 * @property int|null $pcate 一级分类ID 
 * @property int|null $ccate 二级分类ID 
 * @property int|null $type 类型 1 实体物品 2 虚拟物品 3 虚拟物品(卡密) 4 批发 10 话费流量充值 20 充值卡 
 * @property int|null $status 状态 0 下架 1 上架 2 赠品上架 
 * @property int|null $displayorder 显示顺序 
 * @property string|null $title 商品名称 
 * @property string|null $thumb 商品图
 * @property string|null $unit 商品单位
 * @property string|null $description 分享描述
 * @property string|null $content 商品详情
 * @property string|null $goodssn 商品编号
 * @property string|null $productsn 商品条码 
 * @property float|null $productprice 商品原价 
 * @property float|null $marketprice 商品现价
 * @property float|null $costprice 商品成本
 * @property float|null $originalprice  原价
 * @property int|null $total 商品库存
 * @property int|null $totalcnf 减库存方式 0 拍下减库存 1 付款减库存 2 永不减库存 
 * @property int|null $sales 已出售数 
 * @property int|null $salesreal 实际售出数 
 * @property string|null $spec 商品规格设置 
 * @property int|null $createtime 建立时间
 * @property float|null $weight 重量 
 * @property string|null $credit 购买赠送积分，如果带%号，则为按成交价比例计算 
 * @property int|null $maxbuy 单次最多购买量
 * @property int|null $usermaxbuy 用户最多购买量 
 * @property int|null $hasoption 启用商品规则 0 不启用 1 启用 
 * @property int|null $dispatch 配送
 * @property string|null $thumb_url 缩略图地址
 * @property int|null $isnew 新上 
 * @property int|null $ishot 热卖
 * @property int|null $isdiscount 促销
 * @property int|null $isrecommand 推荐
 * @property int|null $issendfree 包邮
 * @property int|null $istime 限时卖
 * @property int|null $iscomment 允许评价
 * @property int|null $timestart 限卖开始时间 
 * @property int|null $timeend 限卖结束时间 
 * @property int|null $viewcount 查看次数
 * @property int|null $deleted 是否删除
 * @property int|null $hascommission 是否有分销
 * @property float|null $commission1_rate 一级分销比率
 * @property float|null $commission1_pay 一级分销固定佣金
 * @property float|null $commission2_rate 二级分销比率
 * @property float|null $commission2_pay 二级分销固定佣金 
 * @property float|null $commission3_rate 三级分销比率 
 * @property float|null $commission3_pay 三级分销固定佣金 
 * @property float|null $score 得分
 * @property string|null $taobaoid 淘宝ID 淘宝助手 
 * @property string|null $taotaoid
 * @property string|null $taobaourl 淘宝网址 淘宝助手 
 * @property int|null $updatetime 更新时间 
 * @property string|null $share_title 分享标题
 * @property string|null $share_icon 分享图标 
 * @property int|null $cash 货到付款 1 不支持 2 支持 
 * @property string|null $commission_thumb 海报图片
 * @property int|null $isnodiscount 不参与会员折扣 
 * @property string|null $showlevels 浏览权限 
 * @property string|null $buylevels 购买权限
 * @property string|null $showgroups 会员组浏览权限
 * @property string|null $buygroups 会员组购买权限
 * @property int|null $isverify 支持线下核销 Null 0 1 不支持 2 支持 
 * @property string|null $storeids 支持门店ID 
 * @property string|null $noticeopenid 商家通知
 * @property int|null $tcate
 * @property string|null $noticetype 提醒类型
 * @property int|null $needfollow 需要关注 
 * @property string|null $followtip 关注事项 
 * @property string|null $followurl 关注地址
 * @property float|null $deduct
 * @property int|null $virtual 虚拟商品模板ID 0 多规格虚拟商品 
 * @property string|null $ccates 一级多重分类 
 * @property string|null $discounts 折扣 
 * @property int|null $nocommission 不执行分销
 * @property int|null $hidecommission 隐藏分销按钮
 * @property string|null $pcates 三级多重分类
 * @property string|null $tcates 二级多重分类
 * @property string|null $cates 多重分类数据集
 * @property int|null $artid 营销文章ID 
 * @property string|null $detail_logo 店铺LOGO 
 * @property string|null $detail_shopname 店铺名称 
 * @property string|null $detail_btntext1 按钮1名称 
 * @property string|null $detail_btnurl1 按钮1链接 默认"查看所有商品"及"默认的全部商品连接" 
 * @property string|null $detail_btntext2 按钮2名称 
 * @property string|null $detail_btnurl2 按钮2链接 默认"进店逛逛"及"默认的小店或商城连接" 
 * @property string|null $detail_totaltitle 全部宝贝x个 
 * @property string|null $isdiscount_title 促销标题
 * @property int|null $isdiscount_time 促销结束时间 
 * @property string|null $isdiscount_discounts 促销价格 数字为价格 百分数 为折扣 
 * @property string|null $commission 分销 
 * @property int|null $saleupdate42392
 * @property float|null $deduct2 余额抵扣 0 支持全额抵扣 -1 不支持余额抵扣 >0 最多抵扣 元 
 * @property int|null $ednum 单品满件包邮 0 : 不支持满件包邮 
 * @property int|null $saleupdate
 * @property float|null $edmoney 单品满额包邮 0 : 不支持满额包邮 
 * @property string|null $edareas 不参加满包邮的地区 ，0 : 不支持满件包邮 
 * @property int|null $diyformtype 自定义表单类型 0 关闭 1 附加形式 2 替换模式 
 * @property int|null $diyformid 自定义表单ID 
 * @property int|null $diymode 自定义表单模式 0 系统默认 1 点击立即购买时填写 2 确认订单时填写 
 * @property int|null $dispatchtype 配送类型 0 运费模板 1 统一邮费 
 * @property int|null $dispatchid 配送ID 
 * @property float|null $dispatchprice 统一邮费
 * @property int|null $manydeduct 多件累计抵扣积分
 * @property string|null $shorttitle  短名称 打印需要 
 * @property int|null $saleupdate37975
 * @property int|null $shopid 商户ID 
 * @property string|null $allcates
 * @property int|null $minbuy 用户单次必须购买数量 
 * @property int|null $invoice 提供发票 
 * @property int|null $repair 保修 
 * @property int|null $seven 7天无理由退换 
 * @property string|null $money 余额返现 
 * @property float|null $minprice 多规格中最小价格，无规格时显示销售价 
 * @property float|null $maxprice 多规格中最大价格，无规格时显示销售价 
 * @property string|null $province 商品所在省 如为空则显示商城所在 
 * @property string|null $city 商品所在城市 如为空则显示商城所在 
 * @property int|null $buyshow 购买后可见 0 关闭 1 开启 
 * @property string|null $buycontent 购买可见开启后的内容 
 * @property int|null $saleupdate51117
 * @property int|null $virtualsend 自动发货 0 否 1 是 ，注：自动发货后，订单自动完成 
 * @property string|null $virtualsendcontent 自动发货内容 
 * @property int|null $verifytype 核销类型 0 按订单核销 1 按次核销 2 按消费码核销 
 * @property string|null $diyfields
 * @property int|null $diysaveid
 * @property int|null $diysave
 * @property int|null $quality
 * @property int $groupstype 是否支持拼团 0 否 1 支持 
 * @property int $showtotal 显示库存 0 不显示 1 显示 
 * @property string|null $subtitle 子标题
 * @property int|null $minpriceupdated
 * @property int $sharebtn
 * @property string|null $catesinit3
 * @property int $showtotaladd 是否调整过显示库存 标识字段无用 
 * @property int|null $merchid 商户ID 
 * @property int|null $checked
 * @property int|null $thumb_first 详情页面显示首图 0 不显示 1 显示 注：首图为列表页使用，尺寸较小 
 * @property int|null $merchsale 手机端使用的价格 0 当前设置促销价格 1 商户设置促销价格 
 * @property string|null $keywords 关键词 
 * @property string|null $catch_id 抓取产品信息ID 
 * @property string|null $catch_url 抓取产品地址 
 * @property string|null $catch_source 抓取产品来源 
 * @property int|null $saleupdate40170
 * @property int|null $saleupdate35843
 * @property string|null $labelname 商品标签
 * @property int|null $autoreceive 自动收货 0 系统设置 -1 不自动收货 >0 天数 
 * @property int|null $cannotrefund 不允许退货 
 * @property int|null $saleupdate33219
 * @property int|null $bargain 砍价
 * @property float|null $buyagain 重复购买折扣 
 * @property int|null $buyagain_islong 购买一次后,以后都使用这个折扣 0 否 1 是 
 * @property int|null $buyagain_condition 使用条件 0 付款后 1 完成后 
 * @property int|null $buyagain_sale 可否使用优惠 （重复购买时,是否与其他优惠共享!其他优惠享受后,再使用这个折扣） 
 * @property string|null $buyagain_commission 复购分销 
 * @property int|null $saleupdate32484
 * @property int|null $saleupdate36586
 * @property int|null $diypage 自定义页面ID 
 * @property int|null $cashier 收银员 
 * @property int|null $saleupdate53481
 * @property int|null $saleupdate30424
 * @property int $isendtime 兑换限时 0 指定时间兑换 1 限时兑换 
 * @property int $usetime 自动使用期限 
 * @property int $endtime 使用有效期至 
 * @property int $merchdisplayorder 多商户排序 
 * @property int|null $exchange_stock 兑换库存
 * @property float $exchange_postage 兑换邮费
 * @property int $ispresell  是否预售商品
 * @property float $presellprice 预售价格 
 * @property int $presellover  预售结束
 * @property int $presellovertime  预售结束后几天转为正常销售
 * @property int $presellstart 预售开始
 * @property int $preselltimestart 预售开始时间
 * @property int $presellend 预售结束 
 * @property int $preselltimeend 预售结束时间
 * @property int $presellsendtype 发货类型 0 固定时间发货 1 购买后几天发货 
 * @property int $presellsendstatrttime 预售发货时间 
 * @property int $presellsendtime 购买后几天发货 
 * @property string $edareas_code
 * @property int $unite_total
 * @property float|null $buyagain_price
 * @property string|null $threen
 * @property int|null $intervalfloor
 * @property string|null $intervalprice
 * @property int $isfullback
 * @property int $isstatustime
 * @property int $statustimestart
 * @property int $statustimeend
 * @property int $nosearch
 * @property int $showsales 显示销量
 * @property int $islive
 * @property float $liveprice
 * @property int|null $opencard
 * @property string|null $cardid
 * @property int|null $verifygoodsnum
 * @property int|null $verifygoodsdays
 * @property int|null $verifygoodslimittype
 * @property int|null $verifygoodslimitdate
 * @property float $minliveprice
 * @property float $maxliveprice
 * @property float $dowpayment
 * @property int $tempid
 * @property int $isstoreprice
 * @property int $beforehours
 */
class ImsShopGoods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ims_shop_goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uniacid', 'pcate', 'ccate', 'type', 'status', 'displayorder', 'total', 'totalcnf', 'sales', 'salesreal', 'createtime', 'maxbuy', 'usermaxbuy', 'hasoption', 'dispatch', 'isnew', 'ishot', 'isdiscount', 'isrecommand', 'issendfree', 'istime', 'iscomment', 'timestart', 'timeend', 'viewcount', 'deleted', 'hascommission', 'updatetime', 'cash', 'isnodiscount', 'isverify', 'tcate', 'needfollow', 'virtual', 'nocommission', 'hidecommission', 'artid', 'isdiscount_time', 'saleupdate42392', 'ednum', 'saleupdate', 'diyformtype', 'diyformid', 'diymode', 'dispatchtype', 'dispatchid', 'manydeduct', 'saleupdate37975', 'shopid', 'minbuy', 'invoice', 'repair', 'seven', 'buyshow', 'saleupdate51117', 'virtualsend', 'verifytype', 'diysaveid', 'diysave', 'quality', 'groupstype', 'showtotal', 'minpriceupdated', 'sharebtn', 'showtotaladd', 'merchid', 'checked', 'thumb_first', 'merchsale', 'saleupdate40170', 'saleupdate35843', 'autoreceive', 'cannotrefund', 'saleupdate33219', 'bargain', 'buyagain_islong', 'buyagain_condition', 'buyagain_sale', 'saleupdate32484', 'saleupdate36586', 'diypage', 'cashier', 'saleupdate53481', 'saleupdate30424', 'isendtime', 'usetime', 'endtime', 'merchdisplayorder', 'exchange_stock', 'ispresell', 'presellover', 'presellovertime', 'presellstart', 'preselltimestart', 'presellend', 'preselltimeend', 'presellsendtype', 'presellsendstatrttime', 'presellsendtime', 'unite_total', 'intervalfloor', 'isfullback', 'isstatustime', 'statustimestart', 'statustimeend', 'nosearch', 'showsales', 'islive', 'opencard', 'verifygoodsnum', 'verifygoodsdays', 'verifygoodslimittype', 'verifygoodslimitdate', 'tempid', 'isstoreprice', 'beforehours'], 'integer'],
            [['content', 'thumb_url', 'showlevels', 'buylevels', 'showgroups', 'buygroups', 'storeids', 'noticetype', 'ccates', 'discounts', 'pcates', 'tcates', 'cates', 'isdiscount_discounts', 'commission', 'edareas', 'allcates', 'buycontent', 'virtualsendcontent', 'diyfields', 'catesinit3', 'labelname', 'buyagain_commission', 'edareas_code'], 'string'],
            [['productprice', 'marketprice', 'costprice', 'originalprice', 'weight', 'commission1_rate', 'commission1_pay', 'commission2_rate', 'commission2_pay', 'commission3_rate', 'commission3_pay', 'score', 'deduct', 'deduct2', 'edmoney', 'dispatchprice', 'minprice', 'maxprice', 'buyagain', 'exchange_postage', 'presellprice', 'buyagain_price', 'liveprice', 'minliveprice', 'maxliveprice', 'dowpayment'], 'number'],
            [['presellovertime', 'edareas_code'], 'required'],
            [['title'], 'string', 'max' => 100],
            [['thumb', 'credit', 'taobaoid', 'taotaoid', 'taobaourl', 'share_title', 'share_icon', 'commission_thumb', 'noticeopenid', 'followtip', 'followurl', 'detail_logo', 'detail_shopname', 'detail_btntext1', 'detail_btnurl1', 'detail_btntext2', 'detail_btnurl2', 'detail_totaltitle', 'isdiscount_title', 'shorttitle', 'money', 'province', 'city', 'subtitle', 'keywords', 'catch_id', 'catch_url', 'catch_source', 'threen', 'cardid'], 'string', 'max' => 255],
            [['unit'], 'string', 'max' => 5],
            [['description'], 'string', 'max' => 1000],
            [['goodssn', 'productsn'], 'string', 'max' => 50],
            [['spec'], 'string', 'max' => 5000],
            [['intervalprice'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uniacid' => 'Uniacid',
            'pcate' => '一级分类ID',
            'ccate' => '二级分类ID',
            'type' => '类型',
            'status' => '状态',
            'displayorder' => '显示顺序',
            'title' => '商品名称',
            'thumb' => '商品图',
            'unit' => '商品单位',
            'description' => '分享描述',
            'content' => '商品详情',
            'goodssn' => '商品编号',
            'productsn' => '商品条码',
            'productprice' => '商品原价',
            'marketprice' => '商品现价',
            'costprice' => '商品成本',
            'originalprice' => '原价',
            'total' => '商品库存',
            'totalcnf' => '减库存方式',
            'sales' => '已出售数',
            'salesreal' => '实际售出数',
            'spec' => '商品规格设置',
            'createtime' => '建立时间',
            'weight' => '重量',
            'credit' => '购买赠送积分',
            'maxbuy' => '单次最多购买量',
            'usermaxbuy' => '用户最多购买量',
            'hasoption' => '启用商品规则',
            'dispatch' => '配送',
            'thumb_url' => '缩略图地址',
            'isnew' => '新上',
            'ishot' => '热卖',
            'isdiscount' => '促销',
            'isrecommand' => '推荐',
            'issendfree' => '包邮',
            'istime' => '限时卖',
            'iscomment' => '允许评价',
            'timestart' => '限卖开始时间',
            'timeend' => '限卖结束时间',
            'viewcount' => '查看次数',
            'deleted' => '是否删除',
            'hascommission' => '是否有分销',
            'commission1_rate' => '一级分销比率',
            'commission1_pay' => '一级分销固定佣金',
            'commission2_rate' => '二级分销比率',
            'commission2_pay' => '二级分销固定佣金',
            'commission3_rate' => '三级分销比率',
            'commission3_pay' => '三级分销固定佣金 ',
            'score' => '得分',
            'taobaoid' => '淘宝ID',
            'taotaoid' => 'Taotaoid',
            'taobaourl' => '淘宝网址',
            'updatetime' => '更新时间',
            'share_title' => '分享标题',
            'share_icon' => '分享图标 ',
            'cash' => '货到付款',
            'commission_thumb' => '海报图片',
            'isnodiscount' => '不参与会员折扣',
            'showlevels' => '浏览权限',
            'buylevels' => '购买权限',
            'showgroups' => '会员组浏览权限',
            'buygroups' => '会员组购买权限',
            'isverify' => '支持线下核销',
            'storeids' => '支持门店ID',
            'noticeopenid' => '商家通知',
            'tcate' => '',
            'noticetype' => '提醒类型',
            'needfollow' => '需要关注',
            'followtip' => '关注事项',
            'followurl' => '关注地址',
            'deduct' => '积分抵扣',
            'virtual' => ' 	虚拟商品模板ID',
            'ccates' => '一级多重分类',
            'discounts' => '折扣',
            'nocommission' => '不执行分销',
            'hidecommission' => '隐藏分销按钮',
            'pcates' => '三级多重分类',
            'tcates' => '二级多重分类',
            'cates' => '多重分类数据集',
            'artid' => '营销文章ID',
            'detail_logo' => '店铺LOGO',
            'detail_shopname' => '店铺名称',
            'detail_btntext1' => '按钮1名称',
            'detail_btnurl1' => '按钮1链接',
            'detail_btntext2' => '按钮2名称',
            'detail_btnurl2' => '按钮2链接 ',
            'detail_totaltitle' => '全部宝贝x个',
            'isdiscount_title' => '促销标题',
            'isdiscount_time' => '促销结束时间',
            'isdiscount_discounts' => '促销价格 数字为价格 百分数 为折扣',
            'commission' => '分销',
            'saleupdate42392' => 'Saleupdate42392',
            'deduct2' => '余额抵扣',
            'ednum' => '单品满件包邮',
            'saleupdate' => 'Saleupdate',
            'edmoney' => '单品满额包邮',
            'edareas' => '不参加满包邮的地区 ',
            'diyformtype' => '自定义表单类型',
            'diyformid' => '自定义表单ID',
            'diymode' => '自定义表单模式',
            'dispatchtype' => '配送类型',
            'dispatchid' => '配送ID',
            'dispatchprice' => '统一邮费',
            'manydeduct' => '多件累计抵扣积分',
            'shorttitle' => '短名称',
            'saleupdate37975' => 'Saleupdate37975',
            'shopid' => '商户ID',
            'allcates' => 'Allcates',
            'minbuy' => '用户单次必须购买数量',
            'invoice' => '提供发票',
            'repair' => '保修',
            'seven' => '天无理由退换',
            'money' => '余额返现',
            'minprice' => '多规格中最小价格',
            'maxprice' => '多规格中最大价格',
            'province' => '商品所在省',
            'city' => '商品所在城市',
            'buyshow' => '购买后可见',
            'buycontent' => '购买可见开启后的内容 ',
            'saleupdate51117' => 'Saleupdate51117',
            'virtualsend' => '自动发货',
            'virtualsendcontent' => '自动发货内容',
            'verifytype' => '核销类型',
            'diyfields' => 'Diyfields',
            'diysaveid' => 'Diysaveid',
            'diysave' => 'Diysave',
            'quality' => 'Quality',
            'groupstype' => '是否支持拼团',
            'showtotal' => '显示库存',
            'subtitle' => '子标题',
            'minpriceupdated' => '是否更新过价格',
            'sharebtn' => '分享按钮链接方式',
            'catesinit3' => '是否初始化分类信息',
            'showtotaladd' => '是否调整过显示库存',
            'merchid' => '商户ID',
            'checked' => '审核状态',
            'thumb_first' => '详情页面显示首图',
            'merchsale' => '手机端使用的价格',
            'keywords' => '关键词',
            'catch_id' => '抓取产品信息ID',
            'catch_url' => '抓取产品地址',
            'catch_source' => '抓取产品来源',
            'saleupdate40170' => 'Saleupdate40170',
            'saleupdate35843' => 'Saleupdate35843',
            'labelname' => '商品标签',
            'autoreceive' => '自动收货',
            'cannotrefund' => '不允许退货',
            'saleupdate33219' => 'Saleupdate33219',
            'bargain' => '砍价',
            'buyagain' => '重复购买折扣',
            'buyagain_islong' => '购买一次后,以后都使用这个折扣',
            'buyagain_condition' => '使用条件',
            'buyagain_sale' => '可否使用优惠',
            'buyagain_commission' => '复购分销',
            'saleupdate32484' => 'Saleupdate32484',
            'saleupdate36586' => 'Saleupdate36586',
            'diypage' => '自定义页面ID',
            'cashier' => '收银员',
            'saleupdate53481' => 'Saleupdate53481',
            'saleupdate30424' => 'Saleupdate30424',
            'isendtime' => '兑换限时',
            'usetime' => '自动使用期限',
            'endtime' => '使用有效期至',
            'merchdisplayorder' => '多商户排序',
            'exchange_stock' => '兑换库存',
            'exchange_postage' => '兑换邮费',
            'ispresell' => '是否预售商品',
            'presellprice' => '预售价格',
            'presellover' => ' 预售结束',
            'presellovertime' => '预售结束后几天转为正常销售',
            'presellstart' => '预售开始',
            'preselltimestart' => '预售开始时间',
            'presellend' => '预售结束',
            'preselltimeend' => '预售结束时间',
            'presellsendtype' => '发货类型',
            'presellsendstatrttime' => '预售发货时间',
            'presellsendtime' => '购买后几天发货',
            'edareas_code' => 'Edareas Code',
            'unite_total' => 'Unite Total',
            'buyagain_price' => 'Buyagain Price',
            'threen' => 'Threen',
            'intervalfloor' => 'Intervalfloor',
            'intervalprice' => 'Intervalprice',
            'isfullback' => 'Isfullback',
            'isstatustime' => 'Isstatustime',
            'statustimestart' => 'Statustimestart',
            'statustimeend' => 'Statustimeend',
            'nosearch' => 'Nosearch',
            'showsales' => '显示销量',
            'islive' => 'Islive',
            'liveprice' => 'Liveprice',
            'opencard' => 'Opencard',
            'cardid' => 'Cardid',
            'verifygoodsnum' => 'Verifygoodsnum',
            'verifygoodsdays' => 'Verifygoodsdays',
            'verifygoodslimittype' => 'Verifygoodslimittype',
            'verifygoodslimitdate' => 'Verifygoodslimitdate',
            'minliveprice' => 'Minliveprice',
            'maxliveprice' => 'Maxliveprice',
            'dowpayment' => 'Dowpayment',
            'tempid' => 'Tempid',
            'isstoreprice' => 'Isstoreprice',
            'beforehours' => 'Beforehours',
        ];
    }
}
