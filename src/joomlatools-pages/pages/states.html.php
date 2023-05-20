---
@route: /[lang:language]/states
@layout: /index
@collection:
    model: ext:joomla.model.articles
    state:
        published: 1
        category:  data://config/content[cat_id_states_dashboard]
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

<div class="state-up" id="main-content">
	<div class="c-state" style="background: url(../../../images/states/state-list-bg.png);">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<div class="c-state__list">
						<div class="c-state__list-head">
							<div class="c-state__list-head-item">
								<div class="head__card">
									<? if (!empty($article->fields->get('state-dashboard-introtext')->value)): ?>
										<div class="title"><?= $article->fields->get('state-dashboard-introtext')->value; ?></div>
									<? endif; ?>
									<? if (!empty($article->fields->get('about-language-button-title')->value)): ?>
										<a href="<?= $article->fields->get('about-language-button-url')->value; ?>" class="c-state__button filled yellow" target="_blank" rel="noreferrer noopener"><?= $article->fields->get('about-language-button-title')->value; ?></a>
									<? endif; ?>
								</div>
								<div class="head__card">
									<select class="inputbox languagefilter filterButton" onchange="javascript:showstates(this.value);">
										<option value="all" selected="selected">All</option>
										<option value="en">English</option>
										<option value="as">অসমীয়া</option>
										<option value="bn">বাংলা</option>
										<option value="gu">ગુજરાતી</option>
										<option value="hi">हिन्दी</option>
										<option value="kn">ಕನ್ನಡ</option>
										<option value="ml">മലയാളം</option>
										<option value="mr">मराठी</option>
										<option value="od">ଓଡ଼ିଆ</option>
										<option value="pa">ਪੰਜਾਬੀ</option>
										<option value="ta">தமிழ்</option>
										<option value="te">తెలుగు</option>
									</select>
								</div>
							</div>
						</div>
						<div class="c-state__list-container">
							<div class="c-state__card colView-4">
								<? $states = $article->fields->get('states')->value;
								   foreach($states as $state):?>
									<a href="<?= config()->base_url . $state['view-button-url'];?>" class="c-state__card-item <?= $state['state-language-filter-class']; ?>">
										<? if (isset($state['state-map']) && !empty($state['state-map'])): ?>
											<div class="map" style="background:url('<?= config()->base_url . $state['state-map']; ?>'); background-repeat: no-repeat; background-position: 70% center;"></div>
										<? endif; ?>
										<div class="c-state__card-item-top">
											<? if (isset($state['state-name']) && !empty($state['state-name'])): ?>
												<div class="title"><?= $state['state-name']; ?></div>
											<? endif; ?>
											<? if (isset($state['language']) && !empty($state['language'])): ?>
												<div class="sub-title"><?= $state['language']; ?></div>
											<? endif; ?>
										</div>
										<div class="c-state__card-item-bottom">
											<div class="media">
												<? if (isset($state['monument']) && !empty($state['monument'])): ?>
													<img src="<?= config()->base_url . $state['monument']; ?>" class="u-image img-responsive" alt="<?= $state['state-name']; ?>">
												<? endif; ?> 
											</div>
										</div>
									</a>
								<? endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 
<script type="text/javascript">
function showstates(language)
{
	if (language != 'all')
	{
		jQuery("li.c-state__card-item").removeClass("show hide");
		jQuery("li.c-state__card-item").addClass("hide");
		jQuery("li.c-state__card-item."+language).addClass("show");
	}
	else
	{
		jQuery("li.c-state__card-item").removeClass("show hide");
	}
}
</script>
