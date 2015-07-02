## MobMobile is an Extra for MODX Revolution: [modx.com](http://modx.com)
 - http://modx.com/extras/package/modmobile
 - http://rtfm.modx.com/extras/revo/modmobile

### Project status, June 4th 2015
 - Needs new project maintainer, I no longer use this method for mobile development but use RWD and mobile first approaches, client side. Server side detecting is not really needed unless you support really old browsers.
 - _build needs refactored for 2.3.*
 - The user agent detect method is outdated, nearly 4 years old: https://github.com/jgulledge19/modMobile/blob/master/core/components/modmobile/model/detectmobile.class.php
 - Might conflict with caching in 2.3.*