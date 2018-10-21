<?php
// GAnalytics plugin, https://github.com/datenstrom/yellow-plugins/tree/master/ganalytics
// Copyright (c) 2013-2017 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.
/*
Autor: Ami Swami
Install: Put ganalytics.php in plugin directory
Configure: Add in the config.ini file the google analytics code, for example: 

Facebook: 
FacebookId: 
Twitter: 
metaGoogle: 
metaMsn: 
metaYandex: 
Googleplus:
Googlepage: 

*/

class YellowGAnalytics
{
	const VERSION = "0.7.1";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		//$this->yellow->config->setDefault("gaTrackingId", "");
		$this->yellow->config->setDefault("metaMsn", " ");
		$this->yellow->config->setDefault("metaGoogle", "");
		$this->yellow->config->setDefault("metaYandex", "");
		$this->yellow->config->setDefault("facebookId", "");	
		$this->yellow->config->setDefault("facebook", "");
		$this->yellow->config->setDefault("googlePage", "");
		$this->yellow->config->setDefault("googlePlus", "");	
	}
	
	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = NULL;
		if($name=="header")
		{
			/*$gaId = $this->yellow->config->get("gaTrackingId");
			if(empty($url)) $url = $this->yellow->toolbox->getServerUrl();
			$output = "<script>\n";
			$output .= "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');\n";
			$output .= "ga('create', '".strencode($gaId)."', 'auto');\n";
			$output .= "ga('send', 'pageview');\n";
			$output .= "</script>";		*/	
			
			$msnId = $this->yellow->config->get("metaMsn");
			$output .= "<meta name=\"msvalidate.01\" content=\"".strencode($msnId)."\" />\n";
			$googId = $this->yellow->config->get("metaGoogle");
			$output .= "<meta name=\"google-site-verification\" content=\"".strencode($googId)."\" />\n";
			$yanId = $this->yellow->config->get("metaYandex");
			$output .= "<meta name=\"yandex-verification\" content=\"".strencode($yanId)."\" />\n";
			$fbId = $this->yellow->config->get("facebookId");
			$output .= "<meta property=\"fb:app_id\" content=\"".strencode($fbId)."\" />\n";
			$fbadminId = $this->yellow->config->get("facebook");
			$output .= "<meta property=\"fb:admins\" content=\"".strencode($fbadminId)."\" />\n";
			$gPage = $this->yellow->config->get("googlePage");
			$output .= "<link rel=\"publisher\" href=\"https://plus.google.com/".strencode($gPage)."\" />\n";
			$gPlus = $this->yellow->config->get("googlePlus");
			$output .= "<link rel=\"author\" href=\"https://plus.google.com/".strencode($gPlus)."\" />\n";
		}
		return $output;		
	}
}

$yellow->plugins->register("ganalytics", "YellowGAnalytics", YellowGAnalytics::VERSION);
?>