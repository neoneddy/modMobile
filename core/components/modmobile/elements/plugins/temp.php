<?php
/*
 * modMobile plugin
 *
 * Package by: Jeroen Kenters / www.kenters.com
 * Based on code of Danny Herran (http://www.dannyherran.com/2011/02/detect-mobile-browseruser-agent-with-php-ipad-iphone-blackberry-and-others/)
 * 
 * Revised by: Joshua Gulledge
 * License: GNU GENERAL PUBLIC LICENSE Version 2, June 1991
 *
 * */

/**
 * $get_var this is the name of the value that you wish to have 
 *  retrieve weather or not the mode is mobile or full(PC).  Default is
 *  modxSiteTemplate, this is an example of what URL you would need to create
 *  like mypage.html?modxSiteTemplate=mobile
 */
$get_var = $modx->getOption('modmobile.get_var');
 
// just assigns a PlaceHolder to modmobile.get_var which can be used via an [[If]] in a template/chunck/snippet
$use_if = $modx->getOption('modmobile.use_if');

require_once MODX_CORE_PATH.'components/modMobile/model/detectmobile.class.php';

//only proceed when there is a mobile theme
if( !empty($use_if) && $use_if ) {
    $mobile = new DetectMobile();
    if ( $mobile->run() == 'mobile' ){
        $modx->setPlaceholder($get_var, 'mobile');
        $_SESSION[$get_var] = 'mobile';
    } else {
        $modx->setPlaceholder($get_var, 'full');
        $_SESSION[$get_var] = 'full';
    }
    return;
}

// get mobile theme setting
$mobile_template = $modx->getOption('modmobile.mobile_template');
//only proceed when there is a mobile theme
if( !empty($mobile_template) ) {
    $mobile = new DetectMobile();
    
    if ( $mobile->run() == 'mobile' ){
        $modx->resource->set('template', $mobile_template);
        $modx->setPlaceholder($get_var, 'mobile');
    } else {
        $modx->setPlaceholder($get_var, 'full');
    }
}
return;