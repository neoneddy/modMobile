<?php
/**
 * Build a mobile link and include the GET params
 * [[modMobileLink?
 *   &type=`full` ~ or mobile
 *   &includeGET=`1` this is default or 0
 *   &myParams=`{"name"="value"}` ~ JSON format for any addational params that you would like to have 
 *   &resourceID=`` ~ this defaults to the current page
 * ]]
 */

$type = $modx->getOption('type', $scriptProperties, 'full' );
$include_get = (boolean) $modx->getOption('includeGET', $scriptProperties, true);
$my_params = $modx->getOption('myParams', $scriptProperties, null);
$page_id = (int) $modx->getOption('resourceID', $scriptProperties, $modx->resource->get('id'));

$get_var = $modx->getOption('modmobile.get_var');

// get all params:
$params = array($get_var => $type);

if ( $include_get ) {
    // unset q and then merge
    $g = $_GET;
    if ( isset($g['q']) ) {
        unset($g['q']);
    }
    $params = array_merge($g, $params);
}
if ( !empty($my_params) ) {
    $mine = json_decode($my_params, true);
    
    if ( !is_null($mine) && is_array($mine) ) {
        $params = array_merge($params, $mine);
    }
}

$url = $modx->makeUrl($page_id, '', $params);

return $url;