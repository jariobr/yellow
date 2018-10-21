<!DOCTYPE html><html lang="<?php echo $yellow->page->getHtml("language") ?>">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control"  content="no-cache" />
<meta http-equiv="expires" content="0" />
<title><?php echo $yellow->page->getHtml("titleHeader") ?></title>
<meta content="5 days" name="revisit-after"/>
<meta charset="utf-8" />
<meta name="description" content="<?php echo $yellow->page->getHtml("titleHeader") ?> <?php echo $yellow->page->getHtml("keywords") ?> <?php echo $yellow->page->getHtml("description") ?>" />
<meta name="keywords" content="<?php echo $yellow->page->getHtml("keywords") ?>" />
<meta name="author" content="<?php echo $yellow->page->getHtml("author") ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="abstract" content="<?php echo $yellow->page->getHtml("keywords") ?> <?php echo $yellow->page->getHtml("description") ?>" />	
<meta name="DC.title" content="<?php echo $yellow->page->getHtml("titleHeader") ?>" />
<meta name="geo.placename" content="Rio de Janeiro, RJ, Brasil" />
<meta name="geo.region" content="BR-RJ" />
<meta name="geo.position" content="-22.9068470;-43.1728960" />
<meta name="ICBM" content="-22.9068470, -43.1728960" />
<?php echo $yellow->page->getExtra("header") ?>
</head>
<body>
<?php $yellow->page->set("pageClass", "page") ?>
<?php $yellow->page->set("pageClass", $yellow->page->get("pageClass")." template-".$yellow->page->get("template")) ?>
<?php if($yellow->page->get("navigation")=="navigation-sidebar") $yellow->page->setPage("sidebar", $yellow->page); ?>
<?php if($page = $yellow->pages->find($yellow->lookup->getDirectoryLocation($yellow->page->location).$yellow->page->get("sidebar"))) $yellow->page->setPage("sidebar", $page) ?>
<?php if($yellow->page->isPage("sidebar")) $yellow->page->set("pageClass", $yellow->page->get("pageClass")." with-sidebar") ?>
<div class="<?php echo $yellow->page->getHtml("pageClass") ?>">
<div class="header" role="banner">
<div class="sitename">
<h1><a href="<?php echo $yellow->page->base."/" ?>"><i class="sitename-logo"></i><?php echo $yellow->page->getHtml("sitename") ?></a></h1>
<?php if($yellow->page->isExisting("tagline")): ?><span><?php //echo $yellow->page->getHtml("tagline") ?></span><?php endif ?>
</div>
<div class="sitename-banner"></div>
<?php $yellow->snippet($yellow->page->get("navigation")) ?>
</div>
