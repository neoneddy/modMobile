<?php
/**
 * Default English Lexicon Entries for ChurchEvents
 *
 * @package churchevents
 * @subpackage lexicon
 */
/**
 * Manager:
 */
$_lang['modmobile'] = 'modMobile';
$_lang['modmobile.desc'] = 'modMobile';
$_lang['modmobile.description'] = 'modMobile';

/* Settings */
$_lang['setting_modmobile.mobile_template'] = 'Mobile Template ID';
$_lang['setting_modmobile.mobile_template_desc'] = 'Assign a template to user if the user has a mobile device.  If set to 0 then no template will be switched.';
$_lang['setting_modmobile.get_var'] = 'URL Get Varabile';
$_lang['setting_modmobile.get_var_desc'] = 'This is the name of the value that you wish to have retrieved weather or not the mode is mobile or full(PC).  Default is modxSiteTemplate, this is an example of what URL you would need to create like mypage.html?modxSiteTemplate=mobile';
$_lang['setting_modmobile.use_if'] = 'Use Placeholder';
$_lang['setting_modmobile.use_if_desc'] = 'If set to Yes, this will assign the URL Get Variable to a placeholder, [[+get_var]], which can used via in any template/chunk/snippet and will not switch templates.';