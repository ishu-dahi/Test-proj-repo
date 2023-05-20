<div class="col-md-12 col-xs-12">
	<div class="c-info__head commonHead">
		<div class="sub-title">
			<? if (!empty($article->fields->get('egov-service-lists-heading')->value)): ?>
				<?= $article->fields->get('egov-service-lists-heading')->value; ?>
			<? endif; ?>
		</div>
	</div>
	<div class="c-info__container">
		<? $services = $article->fields->get('egov-service-list')->value;
			foreach($services as $service):?>
				<div class="c-info__container-item">
					<? if (isset($service['number']) && !empty($service['number'])): ?>
						<div class="count"><?= $service['number']; ?></div>
					<? endif; ?>
					<? if (isset($service['title']) && !empty($service['title'])): ?>
						<div class="title"><?= $service['title']; ?></div>
					<? endif; ?>
					<? if (isset($service['type']) && !empty($service['type'])): ?>
						<div class="para"><?= $service['type']; ?></div>
					<? endif; ?>
				</div>
		<? endforeach ?>
	</div>
</div>
