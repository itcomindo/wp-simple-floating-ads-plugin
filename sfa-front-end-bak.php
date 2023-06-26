<?php
defined('ABSPATH') || exit;

/**
 *=========================
 *NAME: Simple Floating Ads Container
 *=========================
 */
function sfa_container()
{
    sfa_ads_position();
?>
    <div id="sfapr" class="active" <?php echo sfa_ads_position(); ?>>
        <div id="sfaclose" class="active">X</div>
        <div id="sfawr">
            <!-- Ads Content Will Show after this line -->
            <?php echo ads_type_sfa(); ?>
        </div>
    </div>
    <?php
}
add_action('wp_footer', 'sfa_container', 100);


/**
 *=========================
 *NAME: Ads Type
 *=========================
 */
function ads_type_sfa()
{
    $ads_type_sfa = carbon_get_theme_option('ads_type_sfa');
    if ($ads_type_sfa == 'single') {
        // this is for single ads
        $ads_type_single_sfa = carbon_get_theme_option('ads_type_single_sfa');
        if ($ads_type_single_sfa == 'text') {
            echo show_sfa_text_ads();
        } elseif ($ads_type_single_sfa == 'image') {
            echo show_sfa_image_ads();
        } elseif ($ads_type_single_sfa == 'adsense') {
            echo show_sfa_adsense_ads();
        } else {
            // wait
            echo 'wait';
        }
    } else {
        // this is for multiple ads
    }
}

/**
 *=========================
 *NAME: Show Single Ads for Adsense Ads Start
 *=========================
 */
function show_sfa_multiple_ads()
{
    $mulads = carbon_get_theme_option('multiple_ads_sfa');
    foreach ($mulads as $mulad) {
        // check ads tipe (text, image or adsense)
        $muladtype = $mulad['ads_type_sfa_multiple'];
        if ($muladtype == 'text') {
            $muladtexthead = $mulad['head_text_ads_sfa_multiple'];
            $muladtextcontent = $mulad['content_text_ads_sfa_multiple'];
            $muladtextbutton = $mulad['button_text_ads_sfa_multiple'];
            $muladtexturl = $mulad['url_text_ads_sfa_multiple'];
        } elseif ($muladtype == 'image') {
            // wait
        } elseif ($muladtype == 'adsense') {
            // wait
        } else {
            // wait
        }
    ?>
    <?php
    }
}

/**
 *=========================
 *NAME: Show Single Ads for Adsense Ads Start
 *=========================
 */
function show_sfa_adsense_ads()
{
    $adsense_client_id_sfa = carbon_get_theme_option('adsense_client_id_sfa');
    $adsense_data_ad_slot_sfa = carbon_get_theme_option('adsense_data_ad_slot_sfa');
    ?>
    <div class="sfatextadswr adsense">
        <!-- 460x60 Ads Fixed -->
        <ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="<?php echo $adsense_client_id_sfa; ?>" data-ad-slot="<?php echo $adsense_data_ad_slot_sfa; ?>"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <?php

}


/**
 *=========================
 *NAME: Show Single Ads for Image Ads Start
 *=========================
 */

function show_sfa_image_ads()
{
    $url_image_ads_sfa = carbon_get_theme_option('url_image_ads_sfa');
    $button_text_image_ads_sfa = carbon_get_theme_option('button_text_image_ads_sfa');
    $alt_image_ads_sfa = carbon_get_theme_option('alt_image_ads_sfa');
    $image_ads_sfa = carbon_get_theme_option('image_ads_sfa');
    if (empty($image_ads_sfa)) {
        $singleadsimageurl = plugin_dir_url(__FILE__) . 'images/sfa300x250.webp';
    ?>
        <div class="sfatextadswr relative adsimage">
            <a href="<?php echo $url_image_ads_sfa; ?>" target="_blank" rel="noopener">
                <img width="300" height="250" src="<?php echo $singleadsimageurl; ?>" alt="<?php echo $alt_image_ads_sfa; ?>" title="<?php echo $alt_image_ads_sfa; ?>">
            </a>
            <a href="<?php echo $url_image_ads_sfa; ?>" class="buttonsfa abs" title="<?php echo $alt_image_ads_sfa; ?>" target="_blank" rel="noopener">
                <?php echo $button_text_image_ads_sfa; ?>
            </a>
        </div>
    <?php
    } else {
    ?>
        <div class="sfatextadswr relative adsimage">
            <a href="<?php echo $url_image_ads_sfa; ?>" target="_blank" rel="noopener">
                <img width="300" height="250" src="<?php echo $image_ads_sfa; ?>" alt="<?php echo $alt_image_ads_sfa; ?>" title="<?php echo $alt_image_ads_sfa; ?>">
            </a>
            <a href="<?php echo $url_image_ads_sfa; ?>" class="buttonsfa abs" title="<?php echo $alt_image_ads_sfa; ?>" target="_blank" rel="noopener">
                <?php echo $button_text_image_ads_sfa; ?>
            </a>
        </div>
    <?php
    }
}



//=========================SFA Image Ads End=========================

/**
 *=========================
 *NAME: Show Single Ads For Text Ads Start
 *=========================
 */

function show_sfa_text_ads()
{
    $head_text_ads_sfa = carbon_get_theme_option('head_text_ads_sfa');
    $content_text_ads_sfa = carbon_get_theme_option('content_text_ads_sfa');
    $url_text_ads_sfa = carbon_get_theme_option('url_text_ads_sfa');
    $button_text_ads_sfa = carbon_get_theme_option('button_text_ads_sfa');
    ?>
    <div class="sfatextadswr adstext">
        <h3 class="sfaheadads"><?php echo $head_text_ads_sfa; ?></h3>
        <div class="sfacontentads"><?php echo $content_text_ads_sfa; ?></div>
        <a href="<?php echo $url_text_ads_sfa; ?>" class="buttonsfa" target="_blank" rel="noopener"><?php echo $button_text_ads_sfa; ?></a>
    </div>
<?php
}

//=========================SFA Text Ads End=========================



function sfa_ads_position()
{
    $sfaposition = carbon_get_theme_option('ads_position_sfa');
    if ($sfaposition == 'bottom-left') {
        $sfaposition = 'style="left: 0; bottom: 0;"';
    } elseif ($sfaposition == 'bottom-center') {
        $sfaposition = 'style="left: 50%; transform: translateX(-50%); bottom: 0;"';
    } elseif ($sfaposition == 'bottom-right') {
        $sfaposition = 'style="right: 0; bottom: 0;"';
    }
    return $sfaposition;
}






// foreach ($mulads as $mulad) {
//     // random mulad

//     // check ads tipe (text, image or adsense)
//     $muladtype = $mulad['ads_type_sfa_multiple'];
//     if ($muladtype == 'text') {
//         $muladtexthead = $mulad['head_text_ads_sfa_multiple'];
//         $muladtextcontent = $mulad['content_text_ads_sfa_multiple'];
//         $muladtextbutton = $mulad['button_text_ads_sfa_multiple'];
//         $muladtexturl = $mulad['url_text_ads_sfa_multiple'];
// 
?>
// <div>
    // <p>text</p>
    // </div>
// <?php
    //     } elseif ($muladtype == 'image') {
    //         // wait
    //     
    ?>
// <div>image</div>
// <?php
    //     } elseif ($muladtype == 'adsense') {
    //         // wait
    //     
    ?>
// <div>adsense</div>
// <?php
//     }
// }