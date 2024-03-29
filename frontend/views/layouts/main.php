<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--<html lang="en">-->
<html lang="<?= Yii::$app->language ?>">

<head>
<!--    <meta charset="utf-8">-->
    <meta charset="<?= Yii::$app->charset ?>">
<!--    <title>MaxiBiz Bootstrap Business Template</title>-->
    <title><?= Html::encode($this->title) .Yii::$app->name ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>
<body>
<div class="topbar clearfix">
    <div class="container">

        <div class="col-lg-12 text-right">
            <div class="social_buttons">
                <div style="height: 10px"></div>
<!--                <a href="#" style="width: 10%;"><small>微信下单</small></a>-->
<!--               <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>-->
<!--                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>-->
<!--                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google+"><i class="fa fa-google-plus"></i></a>-->
<!--                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Dribbble"><i class="fa fa-dribbble"></i></a>-->
<!--                <a href="#" data-toggle="tooltip" data-placement="bottom" title="RSS"><i class="fa fa-rss"></i></a>-->

            </div>
        </div>
    </div>
    <!-- end container -->
</div>
<!-- end topbar -->

<header class="header">
    <div class="container">
        <div class="site-header clearfix">
            <div class="col-lg-3 col-md-3 col-sm-12 title-area">
                <div class="site-title" id="title">
                    <a href="index.html" title="">
<!--                        <h4>爱风尚<span>IFUN</span></h4>-->
                    </a>
                </div>
            </div>
            <!-- title area -->
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div id="nav" class="right">
                    <div class="container clearfix">
<!--                        <ul id="jetmenu" class="jetmenu blue">-->
<!--                            <li class="active"><a href="--><?//=Url::to(['index/index'])?><!--">首页</a>-->
<!--                            </li>-->
<!--                            <li><a href="#">公司商品</a>-->
<!--                                <ul class="dropdown">-->
<!--                                    <li><a href="about.html">About Us</a></li>-->
<!--                                    <li><a href="services.html">Services</a></li>-->
<!--                                    <li><a href="team-members.html">Team Members</a></li>-->
<!--                                    <li><a href="testimonials.html">Testimonials</a></li>-->
<!--                                    <li><a href="404.html">404 Error</a></li>-->
<!--                                    <li><a href="faq.html">FAQ Page</a></li>-->
<!--                                    <li><a href="left-sidebar.html">Left Sidebar</a></li>-->
<!--                                    <li><a href="right-sidebar.html">Right Sidebar</a></li>-->
<!--                                    <li><a href="fullwidth.html">Full Width</a></li>-->
<!--                                    <li><a href="login.html">Login</a></li>-->
<!--                                    <li><a href="register.html">Register</a></li>-->
<!--                                    <li><a href="contact.html">Contact</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li><a href="#">风尚学堂</a>-->
<!--                                <ul class="dropdown">-->
<!--                                    <li><a href="digital-download.html">Products Page</a></li>-->
<!--                                    <li><a href="single-product.html">Single Product</a></li>-->
<!--                                    <li><a href="checkout.html">Checkout</a></li>-->
<!--                                    <li><a href="account.html">Account Page</a></li>-->
<!--                                    <li><a href="support.html">Support Center</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li><a href="#">新闻发布</a>-->
<!--                                <ul class="dropdown">-->
<!--                                    <li><a href="single-portfolio-1.html">Single Portfolio 1</a></li>-->
<!--                                    <li><a href="single-portfolio-2.html">Single Portfolio 2</a></li>-->
<!--                                    <li><a href="portfolio-2.html">Portfolio (2 Columns)</a></li>-->
<!--                                    <li><a href="portfolio-3.html">Portfolio (3 Columns)</a></li>-->
<!--                                    <li><a href="gallery-portfolio.html">Gallery</a></li>-->
<!--                                    <li><a href="masonry-grid-portfolio.html">Masonry Grid Style</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li><a href="#">关于我们</a>-->
<!--                                <ul class="dropdown">-->
<!--                                    <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>-->
<!--                                    <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>-->
<!--                                    <li><a href="single-with-sidebar.html">Single with Sidebar</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                        </ul>-->
                    </div>
                </div>
                <!-- nav -->
            </div>
            <!-- title area -->
        </div>
        <!-- site header -->
    </div>
    <!-- end container -->
