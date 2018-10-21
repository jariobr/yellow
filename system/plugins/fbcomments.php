<?php
// Fbcomments plugin, https://github.com/datenstrom/yellow-plugins/tree/master/fbcomments
// Copyright (c) 2013-2018 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

/*
Chek List

0. Put fbcomments.php Yellow plugin in system/plugins
1. Create and ative the Face App in https://developers.facebook.com/apps/ 
2. Add in config.ini file your App_Id 
		FbApp_id: 2000000000000000	
3. Done!	

*/

class YellowFbcomments {
    const VERSION = "0.7.4";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->config->setDefault("facebookId", "");
    }
    
    // Handle page content of custom block
    public function onParseContentBlock($page, $name, $text, $shortcut) {
        $output = null;
        if ($name=="fbcomments" && $shortcut) {
            $shortname = $this->yellow->config->get("facebookId");
            $url = $this->yellow->page->get("pageRead");
			$output = "<div id=\"fb-root\"></div>\n";
			$output .= "<script>\n";
			$output .= "(function(d, s, id) {\n";
			$output .= "var js, fjs = d.getElementsByTagName(s)[0];\n";
			$output .= "if (d.getElementById(id)) return;\n";
			$output .= "js = d.createElement(s); js.id = id;\n";
			$output .= "js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.1&appId=".strencode($shortname)."&autoLogAppEvents=1';\n";
			$output .= "fjs.parentNode.insertBefore(js, fjs);\n";
			$output .= "}(document, 'script', 'facebook-jssdk'));\n";
			$output .= "</script>\n";			
			//
			$output .= "<script>\n";
            $output .= "(function() {\n";
            $output .= "var jsf = document.createElement('script'); js.type = 'text/javascript'; js.async = true;\n";
            $output .= "jsf.src = 'https://connect.facebook.net/pt_BR/sdk.js';\n";
            $output .= "(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(jsf);\n";
            $output .= "})();\n";
            $output .= "</script>\n";
			$output .= "<div class=\"fb-comments\" data-href=\"".$page->getUrl()."\" data-width=\"100%\" data-numposts=\"5\"></div>\n";
            $output .= "<noscript>Please enable JavaScript</noscript>\n";
        }
        return $output;
    }

    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="fbcomments" || $name=="comments") {
            $output = $this->onParseContentBlock($page, "fbcomments", "", true);
        }
        return $output;
    }
}

$yellow->plugins->register("fbcomments", "YellowFbcomments", YellowFbcomments::VERSION);
