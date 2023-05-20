<div class="bg-gray section-api">
	<div class="container">
		<div class="h3 text-black mb-60 block-heading"><?= $article->fields->get('api-heading'); ?></div>

		<div class="models">
			<? $apis = $article->fields->get('api-block')->value; ?>
			<? foreach($apis as $api): ?>
				<div class="col-sm-4 text-black">
					<div class="dataset-orange p-20">
						<div class="mb-20"><span class="h4"><?= $api['api-title']; ?></span>&nbsp;&nbsp;<span class="font-italic"><?= $api['api-subtitle']; ?></span></div>
						<? $texts = explode("\n", $api['api-text']); ?>
						<ul>
							<? foreach($texts as $text): ?>
								<? if(trim($text) !== "") : ?>
									<li><?= $text; ?></li>
								<? endif; ?>
							<? endforeach ?>
						</ul>
					</div>

					<div class="text-center pb-40 pt-40 api-buttons">
						<button type="button" class="bh-btn-orange"> <?= $api['api-tile']; ?></button>
					</div>
				</div>
			<? endforeach ?>
			<div class="events"></div>
		</div>
	</div>
</div>
