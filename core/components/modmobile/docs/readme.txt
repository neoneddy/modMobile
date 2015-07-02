================================================================
    modMobile: Change template on the fly for mobile devices!

    Version: 1.0.2 pl
    Refactored and maintained by: Joshua Gulledge
    Orginally Developed by: Jeroen Kenters / www.kenters.com
    Based on code by: Danny Herran  / www.dannyherran.com
    Report issues: https://github.com/jgulledge19/modMobile/issues
================================================================

Description:
ModMobile allows you to create an adaptive design for your website.  Good article to review: http://www.lullabot.com/articles/responsive-adaptive-web-design.   
You can keep your standard template and then just create a mobile template and modmobile can send the user the correct one 
based on the device or based on their preference.  You can also hide or show parts of your template based on what version is 
being displayed, full or mobile.

Technical 
This package installs a 'modMobile' plugin and a modMobile snippet. The plugin will auto detect if a user is on a mobile device.
From there you can configure a template to be used for mobile devices.  And/or the plugin can set a placeholder and 
then you can use the property in your Template, Snippet or Chunks.

Use the If snippet like so:
[[If?
  &subject=`[[+modxSiteTemplate]]`
  &operand=`mobile`
  &then=`do something for mobile`
]]

You can also use the snippet, and if will output if you are using mobile or full(standard) version.

Installation:
1.  Install the package through package management.
2.  Now go to System -> System Settings
    a. Select modmobile
    b. enter in your mobile template ID
    
3.  Visit your site on a mobile device. The mobile template should show up

================================================================
How to use:

I take the approach that you should give the user the option if they want to see the full option or the mobile option.
And this can be achieved with this plugin.

Example 1 Using one template for mobile and full site
1. Set the USE Placeholder to Yes
    
2. Lets assume that the only difference between your standard version and the mobile version is the CSS file then 
in your template do something like this:
    [[If?
      &subject=`[[+modxSiteTemplate]]`
      &operand=`mobile`
      &then=`<link rel="stylesheet" type="text/css" media="all" href="/assets/templates/css/mobileLayout.css" />`
      &else=`<link rel="stylesheet" type="text/css" media="all" href="/assets/templates/css/commonLayout.css" />
        <!--[if IE 6]>
            <link rel="stylesheet" type="text/css" media="all" href="/assets/templates/css/ie6.css" />
        <![endif]-->`
    ]]
    Note: modxSiteTemplate is the value of modmobile.get_var and the same that you will need to send to the url to switch templates. You must also install the If extra for this to work!

3. Now just put a link in your template to the mobile version and then to the full version:
    <!-- Moblie Link -->
    <a class="mobileLink" href="[[~[[*id]]]]?modxSiteTemplate=mobile">Mobile</a>
    <!-- Back to Full site link -->
    <a href="[[~[[*id]]]]?modxSiteTemplate=full">Full Site View</a>
    
    Note this is optional but highly recommended.

Example 2 Using a separate mobile template
1. Set modmobile.mobile_template to your mobile template, like 2.

2. Now just put a link in each template corresponding to the mobile version and then to the full version:
    <!-- Moblie Link -->
    <a class="mobileLink" href="[[~[[*id]]]]?modxSiteTemplate=mobile">Mobile</a>
    <!-- Back to Full site link -->
    <a href="[[~[[*id]]]]?modxSiteTemplate=full">Full Site View</a>
    
    Note this is optional but highly recommended.
