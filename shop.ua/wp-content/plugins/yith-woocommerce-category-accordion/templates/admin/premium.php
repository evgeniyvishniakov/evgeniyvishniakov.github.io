<style>
    .section{
        margin-left: -20px;
        margin-right: -20px;
        font-family: "Raleway",san-serif;
    }
    .section h1{
        text-align: center;
        text-transform: uppercase;
        color: #808a97;
        font-size: 35px;
        font-weight: 700;
        line-height: normal;
        display: inline-block;
        width: 100%;
        margin: 50px 0 0;
    }
    .section ul{
        list-style-type: disc;
        padding-left: 15px;
    }
    .section:nth-child(even){
        background-color: #fff;
    }
    .section:nth-child(odd){
        background-color: #f1f1f1;
    }
    .section .section-title img{
        display: table-cell;
        vertical-align: middle;
        width: auto;
        margin-right: 15px;
    }
    .section h2,
    .section h3 {
        display: inline-block;
        vertical-align: middle;
        padding: 0;
        font-size: 24px;
        font-weight: 700;
        color: #808a97;
        text-transform: uppercase;
    }

    .section .section-title h2{
        display: table-cell;
        vertical-align: middle;
        line-height: 25px;
    }

    .section-title{
        display: table;
    }

    .section h3 {
        font-size: 14px;
        line-height: 28px;
        margin-bottom: 0;
        display: block;
    }

    .section p{
        font-size: 13px;
        margin: 25px 0;
    }
    .section ul li{
        margin-bottom: 4px;
    }
    .landing-container{
        max-width: 750px;
        margin-left: auto;
        margin-right: auto;
        padding: 50px 0 30px;
    }
    .landing-container:after{
        display: block;
        clear: both;
        content: '';
    }
    .landing-container .col-1,
    .landing-container .col-2{
        float: left;
        box-sizing: border-box;
        padding: 0 15px;
    }
    .landing-container .col-1 img{
        width: 100%;
    }
    .landing-container .col-1{
        width: 55%;
    }
    .landing-container .col-2{
        width: 45%;
    }
    .premium-cta{
        background-color: #808a97;
        color: #fff;
        border-radius: 6px;
        padding: 20px 15px;
    }
    .premium-cta:after{
        content: '';
        display: block;
        clear: both;
    }
    .premium-cta p{
        margin: 7px 0;
        font-size: 14px;
        font-weight: 500;
        display: inline-block;
        width: 60%;
    }
    .premium-cta a.button{
        border-radius: 6px;
        height: 60px;
        float: right;
        background: url(<?php echo YWCCA_ASSETS_URL?>images/upgrade.png) #ff643f no-repeat 13px 13px;
        border-color: #ff643f;
        box-shadow: none;
        outline: none;
        color: #fff;
        position: relative;
        padding: 9px 50px 9px 70px;
    }
    .premium-cta a.button:hover,
    .premium-cta a.button:active,
    .premium-cta a.button:focus{
        color: #fff;
        background: url(<?php echo YWCCA_ASSETS_URL?>images/upgrade.png) #971d00 no-repeat 13px 13px;
        border-color: #971d00;
        box-shadow: none;
        outline: none;
    }
    .premium-cta a.button:focus{
        top: 1px;
    }
    .premium-cta a.button span{
        line-height: 13px;
    }
    .premium-cta a.button .highlight{
        display: block;
        font-size: 20px;
        font-weight: 700;
        line-height: 20px;
    }
    .premium-cta .highlight{
        text-transform: uppercase;
        background: none;
        font-weight: 800;
        color: #fff;
    }

    .section.one{
        background: url(<?php echo YWCCA_ASSETS_URL ?>images/01-bg.png) no-repeat #fff; background-position: 85% 75%
    }
    .section.two{
        background: url(<?php echo YWCCA_ASSETS_URL ?>images/02-bg.png) no-repeat #fff; background-position: 85% 75%
    }
    .section.three{
        background: url(<?php echo YWCCA_ASSETS_URL ?>images/03-bg.png) no-repeat #fff; background-position: 85% 75%
    }
    .section.four{
        background: url(<?php echo YWCCA_ASSETS_URL ?>images/04-bg.png) no-repeat #fff; background-position: 85% 75%
    }
    .section.five{
        background: url(<?php echo YWCCA_ASSETS_URL ?>images/05-bg.png) no-repeat #fff; background-position: 85% 75%
    }
    .section.six{
        background: url(<?php echo YWCCA_ASSETS_URL ?>images/06-bg.png) no-repeat #fff; background-position: 85% 75%
    }

    @media (max-width: 768px) {
        .section{margin: 0}
        .premium-cta p{
            width: 100%;
        }
        .premium-cta{
            text-align: center;
        }
        .premium-cta a.button{
            float: none;
        }
    }

    @media (max-width: 480px){
        .wrap{
            margin-right: 0;
        }
        .section{
            margin: 0;
        }
        .landing-container .col-1,
        .landing-container .col-2{
            width: 100%;
            padding: 0 15px;
        }
        .section-odd .col-1 {
            float: left;
            margin-right: -100%;
        }
        .section-odd .col-2 {
            float: right;
            margin-top: 65%;
        }
    }

    @media (max-width: 320px){
        .premium-cta a.button{
            padding: 9px 20px 9px 70px;
        }

        .section .section-title img{
            display: none;
        }
    }
