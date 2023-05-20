---
@route: /[lang:language]
@layout: /index
@collection:
model: ext:joomla.model.articles
state:
published: 1
category: data://config/content[cat_id_home]
limit: 1
@metadata:
'og:type': article
---

<?
$article = collection();

// Set metadata
page()->title                  = $article->title;
page()->metadata->description  = $article->metadata->description;
page()->metadata->summary      = $article->metadata->description;
page()->metadata->keywords     = $article->metadata->keywords;
page()->metadata->author       = $article->metadata->author;
page()->metadata->{'og:title'} = $article->title;
page()->metadata->{'og:image'} = !empty($article->image->url) ? $article->image->url : page()->metadata->{'og:url'} . config()->page->metadata->{'og:image'};
?>

<div class="home-page" id="main-content">
	<!-- Home News Ticker Begin -->
	<style>
		.marquee-content {
			background: #2961AD;
			display: flex;
			padding: 0 20px;
			cursor: default;
		}

		.marquee-content a {
			display: inline-block;
			height: 70px;
			margin: 0 50px;
			color: #fff;
			font-size: 16px;
			position: relative;
			padding-top: 26px;
		}

		.marquee-content a span {
			position: absolute;
			left: 0px;
			top: 5px;
			padding: 1px 12px;
			display: flex;
			align-items: center;
			font-size: 12px;
			border-radius: 50px
		}

		.marquee-content a p {
			margin: 0;
		}

		.marquee-content a span.textlink {
			-webkit-animation-name: newHighlighter;
			-webkit-animation-duration: 2.5s;
			animation-name: newHighlighter;
			animation-duration: 2.5s;
			animation-iteration-count: infinite;
		}

		@-webkit-keyframes newHighlighter {
			0% {
				background-color: red;
			}

			25% {
				background-color: #ff0;
			}

			50% {
				background-color: orange;
			}

			75% {
				background-color: pink;
			}

			100% {
				background-color: red;
			}
		}

		@keyframes newHighlighter {
			0% {
				background-color: red;
			}

			25% {
				background-color: #ff0;
			}

			50% {
				background-color: orange;
			}

			75% {
				background-color: pink;
			}

			100% {
				background-color: red;
			}
		}
	</style>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12" style="padding: 0;">
				<div class="marquee-content">
					<marquee behavior="alternate" scrollamount="10" direction="left" onmouseover="this.stop();" onmouseout="this.start();" scrolldelay="70">
						<a href="https://dic.gov.in/index.php/notification/openings-main/444-inviting-applications-for-the-various-positions-444" target="_blank">
							<p>Bhashini is inviting application for the various positions
								<span class="textlink">New</span>
							</p>
						</a>
					</marquee>
				</div>
			</div>
		</div>
	</div>
	<!-- Home News Ticker End -->
	<!-- Banner -->
	<? if (!empty($article->fields->get('banners')) && count($article->fields->get('banners')->value)) : ?>
		<div class="col-md-12">
			<div class="row">
				<? $banners = $article->fields->get('banners')->value; ?>
				<ktml:images max-width="25%" lazyload="progressive,inline">
					<?= partial('template:partials/home/banner', ['banners' => $banners]); ?>
				</ktml:images>
			</div>
		</div>
	<? endif; ?>

	<!-- Vision -->
	<? if (!empty($article->fields->get('vision-text'))) : ?>
		<div class="col-md-12">
			<div class="row">
				<?= partial('template:partials/home/vision', ['article' => $article]); ?>
			</div>
		</div>
	<? endif; ?>

	<!-- Success stories -->
	<? if (!empty($article->fields->get('success-story')) && count($article->fields->get('success-story')->value)) : ?>
		<div class="col-md-12">
			<div class="row">
				<ktml:images max-width="25%" lazyload="progressive,inline">
					<?= partial('template:partials/home/success-stories', ['article' => $article]); ?>
				</ktml:images>
			</div>
		</div>
	<? endif; ?>

	<!-- App Info -->
	<? if (!empty($article->fields->get('app-info-heading'))) : ?>
		<div class="col-md-12">
			<div class="row">
				<?= partial('template:partials/home/appinfo', ['article' => $article]); ?>
			</div>
		</div>
	<? endif; ?>

	<!-- Latest News -->
	<? if (!empty($article->fields->get('latest-news-media'))) : ?>
		<div class="col-md-12 hide">
			<div class="row">
				<ktml:images max-width="25%" lazyload="progressive,inline">
					<?= partial('template:partials/home/news', ['article' => $article]); ?>
				</ktml:images>
			</div>
		</div>
	<? endif; ?>


	<!-- Mission Statement -->
	<? if (!empty($article->fields->get('mission-heading'))) : ?>
		<div class="col-md-12 hide">
			<div class="row">
				<?= partial('template:partials/home/mission', ['article' => $article]); ?>
			</div>
		</div>
	<? endif; ?>

	<!-- Guiding Principles -->
	<? if (!empty($article->fields->get('principles'))) : ?>
		<div class="col-md-12">
			<div class="row">
				<?= partial('template:partials/home/principles', ['article' => $article]); ?>
			</div>
		</div>
	<? endif; ?>

	<!-- Building Block -->
	<? if (!empty($article->fields->get('building-blocks-heading'))) : ?>
		<div class="col-md-12">
			<div class="row">
				<?= partial('template:partials/home/building-block', ['article' => $article]); ?>
			</div>
		</div>
	<? endif; ?>

	<!-- Partners Section -->
	<? if (!empty($article->fields->get('partners-heading'))) : ?>
		<div class="col-md-12">
			<div class="row">
				<?= partial('template:partials/home/partners', ['article' => $article]); ?>
			</div>
		</div>
	<? endif; ?>

	<div class="fixed-banner bottomLeft js-BannerIPDAY hide">
		<div class="fixed-banner__container">
			<a href="javascript:;" class="u-close js-closeBannerIPDAY">X</a>
			<img src="../../../images/infographics/independence-day.png">
		</div>
	</div>
	<!--<div class="fixed-banner bottomRight js-BannerApp">
		<div class="fixed-banner__container">
			<a href="javascript:;" class="u-close js-closeBannerApp">X</a>
			<a href="javascript:;"><img src="../../../images/infographics/mobile-app-banner-download.png"></a>
		</div>
	</div> -->
</div>