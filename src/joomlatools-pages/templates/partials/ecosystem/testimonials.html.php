<? $testimonials = $article->fields->get('testimonials')->value; ?>
<div class="bg-blue testimonial-cover py-30">
	<div class="text-orange text-uppercase h7 text-center mt-30"><?=  $article->fields->get('testimonials-heading')->value; ?></div>

	<div class="h3 text-center text-white mb-30"><?= $article->fields->get('testimonials-title'); ?></div>

	<div id="testimonial-slider" class="splide wpu-splide-slideshow ">
		<div class="splide__track">
			<ul class="splide__list">
				<? foreach($testimonials as $test): ?>
					<li class="splide__slide">
						<div class="wpu__banner" >
							<div class="wpu__white_glow wpu__bannerpadding">
								<div class="container-fluid">
									<div class="col-xs-12">
										<div class="wpu-slide-text row">
											<div class="col-sm-2 col-md-3"></div>

											<div class="testimonial-inner col-sm-8 col-md-6">
												<div class="testimonial relative">
													<div class="testimonial-quot-img">
														<img src="<?= config()->base_url . "images/doublequots.png"; ?>"
															alt="quote"
															class="">
													</div>

													<p class="description"><?= $test['testimonials-text']; ?></p>

													<br>
													<hr>

													<span class="post"></span>

													<br>

													<h3 class="title font-600">
														<?= $test['testimonials-quote-by']; ?>
													</h3>

													<h6 class="text-blue font-300">
														<? if (isset($test['testimonials-designation']) && !empty($test['testimonials-designation'])): ?>
															<?= $test['testimonials-designation']; ?>
														<? endif; ?>
													</h6>

													<br>
													<br>
												</div>
											</div>

											<div class="col-sm-2 col-md-3"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				<? endforeach ?>
			</ul>
		</div>

		<ul class="splide__pagination">
			<? foreach($testimonials as $img): ?>
				<? if (!empty($test['testimonials-image'])): ?>
				<li class="testimonial-images">
					<button class="splide__pagination__page" type="button" aria-controls="" aria-label="">
						<img src="<?= config()->base_url . $img['testimonials-image']; ?>"
							class="img-responsive ">
					</button>
				</li>
				<? endif; ?>
			<? endforeach ?>

			<!--
			<li>
				<button class="splide__pagination__page" type="button" aria-controls="testimonial-slider-slide01" aria-label="Go to slide 1"></button>
			</li>
			<li>
				<button class="splide__pagination__page" type="button" aria-controls="testimonial-slider-slide02" aria-label="Go to slide 2"></button>
			</li>
			<li>
				<button class="splide__pagination__page is-active" type="button" aria-controls="testimonial-slider-slide03" aria-label="Go to slide 3" aria-current="true"></button>
			</li>
			-->
		</ul>
	</div>
</div>

<script>
var testimonialCount = "<?= count($testimonials); ?>";

document.addEventListener('DOMContentLoaded', function () {
	new Splide('.wpu-splide-slideshow', {type: 'fade', rewind: true, autoplay: true,
		pauseOnHover: false, arrows: (testimonialCount > 1) ? true : false,}).mount();
});
</script>
