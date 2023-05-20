---
@route: /[lang:language]/challenges
@layout: /index
@collection:
    model: ext:joomla.model.articles
    state:
        published: 1
        category:  data://config/content[cat_id_challenges]
---

<?
$categoryDetails = collection('ext:joomla.model.categories', [
	'published' => 1,
	'id'  => data('global://config/content')->get('cat_id_challenges')
]);

// Set metadata details
page()->title = $categoryDetails->title;
page()->metadata->summary = $categoryDetails->metadata->description;
page()->metadata->author  = $categoryDetails->metadata->author;
page()->metadata->{'og:title'} = $categoryDetails->title;
page()->metadata->{'og:image'} = !empty($categoryDetails->image->url) ? $categoryDetails->image->url : page()->metadata->{'og:url'} . config()->page->metadata->{'og:image'};
?>

<div class="challanges-page" id="main-content">
	<!--
	---------------------------------------------------
	--------------------- Banner ----------------------
	---------------------------------------------------
	-->
	<div class="col-md-12">
		<div class="row">
			<div class="container-fluid bg-primary-shade1 about-banner" style="background:url('../images/banners/challenges-banner/challenge-banner.png'); background-repeat: no-repeat; background-size: cover;background-position: center;">
				<div class="container py-70">
					<div class="row d-lg-flex flex-align-center">
						<div class="col-xs-12 col-sm-6">
							<div class="height-100 hidden-xs"></div>
								<ktml:modules position="pages-challenges-banner">
							<div class="height-300 hidden-xs"></div>
						</div>

						<div class="col-xs-12 col-sm-6 about-banner-img">
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--
		---------------------------------------------------
		--------------------- Challenges ----------------------
		---------------------------------------------------
		-->
		<div class="container py-50">
			<div class="pb-30 h3 text-black text-center block-heading">Challenges</div>

			<div class="models text-center flex-container">
				<? foreach(collection() as $article): ?>
					<div class="col-sm-6 col-md-4 text-black d-flex">
						<div class="card-bx fs-14 p-0 challenge-card-bg">
							<div class="ctf-imag-holder"
								style="background:url('<?= $article->image->url ?>');background-repeat: no-repeat; background-size: cover;background-position: center;height:320px;">
								<span class="cta-status cta-<?= $article->fields->get('challenge-status'); ?>"><?= $article->fields->get('challenge-status'); ?></span>
							</div>

							<div class="p-10">
								<div class="section-title h7 text-uppercase text-brown"><?= $article->title; ?></div>

								<div class="cta-last-date py-10">Last Date: <?= $article->fields->get('challenge-last-date'); ?></div>

								<? if(($article->fields->get('challenge-status')->value)=='open')
								{
									if(!empty($article->fields->get('challenge-cta1-url')))
									{
										?>
										<div class="cft-action-button mt-10">
											<a class="btn btn-secondary min-width-230"
												target="_blank"
												rel="noopener"
												href="<?= $article->fields->get('challenge-cta1-url')->value; ?>"><?= $article->fields->get('challenge-cta1-text'); ?></a>
										</div>
										<?
									}
								}
								else
								{
									if (!empty($article->fields->get('challenge-cta2-url')))
									{
										?>
										<div class="cta-action-button mt-10">
											<a class="btn btn-secondary min-width-230"
												target="_blank"
												rel="noopener"
												href="<?= $article->fields->get('challenge-cta2-url')->value; ?>"><?= $article->fields->get('challenge-cta2-text'); ?></a>
										</div>
										<?
									}
								}
								?>
							</div>
						</div>
					</div>
				<? endforeach; ?>
			</div>

			<div class="height-100 hidden-xs"></div>
		</div>
	</div>
</div>