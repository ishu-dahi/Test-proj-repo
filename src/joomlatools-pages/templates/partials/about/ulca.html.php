<div class="bg-gray py-70">
	<div class="container">
		<div class="row d-md-flex d-sm-block flex-align-center">
			<div class="col-xs-12 col-sm-6">
				<div class="text-primary-shade2 h7 text-uppercase mt-100"><?= $article->fields->get('ulca-heading')->value; ?></div>

				<div class="h1 text-black my-30 block-heading"><?= $article->fields->get('ulca-title')->value; ?></div>

				<div class="text-black font-400 f20">
					<? if (!empty($article->fields->get('ulca-text-para1'))): ?>
						<p><?= nl2br($article->fields->get('ulca-text-para1')->value); ?></p>
					<? endif; ?>

					<? if (!empty($article->fields->get('ulca-text-para2'))): ?>
						<p class="mt-30"><?= nl2br($article->fields->get('ulca-text-para2')->value); ?></p>
					<? endif; ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6">
				<img src="<?= config()->base_url . $article->fields->get('ulca-image')->value; ?>"
					class="img-responsive"
					alt="ULCA">
			</div>
		</div>
	</div>
</div>
