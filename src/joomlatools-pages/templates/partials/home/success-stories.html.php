<? $stories = $article->fields->get('success-story')->value; ?>
<section class="bg-blue bhashadaan-section pb-40 px-15 exclusiveSection">
	<div class="container">
		<div class="row imagine-bg" style="background-image:url('<?= config()->base_url . "images/success-stories/cloud-vector.png"; ?>');background-repeat: no-repeat;">
			<div class="col-xs-12">
				<h1 class="block-heading text-center h1 yellow mb-20 pt-25 xs-px-15">
					<?= $article->fields->get('success-block-heading')->value; ?>
					<br />
					<? if (!empty($article->fields->get('success-block-subheading'))): ?>
						<?= nl2br($article->fields->get('success-block-subheading')->value); ?>
					<? endif; ?>
				</h1>
				<p class="text-center breakup">
					<? if (!empty($article->fields->get('success-block-description'))): ?>
						<?= nl2br($article->fields->get('success-block-description')->value); ?>
					<? endif; ?>
				</p>
			</div>
		</div>

		<div class="hidden-md hidden-lg">
			<div class="row">
				<div class="splide img-splide-slideshow">
					<div class="splide__track">
						<ul class="splide__list">
							<? foreach($stories as $story): ?>
								<li class="splide__slide">
									<div class="success-stories-inner mb-25">
										<h2 class="block-title hide h4  mb-30"><?= $story['title']; ?></h2>

										<? if (isset($story['image']) && !empty($story['image'])): ?>
											<div class="block-img mx-auto mt-30 text-center">
												<img src="<?= config()->base_url . $story['image']; ?>" alt="<?= $story['title']; ?>">
											</div>
										<? endif; ?>

										<div class="block-para">
											<p class="text-center"><?= nl2br($story['text']); ?></p>
										</div>

										
									</div>
								</li>
							<? endforeach ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="hidden-xs hidden-sm">
			<div class="row">
				<div class="text-center">
				<? foreach($stories as $story): ?>
					<div class="imagine-bubbles col-xs-12 col-sm-4 hide">
						<img src="<?= config()->base_url . "images/success-stories/bubble.png"; ?>"
							alt="success story">
					</div>
				<? endforeach ?>
				</div>
			</div>

			<div class="row"> 
				<div class="splide imaginSlide">
						<div class="splide__track">
							<ul class="splide__list imagine-cover">
								<? foreach($stories as $story): ?>
									<li class="splide__slide imagine-inner text-center">
										<h2 class="block-title hide h4 mb-30"><?= $story['title']; ?></h2>

										<? if (isset($story['image']) && !empty($story['image'])): ?>
											<div class="block-img mx-auto mt-30">
												<img src="<?= config()->base_url . $story['image']; ?>" alt="<?= $story['title']; ?>">
											</div>
										<? endif; ?>

										<div class="block-para">
											<p class=" text-center"><?= nl2br($story['text']); ?></p>
										</div>
									</li>
								<? endforeach ?>
							</ul>
						</div>
					</div> 
			</div>
		</div>

		<? if (!empty($article->fields->get('disclaimer'))): ?>
			<div class="block-note mt-25">
				<?= $article->fields->get('disclaimer')->value; ?>
			</div>
		<? endif; ?>

		<? if (!empty($article->fields->get('success-block-ending-line'))): ?>
			<div class="row h4 text-center mt-30">
				<div class="cloud" data-type="white_5" style="">
					<span class="cloud-text"><?= $article->fields->get('success-block-ending-line')->value; ?></span>
				</div>
			</div>
		<? endif; ?>

<!--
		<div class="text-center pt-30">
			<img src="<?= config()->base_url . "images/success-stories/reality-img.png"; ?>" alt="Lets make it Reality">
		</div>
-->
	</div>
</section>

<script>
document.addEventListener( 'DOMContentLoaded', function () {
	new Splide('.img-splide-slideshow', {type: 'slide', padding: {right: '5rem', left : '0rem',},
	rewind: true, autoplay: true, pauseOnHover: false, arrows: false,}).mount();
});
</script>
