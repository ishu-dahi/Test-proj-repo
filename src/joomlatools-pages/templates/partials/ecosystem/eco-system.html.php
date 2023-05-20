<? $ecosystems = $article->fields->get('eco-bhashini')->value; ?>
<div class="container-fluid bg-gray py-50">
	<div class="container">
		<div class="pb-30 h3 text-black text-center block-heading"><?=  $article->fields->get('eco-bhashini-heading')->value; ?></div>

		<div class="models text-center flex-container">
			<? foreach($ecosystems as $system): ?>
				<div class="col-sm-3 text-black">
					<div class="card-bx fs-14">
						<img src="<?= config()->base_url . $system['icon']; ?>"
							alt="<?= $system['title']; ?>"
							class="img-responsive">

						<div class="section-title h7 text-uppercase text-brown"><?= $system['title']; ?></div>

						<p><?= $system['text']; ?></p>
					</div>
				</div>
			<? endforeach ?>
		</div>
	</div>
</div>
