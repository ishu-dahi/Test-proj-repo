<div class="container-fluid bg-primary-shade1"
	style="background:url('<?= config()->base_url . $article->fields->get('eco-banner-background')->value; ?>'); background-repeat: no-repeat; background-size: cover;background-position: center;">
	<div class="container">
		<div class="row d-lg-flex flex-align-center">
			<div class="col-xs-12 col-sm-6">
				<img src="<?= config()->base_url . $article->fields->get('eco-banner-image')->value; ?>"
					class="img-responsive ">
			</div>

			<div class="col-xs-12 col-sm-6">
				<h1 class="h3 text-black block-heading"><?= $article->fields->get('eco-banner-quote')->value; ?></h1>

				<div class="text-black py-10 mb-20 fs-20">
					<?= nl2br($article->fields->get('eco-banner-subtext')->value); ?>
				</div>
			</div>
		</div>
	</div>
</div>
