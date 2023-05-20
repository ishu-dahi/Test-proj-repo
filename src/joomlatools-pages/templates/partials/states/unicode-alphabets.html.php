<div class="col-md-12 col-xs-12">
	<div class="c-unicode__head commonHead">
		<div class="title">
			<? if (!empty($article->fields->get('group-of-alphabets-heading')->value)): ?>
				<?= $article->fields->get('group-of-alphabets-heading')->value; ?>
			<? endif; ?>
		</div>
	</div>
	<div class="c-unicode__container">
        <div class="c-unicode__mainOuter text-center">
			<? if (!empty($article->fields->get('group-of-alphabets')->value)): ?>
				<?= $article->fields->get('group-of-alphabets')->value; ?>
			<? endif; ?>
		</div>
		<div class="c-unicode__action">
			<div class="c-unicode__action-item">
				<? if (!empty($article->fields->get('useful-links-button-title')->value)): ?>
					<a data-toggle="modal" href="#usefullinkModal" class="c-state__button v1 filled orange">
						<?= $article->fields->get('useful-links-button-title')->value; ?>
					</a>
				<? endif; ?>
			</div>
			<div class="c-unicode__action-item">
				<? if (!empty($article->fields->get('download-font-button-title')->value)): ?>
					<a href="<?= $article->fields->get('download-font-url')->value; ?>" target="_blank" class="c-state__button v1 filled blue" rel="noreferrer noopener">
						<img src="../../../images/states/download-icon.svg" alt="download icon" class="u-icon img-responsive">
						<?= $article->fields->get('download-font-button-title')->value; ?>
					</a>
				<? endif; ?>
				<? if (!empty($article->fields->get('download-typingtool-button-title')->value)): ?>
					<a href="<?= $article->fields->get('download-typing-tool-url')->value; ?>" target="_blank" class="c-state__button v1 filled blue" rel="noreferrer noopener">
						<img src="../../../images/states/download-icon.svg" alt="download icon" class="u-icon img-responsive">
						<?= $article->fields->get('download-typingtool-button-title')->value; ?>
					</a>
				<? endif; ?>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade c-state__modal" id="usefullinkModal" tabindex="-1" role="dialog" aria-labelledby="usefullinkModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
					<?= $article->fields->get('useful-links-button-title')->value; ?>
				</h4>
			</div>
			<div class="modal-body">
				<?= $article->fields->get('useful-links-button-popup-content')->value; ?>
			</div>
		</div>
	</div>
</div>
