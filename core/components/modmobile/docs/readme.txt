================================================================
    modMobile: Change template on the fly for mobile devices!

    Version: 1.0 pl
    Developed by: Jeroen Kenters / www.kenters.com
    Refactored by: Joshua Gulledge
    Based on code by: Danny Herran  / www.dannyherran.com
================================================================

Description:
This package installs a 'modMobile' plugin and a modMobile snippet. The plugin will auto detect if a user is on a mobile device.
From there you can configure a template to be used for mobile devices.  And/or the plugin can set a property value (mobile) and 
then you can use the property in your Template with the If snippet like so:
[[If?
  &subject=`[[+modxSiteTemplate]]`
  &operand=`mobile`
  &then=`do something for mobile`
]]

You can also use the snippet, and if will output if you are using mobile or full(standard) version.

Installation:
1.  Install the package through package management.
2.  Add the following setting to your context(s) under Area Lexicon of ModMobile:
    See System Settings for more info: http://rtfm.modx.com/display/revolution20/System+Settings
      A. Key: modmobile.mobile_template - note this is a change from: mobile_template
         Name: Mobile Template ID
         Field Type: Textfield
         Value: id of your mobile template (example: 2)
         Description: Assign a template to user if the user has a mobile device.  If set to 0 then no template will be switched.
      B. Key: modmobile.get_var
         Name: URL Get Varabile
         Field Type: Textfield
         Value: modxSiteTemplate
         Description: This is the name of the value that you wish to have retrieved weather or not the mode is mobile or full(PC).  Default is modxSiteTemplate, this is an example of what URL you would need to create like mypage.html?modxSiteTemplate=mobile
      C. Key: modmobile.use_if
         Name: Use [[If]]
         Field Type: Yes/No
         Description: If set to Yes, this will assign the URL Get Variable as an option/property to be used via an [[If]] in a template/chunk/snippet and will not switch templates. 
3.  Visit your site on a mobile device. The mobile template should show up

================================================================
How to use:

I take the approach that you should give the user the option if they want to see the full option or the mobile option.
And this can be achieved with this plugin.

Example 1 Using one template for mobile and full site
1. Set the modmobile.get_var to Yes
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
    Note: modxSiteTemplate is the value of modmobile.get_var and the same that you will need to send to the url to switch templates.

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
