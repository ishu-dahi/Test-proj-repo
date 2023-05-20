<div class="c-slide__section splide__track">
	<div class="c-slide__section-head commonHead">
		<? if (!empty($article->fields->get('language-stats-heading')->value)): ?>
		<div class="sub-title"><?= $article->fields->get('language-stats-heading')->value; ?></div>
		<? endif; ?>
	</div>
	<div class="c-slide__section-content splide__list">
		<? $stats = $article->fields->get('language-stats')->value;
			foreach($stats as $stat):?>
			<div class="c-slide__section-item splide__slide">
				<div class="icon">
					<? if (isset($stat['image']) && !empty($stat['image'])): ?>
						<img src="<?= config()->base_url . $stat['image']; ?>" alt="indian map outline" class="u-icon img-responsive">
					<? endif; ?>
				</div>
				<div class="main">
					<? if (isset($stat['number']) && !empty($stat['number'])): ?>
						<?= $stat['number']; ?>
					<? endif; ?>

				</div>
				<div class="info">
					<? if (isset($stat['title']) && !empty($stat['title'])): ?>
						<span class="main"><?= $stat['title']; ?></span>
					<? endif; ?>
					<? if (isset($stat['source']) && !empty($stat['source'])): ?>
						<a href="<?= $stat['source-url']; ?>" target="_blank" rel="noreferrer noopener"><span class="sub"><?= $stat['source']; ?></span></a>
					<? endif; ?>
				</div>
			</div>
		<? endforeach ?>
	</div>
</div>
<!--
---------------------------------------------------
------------JS for Language platforms section -------------
---------------------------------------------------
-->
<script>
document.addEventListener('DOMContentLoaded', function () {
	var splide = new Splide('.js-infoSlide', {
		perPage: 4,
		perMove: 1,
		breakpoints: {
			567: {
				perPage: 1,
				gap: '2rem',
			},
			767: {
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
});
</script>
