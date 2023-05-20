<div class="col-md-12 col-sm-12">
    <div class="c-slide__section splide__track">
        <div class="c-slide__section-head commonHead">
            <div class="icon">
				<? if (!empty($article->fields->get('state-sahitya-akademi-logo')->value)): ?>
					<img src="<?= config()->base_url . $article->fields->get('state-sahitya-akademi-logo')->value; ?>" alt="hindi sahitya icon" class="u-image img-responsive">
                <? endif; ?>
            </div>
            <? if (!empty($article->fields->get('state-sahitya-akademi-introtext')->value)): ?>
				<div class="title"><?= $article->fields->get('state-sahitya-akademi-introtext')->value; ?></div>
			<? endif; ?>
            <? if (!empty($article->fields->get('state-sahitya-akademi-byline')->value)): ?>
				<div class="para"><?= $article->fields->get('state-sahitya-akademi-byline')->value; ?></div>
			<? endif; ?>
        </div>
        <div class="c-slide__section-content splide__list">
			<? $winners = $article->fields->get('award-winner')->value;
				foreach($winners as $winner):?>
					<div class="c-slide__section-item v2 splide__slide">
						<div class="main">
							<? if (isset($winner['title']) && !empty($winner['title'])): ?>
								<span class="title"><?= $winner['title']; ?></span>
							<? endif; ?>
						</div>
						<div class="info">
							<? if (isset($winner['award-for']) && !empty($winner['award-for'])): ?>
								<span class="main"><?= $winner['award-for']; ?></span>
							<? endif; ?>
							<? if (isset($winner['award-category-and-year']) && !empty($winner['award-category-and-year'])): ?>
								<span class="sub"><?= $winner['award-category-and-year']; ?></span>
							<? endif; ?>
						</div>
					</div>
			 <? endforeach ?>
        </div>
    </div>
</div>
<!--
---------------------------------------------------
------------JS for Award Winners section -------------
---------------------------------------------------
-->
<script>
document.addEventListener('DOMContentLoaded', function () { 
	var splide = new Splide('.js-sahityaSlide', {
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
