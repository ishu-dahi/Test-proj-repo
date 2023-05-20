---
@route: /[lang:language]/states/[:slug]
@layout: /index
@collection:
    model: ext:joomla.model.articles
    state:
        published: 1
        category:  data://config/content[cat_id_states]
@metadata:
    'og:type': article
---
<?
$article = collection();

// Get blocks configurations to show/hide the block this page
if (!empty($article->fields->get('state-blocks-show-hide')))
{
	$blocksConfigurations = json_decode($article->fields->get('state-blocks-show-hide')->value);
}
?>
<div class="state-page" id="main-content">
    <!--
    ---------------------------------------------------
    --------------------- Banner ----------------------
    ---------------------------------------------------
    -->
    <? if ((!empty($blocksConfigurations->display_state_banner_block))): ?>
    <div class="c-hero__banner" style="background:url('<?= config()->base_url . $article->fields->get('state-banner-background-image')->value; ?>'); background-position: center center;background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <ktml:images max-width="25%" lazyload="progressive,inline">
                    <?= partial('template:partials/states/state-banner', ['article' => $article]);?>
                </ktml:images>
            </div>
        </div>
    </div>
    <? endif; ?>
    <!--
    ---------------------------------------------------
    --------- Language support section ----------------
    ---------------------------------------------------
    -->
    <? if ((!empty($blocksConfigurations->display_state_support_language_block))): ?>
    <div class="c-cta__section" style="background-image: url(../../../images/states/backgrounds/combined-shape.png);background-position: left center;background-repeat: no-repeat;">
            <div class="container">
                <div class="row">
                <ktml:images max-width="25%" lazyload="progressive,inline">
                    <?= partial('template:partials/states/support-language-section', ['article' => $article]);?>
                </ktml:images>
            </div>
        </div>
    </div>
    <? endif; ?>
    <!--
    ---------------------------------------------------
    --------- Parallax Menu section ----------------
    ---------------------------------------------------
    -->
    <? if ((!empty($blocksConfigurations->display_state_parallax_block))): ?>
    <div class="c-parallax hide" id="stickOnTop">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="c-parallax__menu">
                        <ul class="c-parallax__menu-list">
                            <li class="c-parallax__menu-list-item">
                                <a href="#Section1" class="c-parallax__menu-list-link">
                                    Video Section
                                </a>
                            </li>
                            <li class="c-parallax__menu-list-item">
                                <a href="#Section2" class="c-parallax__menu-list-link">
                                    Bhasha Daan
                                </a>
                            </li>
                            <li class="c-parallax__menu-list-item">
                                <a href="#Section3" class="c-parallax__menu-list-link">
                                    Statistics
                                </a>
                            </li>
                            <li class="c-parallax__menu-list-item">
                                <a href="#Section4" class="c-parallax__menu-list-link">
                                    Rajya Sahitya Academy
                                </a>
                            </li>
                            <li class="c-parallax__menu-list-item">
                                <a href="#Section5" class="c-parallax__menu-list-link">
                                    ULCA Models
                                </a>
                            </li>
                            <li class="c-parallax__menu-list-item">
                                <a href="#Section6" class="c-parallax__menu-list-link">
                                    Publication
                                </a>
                            </li>
                            <li class="c-parallax__menu-list-item">
                                <a href="#Section7" class="c-parallax__menu-list-link">
                                    Unicode
                                </a>
                            </li>
                            <li class="c-parallax__menu-list-item">
                                <a href="#Section8" class="c-parallax__menu-list-link">
                                    List of EZOV
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? endif; ?>
    <!--
    ---------------------------------------------------
    ------------Language videos section ---------------
    ---------------------------------------------------
    -->
    <? if ((!empty($blocksConfigurations->display_state_video_block))): ?>
    <div class="c-video__section"  id="Section1" style="background-image: url(../../../images/states/backgrounds/video__section_bg.png);background-repeat: no-repeat;">
        <div class="container-fluid">
            <div class="c-video__section-main">
                <ktml:images max-width="25%" lazyload="progressive,inline">
                    <?= partial('template:partials/states/video-section', ['article' => $article]);?>
                </ktml:images>
            </div>
        </div>
    </div>
    <? endif; ?>
    <!--
    ---------------------------------------------------
    ------------Language platforms section -------------
    ---------------------------------------------------
    -->
    <? if ((!empty($blocksConfigurations->display_state_language_platforms_block))): ?>
    <div class="c-bhashadaan" id="Section2">
        <div class="c-bhashadaan__graphic left">
            <img src="../../../images/states/shapes/shape-2.svg" class="u-image img-responsive" alt="shape">
        </div>
        <div class="c-bhashadaan__graphic right">
            <img src="../../../images/states/shapes/shape-3.svg" class="u-image img-responsive" alt="shape">
        </div>
        <ktml:images max-width="25%" lazyload="progressive,inline">
            <?= partial('template:partials/states/language-platforms-section', ['article' => $article]);?>
        </ktml:images>
    </div>
    <? endif; ?>
    <!--
    ---------------------------------------------------
    -------- Language techniques module section -------
    ---------------------------------------------------
    -->
    <? if ((!empty($blocksConfigurations->display_state_language_techniques_block))):
		// Function to search tab in language model data & show only that tab which we have to show
		function searchForTab($tabName, $langModels) {
			foreach ($langModels as $key => $val) {
				if ($val['tab-type'] === $tabName) {
					return $val;
				}
			}
			return null;
		}

		// Get the language model
		$languageModels = (array) $article->fields->get('language-models')->value;
		$languageModelsFieldOptionValues = $article->fields->get('language-models')->params['options'];
		$languageTranslationsData = $article->fields->get('language-translations')->value;

		$languageTechniques = array();
		foreach ($languageModels as $tab)
		{
			// search the key & get the details of tab e.g. tab title, tab key name
			$fieldKey = array_search($tab, array_column($languageModelsFieldOptionValues, 'value'));

			$languageTechniques[$tab] = array();
			$languageTechniques[$tab]['model-type'] = $tab;
			$languageTechniques[$tab]['model-title'] = $languageModelsFieldOptionValues['options'.$fieldKey]['name'];

			// Find the tab to show on section & language model data according to the tab
			$tabData = searchForTab($tab, $languageTranslationsData);

			if (count($tabData) > 0)
			{
				$languageTechniques[$tab]['tab-name'] = $tabData['tab-name'];
				$languageTechniques[$tab]['langModData'] = array();
				$languageTechniques[$tab]['langModData'][0]['language-title-label-source-1'] = $tabData['language-title-label-source-1'];
				$languageTechniques[$tab]['langModData'][0]['language-title-source-1']  = $tabData['language-title-source-1'];
                $languageTechniques[$tab]['langModData'][0]['language-title-label-source-2'] = $tabData['language-title-label-source-2'];
				$languageTechniques[$tab]['langModData'][0]['language-title-source-2']  = $tabData['language-title-source-2'];
                $languageTechniques[$tab]['langModData'][0]['language-title-label-target-1'] = $tabData['language-title-label-target-1'];
				$languageTechniques[$tab]['langModData'][0]['language-title-target-1']  = $tabData['language-title-target-1'];
                $languageTechniques[$tab]['langModData'][0]['language-title-label-target-2'] = $tabData['language-title-label-target-2'];
				$languageTechniques[$tab]['langModData'][0]['language-title-target-2']  = $tabData['language-title-target-2'];
				$languageTechniques[$tab]['langModData'][0]['language-model-detail-button-title-1']  = $tabData['language-model-detail-button-title-1'];
				$languageTechniques[$tab]['langModData'][0]['language-model-detail-button-url-1']  = $tabData['language-model-detail-button-url-1'];
                $languageTechniques[$tab]['langModData'][1]['language-title-label-source-1'] = $tabData['language-title-label-source-1'];
				$languageTechniques[$tab]['langModData'][1]['language-title-source-1']  = $tabData['language-title-source-1'];
                $languageTechniques[$tab]['langModData'][1]['language-title-label-source-2'] = $tabData['language-title-label-source-2'];
				$languageTechniques[$tab]['langModData'][1]['language-title-source-2']  = $tabData['language-title-source-2'];
                $languageTechniques[$tab]['langModData'][1]['language-title-label-target-1'] = $tabData['language-title-label-target-1'];
				$languageTechniques[$tab]['langModData'][1]['language-title-target-1']  = $tabData['language-title-target-1'];
                $languageTechniques[$tab]['langModData'][1]['language-title-label-target-2'] = $tabData['language-title-label-target-2'];
				$languageTechniques[$tab]['langModData'][1]['language-title-target-2']  = $tabData['language-title-target-2']; 
				$languageTechniques[$tab]['langModData'][1]['language-model-detail-button-title-2']  = $tabData['language-model-detail-button-title-2'];
				$languageTechniques[$tab]['langModData'][1]['language-model-detail-button-url-2']  = $tabData['language-model-detail-button-url-2'];
			}
		}
     ?>
    <div class="c-ulca" id="Section5">
        <div class="container">
            <div class="row">
                <ktml:images max-width="25%" lazyload="progressive,inline">
                    <?= partial('template:partials/states/language-techniques', ['languageTechniques' => $languageTechniques,'article' => $article]);?>
                </ktml:images>
            </div>
        </div>
    </div>
    <? endif; ?>
    <!--
    ---------------------------------------------------
    ---------------Language Stats section -------------
    ---------------------------------------------------
    -->
    <? if ((!empty($blocksConfigurations->display_state_language_stats_block))): ?>
    <div class="c-slide withBg1 splide js-infoSlide" id="Section3">
        <div class="container">
            <ktml:images max-width="25%" lazyload="progressive,inline">
                <?= partial('template:partials/states/language-stats', ['article' => $article]);?>
            </ktml:images>
        </div>
    </div>
    <? endif; ?>
    <!--
    ---------------------------------------------------
    --------------------Award winners section ----------
    ---------------------------------------------------
    -->
    <? if ((!empty($blocksConfigurations->display_state_award_winners_block))): ?>
    <div class="c-slide v2 withBg2 splide js-sahityaSlide"  id="Section4" style="background-image: url(../../../images/states/backgrounds/c-slide-v2.png);">
        <div class="container">
            <ktml:images max-width="25%" lazyload="progressive,inline">
                <?= partial('template:partials/states/award-winners', ['article' => $article]);?>
            </ktml:images>
        </div>
    </div>
    <? endif; ?> 
    <!--
    ---------------------------------------------------
    ---------------Language Prakashan section ---------
    ---------------------------------------------------
    -->
    <? if ((!empty($blocksConfigurations->display_state_language_prakashan_block))): ?>
    <div class="c-prkashan" id="Section6" style="background-image: url(../../../images/states/backgrounds/c-prkashan-bg.png);">
        <div class="container">
            <div class="row">
                <ktml:images max-width="25%" lazyload="progressive,inline">
                    <?= partial('template:partials/states/language-prakashan', ['article' => $article]);?>
                </ktml:images>
            </div>
        </div>
    </div>
    <? endif; ?>
    <!--
    ---------------------------------------------------
    --------------Unicode alphabets section -----------
    ---------------------------------------------------
    -->
    <? if ((!empty($blocksConfigurations->display_state_language_unicode_alphabets_block))): ?>
    <div class="c-unicode" id="Section7" style="background-image: url(../../../images/states/backgrounds/background-4.png);">
        <div class="container">
            <div class="row">
                <ktml:images max-width="25%" lazyload="progressive,inline">
                    <?= partial('template:partials/states/unicode-alphabets', ['article' => $article]);?>
                </ktml:images>
            </div>
        </div>
    </div>
    <? endif; ?>
    <!--
    ---------------------------------------------------
    --------------eGov Services lists section -----------
    ---------------------------------------------------
    -->
    <? if ((!empty($blocksConfigurations->display_state_egov_services_lists_block))): ?>
    <div class="c-info" id="Section8" style="background-image: url(../../../images/states/backgrounds/c-info-bg.png);">
        <div class="container">
            <div class="row">
                <ktml:images max-width="25%" lazyload="progressive,inline">
                    <?= partial('template:partials/states/egov-services-lists', ['article' => $article]);?>
                </ktml:images>
            </div>
        </div>
    </div>
    <? endif; ?>
</div>

<!-- script for sticky header -->
<script>
    window.onscroll = function() {stickyFunction()};
    var header = document.getElementById("stickOnTop");
    var sticky = header.offsetTop;
    function stickyFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("stickySection");
    } else {
        header.classList.remove("stickySection");
        }
    }
</script>
