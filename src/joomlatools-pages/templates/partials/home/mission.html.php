<section class="section bg-grey py-6 xs-px-15">
	<div class="container">
		<div class="row  mt-5 mb-5">
			<div class="col-xs-12 col-sm-7">
				<img class="max-width-100"
					src="<?= config()->base_url . $article->fields->get('mission-image')->value; ?>"
					alt="<?= $article->fields->get('mission-heading'); ?>">
			</div>

			<div class="col-xs-12 col-sm-5">
				<h2 class="section-title text-brown h7 text-uppercase text-brown"><?= $article->fields->get('mission-heading'); ?></h2>
				<h3 class="section-subtitle h3 text-blue block-heading"><?= $article->fields->get('mission-title'); ?></h3>
			</div>
		</div>
	</div>
</section>
