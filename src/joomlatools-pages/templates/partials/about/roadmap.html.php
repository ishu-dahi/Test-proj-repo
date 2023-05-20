<div class=" text-center p-3 bg-white">
	<div class="container about-roadmap">
		<div class="hidden-lg hidden-md hidden-sm timeline-xs">
			<img src="<?= config()->base_url . "images/roadmap/timeline-mobile.png"; ?>"
				alt="timeline"
				class="img-responsive">
		</div>

		<h2 class="block-heading text-center text-black h2 mb-30"><?= $article->fields->get('bhashini-roadmap-heading'); ?></h2>

		<div class="timeline pt-3 hidden-xs-down color-cols">
			<div class="roadmap-img">
				<img src="<?= config()->base_url . "images/roadmap/timeline-desktop.png"; ?>"
					alt="timeline"
					class="img-responsive">
			</div>

			<div class="color-cols">
				<? $roadmaps = $article->fields->get('bhashini-roadmap')->value; ?>
				<? foreach($roadmaps as $map): ?>
					<div class="col-xs-12 col-sm-3 roadmap-list">
						<!--
						<img src="<?= config()->base_url . $map['image']; ?>" alt="<?= $map['title']; ?>" class="img-responsive w-50 ">
						-->
						<h3 class="block-title"><?= $map['title']; ?></h3>
						<div class="text-black text-left font-100">
							<? $texts = explode("\n", $map['text']);?>
							<ul>
								<? foreach($texts as $text): ?>
									<? if(trim($text) !== "") : ?>
										<li><?= $text; ?></li>
									<? endif; ?>
								<? endforeach ?>
							</ul>
						</div>
					</div>
				<? endforeach ?>
			</div>
		</div>

		<div class="timeline visible-xs color-cols">
			<? $roadmaps = $article->fields->get('bhashini-roadmap')->value; ?>
			<? foreach($roadmaps as $map): ?>
				<div class="col-xs-12 col-sm-3 roadmap-list">
					<h3 class="block-title"><?= $map['title']; ?></h3>
					<div class="text-black text-left font-100"><?= $map['text']; ?></div>
				</div>
			<? endforeach ?>
		</div>
	</div>
</div>
