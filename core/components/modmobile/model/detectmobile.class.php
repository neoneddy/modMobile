<?php

/**
 * This is a class that simply tells if a browser is on a mobile device
 */

class DetectMobile {
    /**
     * @var $get_var - this is the name of the value that you wish to have 
     *  retrieve weather or not the mode is mobile or full(PC).  Default is
     *  modxSiteTemplate, this is an example of what URL you would need to create
     *  like mypage.html?modxSiteTemplate=mobile
     */
    protected $get_var = 'modxSiteTemplate'; 
    /**
     * @params $site_mode - set the default mode: mobile or full
     */
    function __construct($get_var='modxSiteTemplate'){
        $this->get_var = $get_var;
        //
    }
    /**
     * @description run detect user preferance if the user does not have a preferance
     *      then detect if it is a mobile device
     * @return string - mobile or full
     */
    public function run(){
        $user_preferance = $this->getSitePreferance();
        if ( !empty($user_preferance)){
            return $user_preferance;
        }
        if ( $this->isMobile() ) {
            return 'mobile';
        }
        
        return 'full';
    }
    
    /**
     * @description determines if the browser is mobile and returns true if it is 
     *      and false if its mobile info cannot be found
     * 
     * @returns boolean
     */
    public function isMobile() {
        
        $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';
    
        $mobile_browser = false; //default: not mobile
        $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        
        if ( preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|BlackBerry|Android)/i', $user_agent) ) {
            $mobile_browser = true;
        } elseif((isset($_SERVER['HTTP_ACCEPT'])) and 
                (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false)){
            $mobile_browser = true;
        } elseif(isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
            $mobile_browser = true;
        } elseif(isset($_SERVER['HTTP_PROFILE'])) {
            $mobile_browser = true;
        } elseif (strpos($user_agent, 'ipad') !== false) {
            $mobile_browser = true;
        } elseif (strpos($user_agent,' ppc;')>0) {
            $mobile_browser = true;
        } elseif (strpos($user_agent,'iemobile')>0) {
            $mobile_browser = true;
        } else {
            $mobile_ua = substr($user_agent,0,4);
            $mobile_agents = array(
                            'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
                            'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
                            'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
                            'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
                            'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
                            'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
                            'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
                            'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
                            'wapr','webc','winw','winw','xda','xda-'
                            );
    
            if(in_array($mobile_ua, $mobile_agents)) {
                $mobile_browser = true;
            }
            if (strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false) {
                $mobile_browser = true;
            }
        }
        
        if (strpos($user_agent,'windows ce')>0) {
            $mobile_browser = true;
        } elseif (strpos($user_agent,'windows')>0) {
            $mobile_browser = false;
        }
        // safari Desktop browser
        if ( strpos($user_agent, 'safari') > 0  && strpos($user_agent, 'mobile') === 0 ) {
            $mobile_browser = false;
        }
        
        if ($mobile_browser) {
            setcookie($this->get_var,'mobile', time()+60*60*24*30 , '/');
            return true;
        }
        return false;
        
    }
    
    /**
     * @description gets a $_GET or cookie value if it is set to allow user to set their preferance
     * 
     * @return string - mobile/full or NULL if it is not set 
     */
    public function getSitePreferance(){
        
        if ( isset($_GET[$this->get_var]) && !empty($_GET[$this->get_var]) ) { 
            if ( $_GET[$this->get_var] == 'mobile' ) {
                setcookie($this->get_var,'mobile', time()+60*60*24*30 , '/');
                return 'mobile';
            } else {
                setcookie($this->get_var,'full', time()+60*60*24*30 , '/');
                return 'full';
            }
        } elseif( isset($_COOKIE[$this->get_var]) ) {
            return $_COOKIE[$this->get_var];
        }
        return NULL;
    }
    
}
