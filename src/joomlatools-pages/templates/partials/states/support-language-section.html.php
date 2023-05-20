<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="c-cta__section-main">
		<? if (!empty($article->fields->get('language-quote')->value)): ?>
			<div class="title">
				<?= $article->fields->get('language-quote')->value; ?>
			</div>
		<? endif; ?>
		<? if (!empty($article->fields->get('language-button-title')->value)): ?>
			<a href="<?= $article->fields->get('language-url')->value; ?>" target="_blank" class="c-state__button v1 filled white" rel="noreferrer noopener"><?= $article->fields->get('language-button-title')->value; ?></a>
		<? endif; ?>
	</div>
</div>
