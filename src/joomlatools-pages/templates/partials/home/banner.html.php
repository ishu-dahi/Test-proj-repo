<div class="splide bd-splide-slideshow">
	<div class="splide__track">
		<ul class="splide__list">
			<? foreach($banners as $slide): ?>
				<li class="splide__slide">
					<div class="home-banner"
						<? if (isset($slide['background']) && !empty($slide['background'])): ?>
						style="background:url('<?= config()->base_url . $slide['background']; ?>'); background-repeat: no-repeat; background-size: cover;background-position: center;"
						<? endif; ?>
						>

						<div class="wpu__white_glow">
							<div class="row" style="">
								<div class="d-lg-flex flex-align-center" style="">
									<div class="col-xs-12 col-sm-6 col-md-6 home-banner-img">
										<img class="max-width-100"
											<? if (isset($slide['image']) && !empty($slide['image'])): ?>
											src="<?= config()->base_url . $slide['image']; ?>"
											<? endif; ?>
											alt="<?= $slide['text']; ?>">
									</div>

									<div class="col-xs-12 col-sm-5 col-md-5">
										<div class="banner-slide-text xs-px-15">
											<? if (isset($slide['quote-by']) && !empty($slide['quote-by'])): ?>
												<img src="<?= config()->base_url . "images/doublequots.png"; ?>" alt="quote" class="img-responsive">
											<? endif; ?>
											<blockquote class="text-blue mt-20"><?= $slide['quote']; ?></blockquote>

											<div class="lead text-black"><?= $slide['text']; ?></div>

											<? if (isset($slide['quote-by']) && !empty($slide['quote-by'])): ?>
												<h3>
													<strong><?= $slide['quote-by']; ?></strong> 
												</h3>
											<? endif; ?>

											<? if (isset($slide['quote-by-designation']) && !empty($slide['quote-by-designation'])): ?>
												<div>
													<em class="text-blue"><?= nl2br($slide['quote-by-designation']); ?></em>
												</div>
											<? endif; ?>

											<div class="pt-3">
												<ktml:modules position="pages-bhashadaan-btn">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			<? endforeach ?>
		</ul>
	</div>
</div>

<script>
document.addEventListener( 'DOMContentLoaded', function () {
	new Splide('.bd-splide-slideshow', {type: 'fade', rewind: true, autoplay: true,
		pauseOnHover: false, arrows: (<?= count($banners); ?> > 1) ? true : false,
		pagination: (<?= count($banners); ?> > 1) ? true : false,}).mount();
});
</script>
