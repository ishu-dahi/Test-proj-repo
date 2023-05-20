---
@route: /[lang:language]/ecosystem
@layout: /index
@collection:
    model: ext:joomla.model.articles
    state:
        published: 1
        category:  data://config/content[cat_id_ecosystem]
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

<div class="ecosystem-page" id="main-content">
<!-- Banner -->
<? if (!empty($article->fields->get('eco-banner-quote'))): ?>
<div class="col-md-12">
	<div class="row">
		<ktml:images max-width="25%" lazyload="progressive,inline">
			<?= partial('template:partials/ecosystem/eco-banner', ['article' => $article]);?>
		</ktml:images>
	</div>
</div>
<? endif; ?>

<!-- Eco Bhashini Systems -->
<? if (!empty($article->fields->get('eco-bhashini-heading'))): ?>
<div class="col-md-12">
	<div class="row">
		<ktml:images max-width="25%" lazyload="progressive,inline">
			<?= partial('template:partials/ecosystem/eco-system', ['article' => $article]);?>
		</ktml:images>
	</div>
</div>
<? endif; ?>

<!-- Testimonials -->
<? /*if (!empty($article->fields->get('testimonials-heading'))): ?>
<div class="col-md-12">
	<div class="row">
		<?= partial('template:partials/ecosystem/testimonials', ['article' => $article]);?>
	</div>
</div>
<? endif;*/ ?>
</div>
