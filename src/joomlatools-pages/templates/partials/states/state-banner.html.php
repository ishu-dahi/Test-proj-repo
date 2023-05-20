<div class="col-md-6 col-sm-12 col-xs-12">
	<div class="c-hero__banner-content">
		<div class="c-hero__banner-content-backdrop">
			<? if (!empty($article->fields->get('banner-state-logo')->value)): ?>
				<img src="<?= config()->base_url . $article->fields->get('banner-state-logo')->value; ?>" class="u-image img-responsive" alt="<?= $article->fields->get('language-day')->value; ?>">
			<? endif; ?>
		</div>
		<? if (!empty($article->fields->get('language-date')->value)): ?>
			<div class="info"><?= $article->fields->get('language-date')->value; ?></div>
		<? endif; ?>
		<? if (!empty($article->fields->get('language-day')->value)): ?>
			<div class="title"><?= $article->fields->get('language-day')->value; ?></div>
		<? endif; ?>
		<? if (!empty($article->fields->get('language-day-description')->value)): ?>
			<p class="para"><?= $article->fields->get('language-day-description')->value; ?></p>
			<a href="javascript:;" class="u-link" data-toggle="modal" data-target="#bannerDesContent"> &#128065; </a>
		<? endif; ?>
	</div>
</div>
<!-- Modal -->
<div id="bannerDesContent" class="modal c-state__modal backgroundV2 c-modal c-modal--large fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
		<? if (!empty($article->fields->get('language-date')->value)): ?>
			<span class="modal-subTitle"><?= $article->fields->get('language-date')->value; ?></span>
		<? endif; ?>
		<? if (!empty($article->fields->get('language-day')->value)): ?>
			<h4 class="modal-title"><?= $article->fields->get('language-day')->value; ?></h4>
		<? endif; ?> 
      </div>
      <div class="modal-body">
	  	<? if (!empty($article->fields->get('language-day-description')->value)): ?>
			<p class="para"><?= $article->fields->get('language-day-description')->value; ?></p> 
		<? endif; ?>
      </div> 
    </div>

  </div>
</div>
<div class="col-md-6 col-sm-12 col-xs-12">
	<div class="c-hero__banner-media">
		<? if (!empty($article->fields->get('banner-state-map')->value)): ?>
			<img src="<?= config()->base_url . $article->fields->get('banner-state-map')->value; ?>" alt="<?= $article->fields->get('language-day')->value; ?>" class="u-image img-responsive">
		<? endif; ?>
	</div>
</div>
