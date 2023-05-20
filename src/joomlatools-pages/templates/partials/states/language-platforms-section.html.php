<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="c-bhashadaan__head commonHead">
				<? if (!empty($article->fields->get('language-introtext')->value)): ?>
					<div class="title">
						<?= $article->fields->get('language-introtext')->value; ?>
					</div>
				<? endif; ?>
				<? if (!empty($article->fields->get('language-byline')->value)): ?>
					<div class="sub-title">
						<?= $article->fields->get('language-byline')->value; ?>
					</div>
				<? endif; ?>
				<? if (!empty($article->fields->get('language-description')->value)): ?>
					<div class="para">
						<?= $article->fields->get('language-description')->value; ?>
					</div>
				<? endif; ?>
            </div>
            <div class="c-bhashadaan__container colView-4">
				<? $crowdsources = $article->fields->get('language-crowdsource')->value;
				foreach($crowdsources as $crowdsource):?>
					<div class="c-bhashadaan__container-item" style="background-image: url('../../../images/states/flag-bg-1.png');">
						<div class="conti">
							<div class="media">
								<? if (isset($crowdsource['logo']) && !empty($crowdsource['logo'])): ?>
									<img src="<?= config()->base_url . $crowdsource['logo']; ?>" class="u-image img-responsive" alt="shape">
								<? endif; ?>
							</div>
							<div class="content">
								<? if (isset($crowdsource['short-description']) && !empty($crowdsource['short-description'])): ?>
									<div class="title"><?= $crowdsource['short-description']; ?></div>
								<? endif; ?>
								<? if (isset($crowdsource['participation-button-title']) && !empty($crowdsource['participation-button-title'])): ?>
									<a href="<?= $crowdsource['participation-button-url']; ?>" target="_blank" class="c-state__button v1 filled blue" rel="noreferrer noopener"><?= $crowdsource['participation-button-title']; ?></a>
								<? endif; ?>
							</div>
						</div>
						<div class="stats">
							<div class="media">
								<? if (isset($crowdsource['contribution-figures-graph']) && !empty($crowdsource['contribution-figures-graph'])): ?>
									<img src="<?= config()->base_url . $crowdsource['contribution-figures-graph']; ?>" class="u-image img-responsive" alt="shape">
								<? endif; ?>
							</div>
							<div class="content">
								<? if (isset($crowdsource['contribution-button-title']) && !empty($crowdsource['contribution-button-title'])): ?>
									<a href="<?= $crowdsource['contribution-button-url']; ?>" target="_blank" class="c-state__button" rel="noreferrer noopener"><?= $crowdsource['contribution-button-title']; ?></a>
								<? endif; ?>
							</div>
						</div>
					</div>
                <? endforeach ?>
            </div>
        </div>
    </div>
</div>
