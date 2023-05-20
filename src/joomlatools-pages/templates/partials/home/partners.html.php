<section class="section py-6 light-blue-bg">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="block-heading text-black text-center h2 mb-30 mt-0"><?= $article->fields->get('partners-heading'); ?></h1>
			</div>
		</div>
		<? $tabs = $article->fields->get('partners-tabs')->value; ?>
		<div class="wpu__section wpu-articles-content">
			<div class="">
				<div class="wpu--simpletabs">
					<div class="">
						<ul class="nav nav-tabs wpu--tabs__links tabsw--450 mb-20">
							<?
							$i = 1;
							foreach ($tabs as $tab):

								($i == 1) ? $active = 'active' : $active ='';
								?>

								<li class="<?= $active; ?>">
									<a data-toggle="tab" href="#tab<?= $i; ?>"><?= $tab['tab-name']; ?></a>
								</li>

								<?
								$i++;

							endforeach ?>
						</ul>

						<div class="tab-content wpu--tab-content">
							<?
							$k = 0;
							$i = 1;
							?>

							<? foreach($tabs as $tab): ?>

								<div id="tab<?= $i; ?>" class="tab-pane fade in active">
									<?
									$logos = array(
										$article->fields->get('partners-tab1-logos')->value,
										$article->fields->get('partners-tab2-logos')->value,
										$article->fields->get('partners-tab3-logos')->value
									);
									?>

									<? $logos = $logos[$k];  ?>

									<div id="testimonial-slider" class="splide home_page_partners_slider<?= $i; ?> wpu__splideNav--mod wpu__splidemr--30">
										<div class="splide__track">
											<div class="splide__list">
												<? foreach($logos as $logo): ?>
													<div class="splide__slide">
														<div class="wpu__boxElem6-partners wpu__whiteBox-center wpu__whitebox-shadow whitebg text-center">
															<div class="imag-holder partner-card">
																<?
																if (isset($logo['url']) && !empty($logo['url']))
																{
																	?>
																	<a href="<?= $logo['url']; ?>" target="_blank" rel="noopener">
																		<img class="br-50"
																			src="<?= config()->base_url . $logo['image']; ?>"
																			alt="<?= $logo['title']; ?>" >
																	</a>
																	<?
																}
																else
																{
																	?>
																	<img class="br-50" src="<?= config()->base_url . $logo['image']; ?>" alt="<?= $logo['title']; ?>" >
																	<?
																}
																?>
															</div>
														</div>
													</div>
												<? endforeach ?>
											</div>
										</div>
									</div>

								</div>

							<?
							$i++;
							$k++;
							endforeach
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<style>
#testimonial-slider .splide__track {
	overflow: hidden !important;
}
</style>

<script>
var partnersArticleCount = 5;
var windowWidth = window.innerWidth;
var partnersArrowsValue = false;
var partnersPermove = 2;

window.addEventListener('load', (event) => {
	switch (true)
	{
		case (windowWidth <= 640 && partnersArticleCount > 1):
			partnersArrowsValue = true;
			partnersPermove = 1;
		break;

		case (windowWidth <= 768  && partnersArticleCount > 2):
			partnersArrowsValue = true;
			partnersPermove = 2;
		break;

		case (windowWidth <= 992  && partnersArticleCount > 2):
			partnersArrowsValue = true;
			partnersPermove = 2;
		break;

		default:
			partnersArrowsValue = (partnersArticleCount > 2) ? true : false,
			partnersPermove = 2;
	}

	<?
	$i = 1;
	$k = 0;
	foreach ($tabs as $tab):
	?>
		<?
		$logos = array (
			$article->fields->get('partners-tab1-logos')->value,
			$article->fields->get('partners-tab2-logos')->value,
			$article->fields->get('partners-tab3-logos')->value
		);
		?>

		new Splide(".home_page_partners_slider<?= $i; ?>", {
			type   : 'slide',
			perPage: 4,
			perMove: partnersPermove,
			arrows: (<?= count($logos[$k]); ?> > 3) ? true : false,
			pagination:false,
			padding: {
				left : '0.5rem',
				right: '0.5rem',
			},
			breakpoints: {
				640: {
					perPage: 1,
					padding: {
						left : '1rem',
						right: '1rem',
					},
				},
				768: {
					perPage: 2,
				},
				992: {
					perPage: 3,
				},
			}
		}).mount();


	<?
	$i++;
	$k++;
	endforeach
	?>

	jQuery('#tab2, #tab3').removeClass('active');
	jQuery('#tab2, #tab3').removeClass('active');
});
</script>
