<div class="breadcrambs"><?php echo $yellow->page->getExtra("breadcrumbs") ?></div>
<div class="content">
<?php $yellow->snippet("sidebar") ?>
<div class="main" role="main">
<?php $yellow->page->set("entryClass", "entry") ?>
<?php if($yellow->page->isExisting("tag")): ?>
<?php foreach(preg_split("/\s*,\s*/", $yellow->page->get("tag")) as $tag) { $yellow->page->set("entryClass", $yellow->page->get("entryClass")." tag-".$yellow->toolbox->normaliseArgs($tag, false)); } ?>
<?php endif ?>
<div class="<?php echo $yellow->page->getHtml("entryClass") ?>">
<div class="entry-title"><h2><?php echo $yellow->page->getHtml("titleContent") ?></h2></div>
<div class="entry-meta"><span class="meta-head"><?php echo $yellow->page->getDateHtml("published") ?> <?php echo $yellow->text->getHtml("blogBy") ?> <?php $authorCounter = 0; foreach(preg_split("/\s*,\s*/", $yellow->page->get("author")) as $author) { if(++$authorCounter>1) echo ", "; echo "<a href=\"".$yellow->page->getPage("blog")->getLocation(true).$yellow->toolbox->normaliseArgs("author:$author")."\">".htmlspecialchars($author)."</a>"; } ?></span></div>
<div class="entry-content"><?php echo $yellow->page->getContent() ?></div>
<?php echo $yellow->page->getExtra("links") ?>
<?php if($yellow->page->isExisting("tag")): ?>
<div class="entry-tags">
<span class="meta-tags"><?php echo $yellow->text->getHtml("blogTag") ?> <?php $tagCounter = 0; foreach(preg_split("/\s*,\s*/", $yellow->page->get("tag")) as $tag) { if(++$tagCounter>1) echo ", "; echo "<a href=\"".$yellow->page->getPage("blog")->getLocation(true).$yellow->toolbox->normaliseArgs("tag:$tag")."\">".htmlspecialchars($tag)."</a>"; } ?></span>
</div>
<?php endif ?>
<?php echo $yellow->page->getExtra("comments") ?>
</div>
</div>
</div>
