<?php
/*
 * modMobile snippet
 *
 * Package by: Jeroen Kenters / www.kenters.com
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
 
// just assign an option/property(user) to be used via an [[If]] in a template/chunck/snippet
$use_if = $modx->getOption('modmobile.use_if');

require_once 'components/modMobile/model/detectmobile.class.php';

//only proceed when there is a mobile theme
if( !empty($use_if) && $use_if ) {
    $mobile = new DetectMobile();
    if ( $mobile->run() == 'mobile' ){
        $modx->setOption($get_var, 'mobile');
        return 'mobile';
    } else {
        $modx->setOption($get_var, 'full');
        return 'full';
    }
}
return NULL;