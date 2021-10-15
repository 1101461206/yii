<section id="intro">
    <div class="container">
        <div class="ror">
            <div class="col-md-8 col-md-offset-2">
                <h1><?= $info->banner_text_top ?></h1>
                <p><?= $info->banner_text_down ?></p>
            </div>
        </div>
    </div>
</section>
<section class="section1">
    <div class="container">
        <?php foreach ($circular as $k=>$v){
            ?>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="servicebox text-center">
                    <div class="service-icon">
                        <div class="dm-icon-effect-1" data-effect="slide-left">
                            <a href="<?=!empty($v->img)?$v->img:$v->link;?>" class="" data-rel="<?=empty($v->link)?'prettyPhoto':'';?>"> <i class="active dm-icon fa fa-<?=$v->fa?> fa-3x"></i> </a>
                        </div>
                        <div class="servicetitle">
                            <h4><?=$v->title?></h4>
                            <hr>
                        </div>
                        <p><?=$v->content?></p>
                    </div>
                    <!-- service-icon -->
                </div>
                <!-- servicebox -->
            </div>


            <?php
           }?>









<section class="section5">
    <div class="container">
        <div class="col-lg-6 col-md-6 col-sm-12 columns">
            <div class="widget" data-effect="slide-left">
                <img src="/upload/<?= $info->propaganda ?>" alt="">
            </div>
            <!-- end widget -->
        </div>
        <!-- large-6 -->
        <div class="col-lg-6 col-md-6 col-sm-12 columns">
            <div class="widget clearfix">
                <div class="services_lists">
                    <div class="services_lists_boxes clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="services_lists_boxes_icon" data-effect="slide-bottom">
                                <a href="#" class=""> <i
                                            class="active dm-icon-medium fa fa-<?= $info->propaganda_top_left ?> fa-2x"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <div class="servicetitle">
                                <h4><?= $info->propaganda_top_top ?></h4>
                                <hr>
                            </div>
                            <p><?= $info->propaganda_top_butter ?></p>
                        </div>
                    </div>
                    <!-- services_lists_boxes -->

                    <div class="services_lists_boxes clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="services_lists_boxes_icon" data-effect="slide-bottom">
                                <a href="#" class=""> <i
                                            class="active dm-icon-medium fa fa-<?= $info->propaganda_middle_left ?> fa-2x"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <div class="servicetitle">
                                <h4><?= $info->propaganda_middle_top ?></h4>
                                <hr>
                            </div>
                            <p><?= $info->propaganda_middle_butter ?></p>
                        </div>
                    </div>
                    <!-- services_lists_boxes -->


                    <div class="services_lists_boxes clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="services_lists_boxes_icon_none" data-effect="slide-bottom">
                                <a href="#" class=""> <i
                                            class="active dm-icon-medium fa fa-<?= $info->propaganda_down_left ?> fa-2x"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <div class="servicetitle">
                                <h4><?= $info->propaganda_down_top ?></h4>
                                <hr>
                            </div>
                            <p><?= $info->propaganda_down_butter ?></p>
                        </div>
                    </div>
                    <!-- services_lists_boxes -->

                </div>
                <!-- services_lists -->
            </div>
            <!-- end widget -->
        </div>
        <!-- large-6 -->
    </div>
    <!-- end container -->
</section>
<!-- end section2 -->

<section class="section4 text-center">
    <div class="general-title">
        <h3>我们最好的产品</h3>
        <hr>
    </div>
    <div class="portfolio-wrapper">
        <div id="owl-demo" class="owl-carousel">
            <?
              foreach ($img as $k=>$v){
                    switch ($v['img_type']){
                        case 1:
                            ?>
                            <div class="item">
                                <a data-rel="prettyPhoto" href="<?=$v['img']?>">
                                    <img class="lazyOwl" src="<?=$v['img']?>" data-src="<?=$v['img']?>" alt="" width="381" height="260">
                                    <div>
                                        <small><?=$v['img_text']?></small>
                                        <span><?=$v['img_content']?></span>

                                    </div>
                                </a>
                            </div>
                        <?php
                        break;
                        case 2:
                        ?>
                            <div class="item">
                                <a href="<?=$v['link']?>">
                                    <img class="lazyOwl" src="<?=$v['img']?>" data-src="<?=$v['img']?>" alt="">
                                    <div>
                                        <small><?=$v['img_text']?></small>
                                        <span><?=$v['img_content']?></span>
<!--                                        <i class="fa fa-link"></i>-->
                                    </div>
                                </a>
                            </div>
                        <?php
                        break;
                    }

              }
            ?>

        </div>
        <!-- end owl-demo -->
    </div>
    <!-- end portfolio-wrapper -->
    <a class="button large" href="home3.html#">查看所有商品</a>
