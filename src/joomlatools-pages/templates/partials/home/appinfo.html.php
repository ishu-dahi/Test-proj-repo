<section class="bg-blue bhashadaan-section">
	<div class="left-bg">
		<div class="right-bg">
			<div class="container-fluid py-40">
				<div class="col-md-10 col-md-offset-1 mb-25">
					<div class="row">
						<div class="col-xs-12 col-sm-5 col-md-6">
							<img src="<?= config()->base_url . $article->fields->get('app-info-image')->value; ?>"
								class="img-border img-responsive"
								alt="BhashaDaan">
						</div>

						<div class="col-xs-12 col-sm-7 col-md-6">
							<? /*<?= nl2br($article->fields->get('app-info-heading')); ?> */ ?>
							<h1 class="h1 pt-6 block-heading">
								<?= $article->fields->get('app-info-heading-1-1'); ?><span class="yellow"> <?= $article->fields->get('app-info-heading-1-2'); ?></span>
							</h1>
							<div class="h6"><?= nl2br($article->fields->get('app-info-heading-para')); ?></div>
							<h2 class="h2 pt-3"><?= nl2br($article->fields->get('app-info-title')); ?></h2>
							<p class="h6"><?= nl2br($article->fields->get('app-info-title-para')); ?></p>
							<div class="pt-6">
								<ktml:modules position="pages-bhashadaan-btn">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
