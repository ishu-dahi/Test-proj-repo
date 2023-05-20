<div class="container-fluid text-center py-6 bg-white text-blue">
	<div class="container">
		<div class="section-title h7 text-uppercase text-brown"><?= $article->fields->get('vision-title'); ?></div>

		<div class="h2 heading-h2"><?= nl2br($article->fields->get('vision-text')); ?></div>
	</div>
</div>