</header>
<!-- end header -->

<?=$content?>

<footer class="footer">
<!--    <div class="container">-->
<!--        <div class="widget col-lg-3 col-md-3 col-sm-12">-->
<!--            <h4 class="title">About us</h4>-->
<!--            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"s standard dummy text ever since the 1500s..</p>-->
<!--            <a class="button small" href="#">read more</a>-->
<!--        </div>-->
        <!-- end widget -->
<!--        <div class="widget col-lg-3 col-md-3 col-sm-12">-->
<!--            <h4 class="title">Recent Posts</h4>-->
<!--            <ul class="recent_posts">-->
<!--                <li>-->
<!--                    <a href="home1.html#">-->
<!--                        <img src="img/recent_post_01.png" alt="" />Our New Dashboard Is Here</a>-->
<!--                    <a class="readmore" href="#">read more</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="home1.html#">-->
<!--                        <img src="img/recent_post_02.png" alt="" />Design Is In The Air</a>-->
<!--                    <a class="readmore" href="#">read more</a>-->
<!--                </li>-->
<!--            </ul>-->
            <!-- recent posts -->
<!--        </div>-->
        <!-- end widget -->
<!--        <div class="widget col-lg-3 col-md-3 col-sm-12">-->
<!--            <h4 class="title">Get In Touch</h4>-->
<!--            <ul class="contact_details">-->
<!--                <li><i class="fa fa-envelope-o"></i> info@yoursite.com</li>-->
<!--                <li><i class="fa fa-phone-square"></i> +34 5565 6555</li>-->
<!--                <li><i class="fa fa-home"></i> Some Fine Address, 887, Madrid, Spain.</li>-->
<!--                <li><a href="#"><i class="fa fa-map-marker"></i> View large map</a></li>-->
<!--            </ul>-->
            <!-- contact_details -->
<!--        </div>-->
        <!-- end widget -->
<!--        <div class="widget col-lg-3 col-md-3 col-sm-12">-->
<!--            <h4 class="title">Flickr Stream</h4>-->
<!--            <ul class="flickr">-->
<!--                <li><a href="#"><img alt="" src="img/flickr_01.jpg"></a></li>-->
<!--                <li><a href="#"><img alt="" src="img/flickr_02.jpg"></a></li>-->
<!--                <li><a href="#"><img alt="" src="img/flickr_03.jpg"></a></li>-->
<!--                <li><a href="#"><img alt="" src="img/flickr_04.jpg"></a></li>-->
<!--                <li><a href="#"><img alt="" src="img/flickr_05.jpg"></a></li>-->
<!--                <li><a href="#"><img alt="" src="img/flickr_06.jpg"></a></li>-->
<!--                <li><a href="#"><img alt="" src="img/flickr_07.jpg"></a></li>-->
<!--                <li><a href="#"><img alt="" src="img/flickr_08.jpg"></a></li>-->
<!--            </ul>-->
<!--        </div>-->
        <!-- end widget -->
<!--    </div>-->
    <!-- end container -->

    <div class="copyrights">
        <div class="container">
            <div class="col-lg-6 col-md-6 col-sm-12 columns footer-left">
                <p><a href="http://beian.miit.gov.cn">京ICP备19003026号-1</a></p>
                <div class="credits">
                    <!--
                      You are NOT allowed to delete the credit link to TemplateMag with free version.
                      You can delete the credit link only if you bought the pro version.
                      Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/maxibiz-bootstrap-business-template/
                      Licensing information: https://templatemag.com/license/
                    -->
<!--                    Created with MaxiBiz template by <a href="https://templatemag.com/">TemplateMag</a>-->
                </div>
            </div>
            <!-- end widget -->
            <div class="col-lg-6 col-md-6 col-sm-12 columns text-right">
                <div class="footer-menu right">
                    <ul class="menu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="#">Sitemap</a></li>
                        <li><a href="#">Site Terms</a></li>
                        <li><a href="contact">Contact</a></li>
                    </ul>
                </div>
            </div>
            <!-- end large-6 -->
        </div>
        <!-- end container -->
    </div>
    <!-- end copyrights -->
</footer>
<!-- end footer -->
<div class="dmtop">Scroll to Top</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>