</style>
<div class="landing">
    <div class="section section-cta section-odd">
        <div class="landing-container">
            <div class="premium-cta">
                <p>
                    <?php echo sprintf( __('Upgrade to %1$spremium version%2$s of %1$sYITH WooCommerce category Accordion%2$s to benefit from all features!','yith-woocommerce-category-accordion'),'<span class="highlight">','</span>' );?>
                </p>
                <a href="<?php echo $this->get_premium_landing_uri() ?>" target="_blank" class="premium-cta-button button btn">
                    <span class="highlight"><?php _e('UPGRADE','yith-woocommerce-category-accordion');?></span>
                    <span><?php _e('to the premium version','yith-woocommerce-category-accordion');?></span>
                </a>
            </div>
        </div>
    </div>
    <div class="one section section-even clear">
        <h1><?php _e('Premium Features','yith-woocommerce-category-accordion');?></h1>
        <div class="landing-container">
            <div class="col-1">
                <img src="<?php echo YWCCA_ASSETS_URL ?>images/01.png" alt="Category and sublevels" />
            </div>
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YWCCA_ASSETS_URL ?>images/01-icon.png" alt="icon 01"/>
                    <h2><?php _e('Category and sublevels','yith-woocommerce-category-accordion');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('Set how many categories you want to show to your users if you don\'t want the system considers the whole list; and there\'s more!%3$sIf you have created a category hierarchic structure, with different subcategories of your site, with the %1$s"Max depth level"%2$s option you will be able to set the plugin to show only the categories of a specific hierarchic level.', 'ywcca'), '<b>', '</b>','<br>');?>
                </p>
            </div>
        </div>
    </div>
    <div class="two section section-odd clear">
        <div class="landing-container">
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YWCCA_ASSETS_URL ?>images/02-icon.png" alt="icon 02" />
                    <h2><?php _e('Tag and menu','yith-woocommerce-category-accordion');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('Not only categories: with the premium version of the plugin you can display in accordion all the %1$smenus%2$s of your site, in addition to the complete list of all %1$stags%2$s you have linked to the products of your shop. ', 'yith-woocommerce-category-accordion'), '<b>', '</b>');?>
                </p>
            </div>
            <div class="col-1">
                <img src="<?php echo YWCCA_ASSETS_URL ?>images/02.png" alt="Tag and menu" />
            </div>
        </div>
    </div>
    <div class="three section section-even clear">
        <div class="landing-container">
            <div class="col-1">
                <img src="<?php echo YWCCA_ASSETS_URL ?>images/03.png" alt="Styles" />
            </div>
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YWCCA_ASSETS_URL ?>images/03-icon.png" alt="icon 03" />
                    <h2><?php _e( '4 styles','ywcca');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('Four different configurable styles that you can assign to the plugin\'s widgets and shortcodes. %1$sDon\'t touch the code and get your result directly from the panel%2$s', 'yith-woocommerce-category-accordion'), '<b>', '</b>','<br>');?>
                </p>
            </div>
        </div>
    </div>
    <div class="four section section-odd clear">
        <div class="landing-container">
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YWCCA_ASSETS_URL ?>images/04-icon.png" alt="icon 04" />
                    <h2><?php _e('Shortcode','yith-woocommerce-category-accordion');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('Same widget features, same options, but much more freedom: %1$sadd your accordions%2$s everywhere with the shortcode. ', 'yith-woocommerce-category-accordion'), '<b>', '</b>');?>
                </p>
            </div>
            <div class="col-1">
                <img src="<?php echo YWCCA_ASSETS_URL ?>images/04.png" alt="Shortcode" />
            </div>
        </div>
    </div>
    <div class="five section section-even clear">
        <div class="landing-container">
            <div class="col-1">
                <img src="<?php echo YWCCA_ASSETS_URL ?>images/05.png" alt="Sorting" />
            </div>
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YWCCA_ASSETS_URL?>images/05-icon.png" alt="icon 05" />
                    <h2><?php _e('Sorting','yith-woocommerce-category-accordion');?></h2>
                </div>
                <p>
                    <?php echo sprintf( __('A good management of the category list must give the freedom to choose the sorting system to show the category in the page.%3$sThree different options: by %1$sID, name%2$s or %1$snumber%2$s of assigned elements','yith-woocommerce-category-accordion'),'<b>','</b>','<br>'); ?>
                </p>
            </div>
        </div>
    </div>
    <div class="six section section-odd clear">
        <div class="landing-container">
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YWCCA_ASSETS_URL ?>images/06-icon.png" alt="icon 06" />
                    <h2><?php _e('Pages and posts','yith-woocommerce-category-accordion');?></h2>
                </div>
                <p>
                    <?php echo sprintf( __( 'For each widget or shortcode you set with the premium version of the plugin, you can select the pages and posts in which you don\'t want them to appear.Moreover, the %1$s"Hide empty"%2$s option lets you decide to exclude the empty categories from the list, so there will be no categories without assigned elements.','yith-woocommerce-category-accordion' ),'<b>','</b>' ) ?>
                </p>
            </div>
            <div class="col-1">
                <img src="<?php echo YWCCA_ASSETS_URL ?>images/06.png" alt="Pages and posts" />
            </div>
        </div>
    </div>
    <div class="section section-cta section-odd">
        <div class="landing-container">
            <div class="premium-cta">
                <p>
                    <?php echo sprintf( __('Upgrade to %1$spremium version%2$s of %1$sYITH WooCommerce category Accordion%2$s to benefit from all features!','yith-woocommerce-category-accordion'),'<span class="highlight">','</span>' );?>
                </p>
                <a href="<?php echo $this->get_premium_landing_uri() ?>" target="_blank" class="premium-cta-button button btn">
                    <span class="highlight"><?php _e('UPGRADE','yith-woocommerce-category-accordion');?></span>
                    <span><?php _e('to the premium version','yith-woocommerce-category-accordion');?></span>
                </a>
            </div>
        </div>
    </div>
</div>