<section class="section bg-grey py-6">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="block-heading text-black text-center h2 mb-30 mt-0"><?= $article->fields->get('building-blocks-heading'); ?></h2>
			</div>

			<div class="col-xs-12 text-center">
				<img class="max-width-100"
					src="<?= config()->base_url . $article->fields->get('building-blocks-image')->value; ?>"
					alt="<?= $article->fields->get('building-blocks-heading'); ?>">
			</div>
		</div>
	</div>
</section>
