---
@route: /[lang:language]/challengeround
@layout: /index
@collection:
    model: ext:joomla.model.articles
    state:
        published: 1
        category:  data://config/content[cat_id_challenge-round]
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

<div class="challanges-page" id="main-content">  
    <div class="c-banner" style="background: url(../../../images/states/backgrounds/challenge-bnr-bg.jpg);">
        <div class="container">
			<div class="row">
                <ktml:images max-width="25%" lazyload="progressive,inline">
					<?= partial('template:partials/challengeround/banner', ['article' => $article]);?>
				</ktml:images>,
			</div>
        </div>
    </div>
    <ktml:images max-width="25%" lazyload="progressive,inline">
        <?= partial('template:partials/challengeround/challenges', ['article' => $article]);?>
    </ktml:images>,
</div>
