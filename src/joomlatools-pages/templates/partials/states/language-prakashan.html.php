<div class="col-md-12 col-xs-12">
	<div class="c-prkashan__head commonHead">
		<div class="title">
			<? if (!empty($article->fields->get('heading')->value)): ?>
				<?= $article->fields->get('heading')->value; ?>
			<? endif; ?>
		</div>
		<div class="para">
			<? if (!empty($article->fields->get('publication-introtext')->value)): ?>
				<?= $article->fields->get('publication-introtext')->value; ?>
			<? endif; ?>

		</div>
	</div>
	<div class="c-prkashan__container">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#ePaper">ई-पेपर</a></li>
			<li><a data-toggle="tab" href="#paTrika">पत्रिका</a></li>
		</ul>
		<div class="tab-content">
			<div id="ePaper" class="tab-pane fade in active">
				<div class="splide js-ePaperSlide">
					<div class="splide__track">
						<div class="c-media__view splide__list">
							<? $ePapers = $article->fields->get('e-paper')->value;
								foreach($ePapers as $ePaper):?>
									<div class="c-media__view-item splide__slide">
										<div class="icon">
											<? if (isset($ePaper['logo']) && !empty($ePaper['logo'])): ?>
												<img src="<?= config()->base_url . $ePaper['logo']; ?>" alt="Jagran E-Paper" class="u-icon img-responsive">
											<? endif; ?>
										</div>
										<div class="title">
											<? if (isset($ePaper['title']) && !empty($ePaper['title'])): ?>
												<?= $ePaper['title']; ?>
											<? endif; ?>
										</div>
										<div class="para">
											<? if (isset($ePaper['description']) && !empty($ePaper['description'])): ?>
												<?= $ePaper['description']; ?>
											<? endif; ?>
										</div>
										<? if (isset($ePaper['button-title']) && !empty($ePaper['button-title'])): ?>
											<a href="<?= $ePaper['url']; ?>" target="_blank" class="c-state__button" rel="noreferrer noopener"><?= $ePaper['button-title']; ?></a>
										<? endif; ?>
									</div>
							<? endforeach ?>
						</div>
					</div>
				</div>
			</div>
			<div id="paTrika" class="tab-pane fade">
				<div class="splide js-ePartrikaSlide">
					<div class="splide__track">
						<div class="c-media__view splide__list">
							<? $patrikas = $article->fields->get('patrika')->value;
								foreach($patrikas as $patrika):?>
									<div class="c-media__view-item splide__slide">
										<div class="icon">
											<? if (isset($patrika['logo']) && !empty($patrika['logo'])): ?>
												<img src="<?= config()->base_url . $patrika['logo']; ?>" alt="Jagran E-Paper" class="u-icon img-responsive">
											<? endif; ?>
										</div>
										<div class="title">
											<? if (isset($patrika['title']) && !empty($patrika['title'])): ?>
												<?= $patrika['title']; ?>
											<? endif; ?>
										</div>
										<div class="para">
											<? if (isset($patrika['description']) && !empty($patrika['description'])): ?>
												<?= $patrika['description']; ?>
											<? endif; ?>
										</div>
										<? if (isset($patrika['button-title']) && !empty($patrika['button-title'])): ?>
											<a href="<?= $patrika['url']; ?>" target="_blank" class="c-state__button" rel="noreferrer noopener"><?= $patrika['button-title']; ?></a>
										<? endif; ?>
									</div>
							<? endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="c-empty__wrap hide" style="margin-top: 40px;">
		<div class="c-empty__wrap-container">
			<div class="icon-section">
				<img src="<?= config()->base_url . "images/states/empty-icon.png"; ?>" alt="timeline" class="img-responsive">
			</div>
			<div class="content-section">
				<h4 class="title">Adding Data</h4>			
				<p class="intro">We are collecting data for this section. We will show you the section data soon.</p>					
			</div>
		</div>
	</div>
</div>
<!--
---------------------------------------------------
------------JS for Prkashn section -------------
---------------------------------------------------
-->
<script>
document.addEventListener('DOMContentLoaded', function () {
	var splide = new Splide('.js-ePaperSlide', {
		perPage: 4,
		perMove: 1,
		breakpoints: {
			567: {
				perPage: 1,
				gap: '2rem',
			},
			991: {
				perPage: 2,
				gap: '2rem',
			},
			1199: {
				perPage: 3,
				gap: '2rem',
			},
			1920: {
				perPage: 4,
				gap: '3rem',
			},
		},
	});
	splide.mount();
	var splide = new Splide('.js-ePartrikaSlide', {
		perPage: 4,
		perMove: 1,
		breakpoints: {
			567: {
				perPage: 1,
				gap: '2rem',
			},
			991: {
				perPage: 2,
				gap: '2rem',
			},
			1199: {
				perPage: 3,
				gap: '2rem',
			},
			1920: {
				perPage: 4,
				gap: '3rem',
			},
		},
	});
	splide.mount();
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		function sliderLoad()  {
			setTimeout(function() {
				splide.mount();
			},100);
		}
		sliderLoad()
	});
});
</script>