</section>
<!-- end section1 -->

<section class="section2">
    <div class="container">
        <div class="message text-center">
            <h2 class="big-title"><?=$info->disseminate_top?></h2>
            <p class="small-title"><?=$info->disseminate_down?></p>
            <a class="button large" href="#">我是队长</a> <a class=" dmbutton large" href="#">我是广场舞者</a>
        </div>
        <!-- end message -->
    </div>
    <!-- end container -->
</section>
<!-- end section2 -->

<section class="section1 text-center">
    <div class="container">
        <div class="general-title">
            <h3>新闻资讯</h3>
            <hr>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" data-effect="slide-bottom">
                <div class="custom-box">
                    <div class="servicetitle">
                        <h4>风尚新闻</h4>
                        <hr>
                    </div>
<!--                    <div class="icn-main-container">-->
<!--                        <span class="icn-container">$25</span>-->
<!--                    </div>-->
                    <p>掌握一手资讯，了解最新活动。</p>
                    <ul class="pricing">
                        <li>150 Mb Storage</li>
                        <li>1 Domain</li>
                        <li>2 Sub Domains</li>
                        <li>3 MySQL DBs</li>
                        <li>2 Emails</li>
                        <li>WordPress Installation</li>
                        <li>24/7 Support</li>
                    </ul>
                    <a class="btn btn-primary" href="#">Order Now</a>
                </div>
                <!-- end custombox -->
            </div>
            <!-- end col-4 -->

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" data-effect="slide-bottom">
                <div class="custom-box">
                    <div class="servicetitle">
                        <h4>商品信息</h4>
                        <hr>
                    </div>
<!--                    <div class="icn-main-container">-->
<!--                        <span class="icn-container">$55</span>-->
<!--                    </div>-->
                    <p>最新商品信息</p>
                    <ul class="pricing">
                        <li>150 Mb Storage</li>
                        <li>1 Domain</li>
                        <li>2 Sub Domains</li>
                        <li>3 MySQL DBs</li>
                        <li>2 Emails</li>
                        <li>WordPress Installation</li>
                        <li>24/7 Support</li>
                    </ul>
                    <a class="btn btn-primary" href="#">Order Now</a>
                </div>
                <!-- end custombox -->
            </div>
            <!-- end col-4 -->

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" data-effect="slide-bottom">
                <div class="custom-box">
                    <div class="servicetitle">
                        <h4>风尚殿堂</h4>
                        <hr>
                    </div>
<!--                    <div class="icn-main-container">-->
<!--                        <span class="icn-container">$98</span>-->
<!--                    </div>-->
                    <p>加入风尚学堂，成为风尚精英。</p>
                    <ul class="pricing">
                        <li>150 Mb Storage</li>
                        <li>1 Domain</li>
                        <li>2 Sub Domains</li>
                        <li>3 MySQL DBs</li>
                        <li>2 Emails</li>
                        <li>WordPress Installation</li>
                        <li>24/7 Support</li>
                    </ul>
                    <a class="btn btn-primary" href="#">Order Now</a>
                </div>
                <!-- end custombox -->
            </div>
            <!-- end col-4 -->

        </div>
    </div>
    <!-- end container -->
</section>
<!-- end section1 -->

<section class="section3">
    <div class="container withpadding">
        <div class="message">
            <div class="col-lg-9 col-md-9 col-sm-9">
                <h3>Grab the attention of your customers!</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry"s standard dummy text ever since the 1500s..</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <a class="dmbutton button large pull-right" href="#"><i class="fa fa-download"></i> GET A QUOTE</a>
            </div>
        </div>
        <!-- end message -->
    </div>
    <!-- end container -->
</section>
<!-- end section3 -->