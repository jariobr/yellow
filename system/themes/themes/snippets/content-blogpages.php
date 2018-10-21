<div class="breadcrambs"><?php echo $yellow->page->getExtra("breadcrumbs") ?></div>
<div class="content">
<?php $yellow->snippet("sidebar") ?>
<div class="main" role="main">
<?php if($yellow->page->isExisting("titleBlog")): ?>
<h1><?php echo $yellow->page->getHtml("titleBlog") ?></h1>
<?php endif ?>
<?php foreach($yellow->page->getPages() as $page): ?>
<?php $page->set("entryClass", "entry") ?>
<?php if($page->isExisting("tag")): ?>
<?php foreach(preg_split("/\s*,\s*/", $page->get("tag")) as $tag) { $page->set("entryClass", $page->get("entryClass")." tag-".$yellow->toolbox->normaliseArgs($tag, false)); } ?>
<?php endif ?>
<div class="<?php echo $page->getHtml("entryClass") ?>">
<div class="entry-title"><h2><a rel="bookmark" href="<?php echo $page->getLocation(true) ?>"><?php echo $page->getHtml("title") ?></a></h2></div>
<div class="entry-meta"><?php /* span class="meta-head"><?php echo $page->getDateHtml("published") ?> <?php echo $yellow->text->getHtml("blogBy") ?> <?php $authorCounter = 0; foreach(preg_split("/\s*,\s* /", $page->get("author")) as $author) { if(++$authorCounter>1) echo ", "; echo "<a href=\"".$yellow->page->getLocation(true).$yellow->toolbox->normaliseArgs("author:$author")."\">".htmlspecialchars($author)."</a>"; } ?></span */?></div>
<div class="entry-content"><?php echo $yellow->toolbox->createTextDescription($page->getContent(), 0, false, "<!--more-->", "<span class=\"btn right\"> <a href=\"".$page->getLocation(true)."\">".$yellow->text->getHtml("blogMore")."</a></span>") ?> <hr /></div>
</div>
<?php endforeach ?>
<?php $yellow->snippet("pagination", $yellow->page->getPages()) ?>
</div>
</div>
