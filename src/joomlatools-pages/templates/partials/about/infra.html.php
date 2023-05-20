<div class="container-fluid py-70 bg-white">
	<div class="container">
		<div class="text-primary-shade2 h7 text-uppercase"><?= $article->fields->get('infra-heading'); ?></div>

		<div class="h1 text-black mb-30 block-heading"><?= $article->fields->get('infra-title'); ?></div>

		<div class="text-black font-300 fs-20"><?= nl2br($article->fields->get('infra-text')); ?></div>

		<div class="pt-30 infra-btn-group">
			<? if (!empty($article->fields->get('cta1-url')->value)): ?>
				<a href="<?= $article->fields->get('cta1-url')->value; ?>" class="bh-btn-primary mr-20 mb-5 btn-upd upd1 white" target="_blank" rel="noopener">
					<?= $article->fields->get('cta1-text'); ?>
				</a>
			<? endif; ?>

			<? if (!empty($article->fields->get('cta2-url')->value)): ?>
				<a href="<?= $article->fields->get('cta2-url')->value; ?>" class="bh-btn-white mb-5 btn-upd upd1 dark"> 
					<?= $article->fields->get('cta2-text'); ?> 
				</a>
			<? endif; ?>
		</div>

		<div class="mt-30">
			<img src="<?= config()->base_url . $article->fields->get('infra-image')->value; ?>"
				class="img-responsive"
				alt="<?= $article->fields->get('infra-title'); ?>">
		</div>
	</div>
</div>
