---
@route: /[lang:language]/privacy-policy
@layout: /index
@collection:
    model: ext:joomla.model.articles
    state:
        published: 1
        category: data://config/content[cat_id_privacy_policy]
        limit: 1
@metadata:
    'og:type': article
---

<?
$article = collection();

// Set metadata
page()->title                  = $article->title;
page()->metadata->description  = $article->metadata->description;
page()->metadata->summary      = $article->metadata->description;
page()->metadata->keywords     = $article->metadata->keywords;
page()->metadata->author       = $article->metadata->author;
page()->metadata->{'og:title'} = $article->title;
page()->metadata->{'og:image'} = !empty($article->image->url) ? $article->image->url : page()->metadata->{'og:url'} . config()->page->metadata->{'og:image'};
?>

<div class="privacy-page" id="main-content">
<? if (!empty($article) && count($article)): ?>
	<div class="container">
		<div class="bd-article-content">
			<h1 class="blue-200"><? echo $article->title; ?></h1>
			<div class="bd-article-body my-30">
				<? echo $article->text; ?>
			</div>
		</div>
	</div>
<? endif; ?>
</div>
