<div class="col-md-12 col-xs-12">
	<div class="c-ulca__section">
		<div class="c-ulca__section-head commonHead">
			<div class="sub-title">
				<? if (!empty($article->fields->get('introtext')->value)): ?>
					<?= $article->fields->get('introtext')->value; ?>
				<? endif; ?>
			</div>
			<div class="para">
				<? if (!empty($article->fields->get('byline')->value)): ?>
					<?= $article->fields->get('byline')->value; ?>
				<? endif; ?>
			</div>
		</div>
		<div class="c-ulca__section-container">
			<div class="row">
				<div class="col-md-8 col-sm-7 col-xs-12">
					<div class="c-ulca__section-tabs">
						<ul class="nav nav-tabs">
							<? $i = 0; ?>
							<? foreach ($languageTechniques as $tab): ?>
								<li <? if ($i == 0) { ?> class="active" <? } ?>>
								<a data-toggle="tab" href="#<?= strtolower($tab['model-type']);?>" id="<?= strtolower($tab['model-type']);?>_langmod_tab">
								<?= $tab['tab-name']; ?></a>
								</li>
							<? $i++; ?>
							<? endforeach ?>
						</ul>
						<div class="tab-content">
							<? $j = 0; ?>
							<? foreach ($languageTechniques as $tabData): ?>
								<div id="<?= strtolower($tabData['model-type']);?>" class="tab-pane fade in <? if ($j == 0) { ?> active <? } ?>">
									<ul class="c-ulca__section-models">
										<li class="c-ulca__section-models-item"> 
											<div class="item-partation">
												<div class="item-partation__list">
													<div class="item-partation__list-item label">
														<? if (!empty($tabData['langModData'][0]['language-title-label-source-1'])): ?>
															<?= $tabData['langModData'][0]['language-title-label-source-1']; ?>
														<? endif; ?>
													</div>
													<div class="item-partation__list-item value">
														<? if (!empty($tabData['langModData'][0]['language-title-source-1'])): ?>
															<?= $tabData['langModData'][0]['language-title-source-1']; ?>
														<? endif; ?>
													</div>
												</div>
												<div class="item-partation__list">
													<div class="item-partation__list-item label">
														<? if (!empty($tabData['langModData'][0]['language-title-label-target-1'])): ?>
															<?= $tabData['langModData'][0]['language-title-label-target-1']; ?>
														<? endif; ?>
													</div>
													<div class="item-partation__list-item value">
														<? if (!empty($tabData['langModData'][0]['language-title-target-1'])): ?>
															<?= $tabData['langModData'][0]['language-title-target-1']; ?>
														<? endif; ?>
													</div>
												</div>
											</div>
											<div class="item-partation">
												<? if (!empty($tabData['langModData'][0]['language-model-detail-button-title-1'])): ?>
													<?
														if (!empty($tabData['langModData'][0]['language-model-detail-button-url-1']))
														{
															$languageModDetailURL1 = $tabData['langModData'][0]['language-model-detail-button-url-1'];
														}
														else
														{
															$languageModDetailURL1 = "javascript:;";
														}
													?>
													<a href="<?= $languageModDetailURL1; ?>"
													class="c-state__button v1" target="_blank" rel="noreferrer noopener"><?= $tabData['langModData'][0]['language-model-detail-button-title-1']; ?></a>
												<? endif; ?>
											</div>	  
										</li>
										<li class="c-ulca__section-models-item"> 	
											<div class="item-partation">
												<div class="item-partation__list">
													<div class="item-partation__list-item label">
														<? if (!empty($tabData['langModData'][1]['language-title-label-source-2'])): ?>
															<?= $tabData['langModData'][1]['language-title-label-source-2']; ?>
														<? endif; ?>
													</div>
													<div class="item-partation__list-item value">
														<? if (!empty($tabData['langModData'][1]['language-title-source-2'])): ?>
															<?= $tabData['langModData'][1]['language-title-source-2']; ?>
														<? endif; ?>
													</div>
												</div>
												<div class="item-partation__list">
													<div class="item-partation__list-item label">
														<? if (!empty($tabData['langModData'][1]['language-title-label-target-2'])): ?>
															<?= $tabData['langModData'][1]['language-title-label-target-2']; ?>
														<? endif; ?>
													</div>
													<div class="item-partation__list-item value">
														<? if (!empty($tabData['langModData'][1]['language-title-target-2'])): ?>
															<?= $tabData['langModData'][1]['language-title-target-2']; ?>
														<? endif; ?>
													</div>
												</div>
											</div>
											<div class="item-partation">
												<? if (!empty($tabData['langModData'][1]['language-model-detail-button-title-2'])): ?>
													<?
														if (!empty($tabData['langModData'][1]['language-model-detail-button-url-2']))
														{
															$languageModDetailURL2 = $tabData['langModData'][1]['language-model-detail-button-url-2'];
														}
														else
														{
															$languageModDetailURL2 = "javascript:;";
														}
													?>
													<a href="<?= $languageModDetailURL2;?>"
													class="c-state__button v1" target="_blank" rel="noreferrer noopener"><?= $tabData['langModData'][1]['language-model-detail-button-title-2']; ?></a>
												<? endif; ?>
											</div>  
											
										</li>
									</ul>
								</div>
							<? $j++; ?>
							<? endforeach ?>
						</div>

						<div class="information cmt-15">
							<? if (!empty($article->fields->get('explore-pattern-button-title')->value)):?>
								<?
									if (!empty($article->fields->get('explore-pattern-button-url')->value))
									{
										$patternURL = $article->fields->get('explore-pattern-button-url')->value;
									}
									else
									{
										$patternURL = "javascript:;";
									}
								?>
								<a href="<?= $patternURL; ?>" class="c-state__button d-flex" target="_blank" rel="noreferrer noopener"><?= $article->fields->get('explore-pattern-button-title')->value; ?></a>
							<? endif; ?>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-5 col-xs-12">
					<div class="c-ulca__section-info">
						<div class="c-ulca__section-info-media">
							<div class="media-section">
								<? if (!empty($article->fields->get('language-translation-image')->value)) { ?>
									<img src="<?= config()->base_url . $article->fields->get('language-translation-image')->value; ?>" class="" class="u-icon img-responsive">
								<? } elseif (!empty($article->fields->get('language-translation-video')->value))
									{
										$videoURL = $article->fields->get('language-translation-video')->value;
										if (strpos($videoURL, 'youtu') > 0)
										{
											if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $videoURL, $match))
											{
												$vurl = "https://www.youtube.com/embed/" . $match[1];
											}
										}
										elseif (strpos($videoURL, 'vimeo') > 0)
										{
											$result = preg_match(
													'/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/(?:[^\/]*)\/videos\/|album\/(?:\d+)\/video\/|video\/|)(\d+)(?:[a-zA-Z0-9_\-]+)?/i',
													$videoURL, $mat);

											$vurl = "https://player.vimeo.com/video/" . $mat[1];
										}
										else
										{
											return false;
										}
									?>
									<iframe width="100%" src="<?= $vurl; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
										<img src="images/states/play-icon.png" class="u-icon img-responsive">
									</iframe>
								<? } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</div> 
