---
@route: /[lang:language]/about
@layout: /index
@collection:
    model: ext:joomla.model.articles
    state:
        published: 1
        category:  data://config/content[cat_id_about]
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

<div class="about-page" id="main-content"> 
<!-- Banner -->
<div class="col-md-12">
	<div class="row">
		<ktml:images max-width="25%" lazyload="progressive,inline">
			<?= partial('template:partials/about/about-banner', ['article' => $article]);?>
		</ktml:images>
	</div>
</div>


<!-- Bhashini Purpose or Mission -->
<? if (!empty($article->fields->get('bhashini-mission-heading'))): ?>
<div class="col-md-12">
	<div class="row">
		<?= partial('template:partials/about/purpose', ['article' => $article]);?>
    </div>
</div>
<? endif; ?>

<!-- Infrastructure -->
<? if (!empty($article->fields->get('infra-heading'))): ?>
<div class="col-md-12">
	<div class="row">
		<?= partial('template:partials/about/infra', ['article' => $article]);?>
    </div>
</div>
<? endif; ?>

<!-- Roadmap -->
<? if (!empty($article->fields->get('bhashini-roadmap-heading'))): ?>
<div class="col-md-12">
	<div class="row">
		<?= partial('template:partials/about/roadmap', ['article' => $article]);?>
    </div>
</div>
<? endif; ?>


<!-- About ULCA -->
<? if (!empty($article->fields->get('ulca-heading'))): ?>
<div class="col-md-12 hide">
	<div class="row">
		<ktml:images max-width="25%" lazyload="progressive,inline">
			<?= partial('template:partials/about/ulca', ['article' => $article]);?>
		</ktml:images>
	</div>
</div>
<? endif; ?>

<!-- API -->
<? if (!empty($article->fields->get('api-heading'))): ?>
<div class="col-md-12 hide">
	<div class="row">
		<?= partial('template:partials/about/api', ['article' => $article]);?>
	</div>
</div>
<? endif; ?>
</div>
