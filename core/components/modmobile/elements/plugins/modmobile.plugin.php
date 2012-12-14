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

require_once MODX_CORE_PATH.'components/modmobile/model/detectmobile.class.php';

// get mobile theme setting
$mobile_template = $modx->getOption('modmobile.mobile_template', '', 0);

$mobile = new DetectMobile();
if ( $mobile->run() == 'mobile' ){
    if( !empty($use_if) && $use_if ) {
        $modx->setPlaceholder($get_var, 'mobile');
        if ( $mobile_template > 0 ) {
            $modx->setPlaceholder('mobiletemplate', 'Set template: '.$mobile_template);
        } else {
            $modx->setPlaceholder('mobiletemplate', 'No template set');
        }
    }
    if ( $mobile_template > 0 ) {
        $modx->resource->set('template', $mobile_template);
    }
    $_SESSION[$get_var] = 'mobile';
} else {
    if( !empty($use_if) && $use_if ) {
        $modx->setPlaceholder($get_var, 'full');
        if ( $mobile_template > 0 ) {
            $modx->setPlaceholder('mobiletemplate', 'Default template ');
        } else {
            $modx->setPlaceholder('mobiletemplate', 'No template set');
        }
    }
    $_SESSION[$get_var] = 'full';
}
return;