<?php
/** Array of system settings for Mycomponent package
 * @package mycomponent
 * @subpackage build
 */


/* This section is ONLY for new System Settings to be added to
 * The System Settings grid. If you include existing settings,
 * they will be removed on uninstall. Existing setting can be
 * set in a script resolver (see install.script.php).
 */
$settings = array();

/* The first three are new settings */
$settings['modmobile.mobile_template']= $modx->newObject('modSystemSetting');
$settings['modmobile.mobile_template']->fromArray(array (
    'key' => 'modmobile.mobile_template',
    'value' => '0',
    'xtype' => 'textfield',
    'namespace' => 'modMobile',
    'area' => 'modMobile',
), '', true, true);


$settings['modmobile.get_var']= $modx->newObject('modSystemSetting');
$settings['modmobile.get_var']->fromArray(array (
    'key' => 'modmobile.get_var',
    'value' => 'modxSiteTemplate',
    'xtype' => 'textfield',
    'namespace' => 'modMobile',
    'area' => 'modMobile',
), '', true, true);

$settings['modmobile.use_if']= $modx->newObject('modSystemSetting');
$settings['modmobile.use_if']->fromArray(array (
    'key' => 'modmobile.use_if',
    'value' => '0',
    'xtype' => 'combo-boolean',
    'namespace' => 'modMobile',
    'area' => 'modMobile',
), '', true, true);

return $settings;