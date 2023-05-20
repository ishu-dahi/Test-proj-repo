<section class="section bg-white guiding-principles py-6 text-black">
	<div class="container hidden-md hidden-lg">
		<? if (!empty($article->fields->get('guiding-principles-heading'))): ?>
			<div>
				<h2 class="block-heading text-black h2 mb-20 mt-0 px-10"><?= $article->fields->get('guiding-principles-heading')->value; ?></h2>
			</div>
		<? endif; ?>

		<div class="d-flex flex-justify-center">
			<div class="col-xs-3 px-xs-0 pt-30">
				<img src="<?= config()->base_url . "/images/principles/guiding-mobile.png"; ?>"
					alt="Guiding Principles Mobile"
					class="img-responsive">
			</div>

			<div class="col-xs-9 color-cols px-xs-0 color-cols">
				<? $principles = $article->fields->get('principles')->value; ?>

				<? $i = 0; ?>
				<?
				foreach($principles as $principle):
					if ($i == 0)
					{
						$outclass = 'class="col-xs-12 mb-30 first-col"';
						$class = 'class="text-blue h4"';
					}
					else if($i == 1)
					{
						$outclass = 'class="col-xs-12 mt-10 mb-80 second-col"';
						$class = 'class="text-yellow h4"';
					}
					else if($i == 2)
					{
						$outclass = 'class="col-xs-12 mb-2 third-col"';
						$class = 'class="text-brown h4"';
					}
					else
					{
						$outclass = $class = '';
					}
					?>

					<div <?= $outclass; ?>>
						<h2 <?= $class; ?>><?= $principle['title']; ?></h2>
						<p><?= $principle['text']; ?></p>
					</div>

					<? $i++; ?>
				<? endforeach; ?>
			</div>
		</div>
	</div>

	<div class="container hidden-xs hidden-sm">
		<div class="row">
			<div class="col-xs-12 col-sm-7">
				<img class="max-width-100"
					src="<?= config()->base_url . $article->fields->get('principles-image')->value; ?>"
					align="right"
					alt="Guiding Principles">
			</div>

			<div class="col-xs-12 col-sm-5 mt-30">
				<div class="row color-cols">
					<? $principles = $article->fields->get('principles')->value; ?>

					<? $i = 0; ?>

					<?
					foreach($principles as $principle):
						if ($i == 0)
						{
							$outclass = 'class="col-xs-12 mb-30 first-col"';
							$class = 'class="text-blue h4"';
						}
						else if ($i == 1)
						{
							$outclass = 'class="col-xs-12 mt-10 mb-80 second-col"';
							$class = 'class="text-yellow h4"';
						}
						else if($i == 2)
						{
							$outclass = 'class="col-xs-12 mb-2 third-col"';
							$class = 'class="text-brown h4"';
						}
						else
						{
							$outclass = $class = '';
						}
						?>

					<div <?= $outclass; ?>>
						<h2 <?= $class; ?>><?= $principle['title']; ?></h2>
						<p><?= $principle['text']; ?></p>
					</div>

					<? $i++; ?>

					<? endforeach; ?>
				</div>
			</div>
		</div>

		<div class="row mt-80 mb-5 hidden-xs">
			<div class="col-xs-12 text-center">
				<a href="<?= $article->fields->get('principles-cta-url')->value; ?>"
					rel="noopener">
					<div class="btn btn-primary btn-learnmore font-200">
						<?= $article->fields->get('principles-cta-text')->value; ?>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
