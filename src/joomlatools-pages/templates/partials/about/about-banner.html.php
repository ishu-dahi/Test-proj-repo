<? $banners = $article->fields->get('bhashini-banners')->value; ?>
<? foreach($banners as $slide): ?>
	<div class="container-fluid bg-primary-shade1 about-banner"
		style="background:url('<?= config()->base_url . $slide['background']; ?>'); background-repeat: no-repeat; background-size: cover;background-position: center;">
		<div class="container py-70">
			<div class="row d-lg-flex flex-align-center">
				<div class="col-xs-12 col-sm-6 about-banner-text">
					<h1 class="h1 pt-20 text-primary"><?= $slide['quote']; ?></h1>

					<div class="text-black py-30 fs-20"><?= $slide['text']; ?></div>

					<div class="pt-5">
						<? if (isset($slide['cta1-url']) && !empty($slide['cta1-url'])): ?>
							<a href="<?= $slide['cta1-url']; ?>" target="_blank" rel="noopener">
								<div class="bh-btn-primary mr-20 mb-10 bd-btn-bhasha-daan  btn-upd upd1 btn-bhashadaan-cst">
									<!--Go To Bhasha<span class="yellow">Daan</span>-->
									<?= $slide['cta1-text']; ?>
								</div>
							</a>
						<? endif; ?>

						<? if (isset($slide['cta2-url']) && !empty($slide['cta2-url'])): ?>
							<a href="<?= $slide['cta2-url']; ?>" class="bh-btn-black mb-10 btn-upd dark" target="_blank" rel="noopener">
								<?= $slide['cta2-text']; ?>
							</a>
						<? endif; ?>
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 about-banner-img">
					<img src="<?= config()->base_url . $slide['image']; ?>"
						alt="<?= $slide['quote']; ?>"
						class="img-responsive hidden-xs">
				</div>
			</div>
		</div>
	</div>
<? endforeach ?>
