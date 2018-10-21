<?php
// Quotes page plugin
// Copyright (c) 2017 Steffen Schultz 
// This file may be used and distributed under the terms of the public license.

class YellowQuotes
{
	const VERSION = "0.7.1";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		$this->yellow->config->setDefault("quotesLocation", "/quotes/");
		$this->yellow->config->setDefault("quotesPagesMax", "1");
		$this->yellow->config->setDefault("quotesMode", "0");
	}

	// Handle page content parsing of custom block
	function onParseContentBlock($page, $name, $text, $shortcut)
	{
		$output = NULL;
		if($name=="quotes" && $shortcut)
		{
			list($location, $pagesMax, $mode) = $this->yellow->toolbox->getTextArgs($text);
			if(empty($location)) $location = $this->yellow->config->get("quotesLocation");
			if(strempty($pagesMax)) $pagesMax = $this->yellow->config->get("quotesPagesMax");
			if(strempty($mode)) $mode = $this->yellow->config->get("quotesMode");
			$this->yellow->page->setHeader("Cache-Control", "no-store, no-cache, must-revalidate");
			$output .= "<div class=\"".$name."\">\n";
			if($mode == "0") {
				$parent = $this->yellow->pages->find($location);
				$pages = $parent ? $parent->getChildren(true) : $this->yellow->pages->clean();
				foreach($pages->shuffle()->limit($pagesMax) as $page) {
					$output .= "<h2>".$page->getHtml("title")."</h2>\n";
					$output .= $page->getContent();
					$output .= $page->getSidebar();
				} 
			} else {
				$output .= "<ul>\n";
				$parent = $this->yellow->pages->find($location);
				$pages = $parent ? $parent->getChildren() : $this->yellow->pages->clean();
				foreach($pages->shuffle()->limit($pagesMax) as $page) {
					$output .= "<li><a href=\"".$page->getUrl()."\">".$page->getHtml("title")."</a></li>\n";
				}
				$output .= "</ul>\n";
			}
			
			$output .= "</div>\n";
		}
		return $output;
	}
}

$yellow->plugins->register("quotes", "YellowQuotes", YellowQuotes::VERSION);
?>