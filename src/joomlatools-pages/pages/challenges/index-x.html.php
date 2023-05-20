---
@route: /[lang:language]/challenges
@layout: /index
@collection:
    model: ext:joomla.model.articles
    state:
        published: 1
        category:  data://config/content[cat_id_challenges]
---

<?
$categoryDetails = collection('ext:joomla.model.categories', [
	'published' => 1,
	'id'  => data('global://config/content')->get('cat_id_challenges')
]);

// Set metadata details
page()->title = $categoryDetails->title;
page()->metadata->summary = $categoryDetails->metadata->description;
page()->metadata->author  = $categoryDetails->metadata->author;
page()->metadata->{'og:title'} = $categoryDetails->title;
page()->metadata->{'og:image'} = !empty($categoryDetails->image->url) ? $categoryDetails->image->url : page()->metadata->{'og:url'} . config()->page->metadata->{'og:image'};
?>

<div class="challanges-page" id="main-content">  
	<div class="c-banner" style="background: url(../../../images/states/backgrounds/challenge-bnr-bg.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-6 col-xs-12 commonColumn">
					<div class="c-banner__content">
						<h1 class="h3 text-black block-heading">Make your Contribution today</h1>
						<div class="text-black py-10 mb-20 fs-20">
						lorumipsum Mission aims to build a National Public DigitalPlatform for languagesto developservices and products forcitizens by leveragingthe power of artificial intelligenceand other emerging technologies dummy text.</div>
					</div>
				</div>
				<div class="col-md-7 col-sm-6 col-xs-12 commonColumn">
					<img src="../../../images/states/backgrounds/challenge-bnr-infoGraphic.png" alt="Challenge" class="img-fluid u-image">
				</div>
			</div>
		</div>
	</div>
	<div class="c-container c-navTabs">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12"> 
					<div class="c-navTabs__container">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#liveChallanges">Live Challenges</a></li>
							<li><a data-toggle="tab" href="#closedChallanges">Closed challenges</a></li>
						</ul>
						<div class="header-section text-center">You can take part in any event/Challanges . You can get places in some of the most popular events below.</div>
						<div class="tab-content">
							<div id="liveChallanges" class="tab-pane fade in active">
								<div class="c-activity__layout">
									<div class="c-activity__layout-list col3">
										<div class="c-activity__layout-item">
											<div class="media-section">
												<img src="<?= config()->base_url . "images/headers/windows.jpg"; ?>" alt="quote" class="img-fluid u-image">
											</div>
											<div class="content-section">
												<h4 class="title">Share Cuisines of Your Region: Ek Bharat Shreshtha Bharat</h4>
												<p class="intro">Last Date: Aug 15, 2021 23:45 PM IST (GMT +5:30 Hrs)</p>
												<a href="javascript:;" class="u-link">Contibute now</a>
											</div>
										</div>
										<div class="c-activity__layout-item">
											<div class="media-section">
												<img src="<?= config()->base_url . "images/headers/windows.jpg"; ?>" alt="quote" class="img-fluid u-image">
											</div>
											<div class="content-section">
												<h4 class="title">Share Cuisines of Your Region: Ek Bharat Shreshtha Bharat</h4>
												<p class="intro">Last Date: Aug 15, 2021 23:45 PM IST (GMT +5:30 Hrs)</p>
												<a href="javascript:;" class="u-link">Contibute now</a>
											</div>
										</div>
										<div class="c-activity__layout-item">
											<div class="media-section">
												<img src="<?= config()->base_url . "images/headers/windows.jpg"; ?>" alt="quote" class="img-fluid u-image">
											</div>
											<div class="content-section">
												<h4 class="title">Share Cuisines of Your Region: Ek Bharat Shreshtha Bharat</h4>
												<p class="intro">Last Date: Aug 15, 2021 23:45 PM IST (GMT +5:30 Hrs)</p>
												<a href="javascript:;" class="u-link">Contibute now</a>
											</div>
										</div>
										<div class="c-activity__layout-item">
											<div class="media-section">
												<img src="<?= config()->base_url . "images/headers/windows.jpg"; ?>" alt="quote" class="img-fluid u-image">
											</div>
											<div class="content-section">
												<h4 class="title">Share Cuisines of Your Region: Ek Bharat Shreshtha Bharat</h4>
												<p class="intro">Last Date: Aug 15, 2021 23:45 PM IST (GMT +5:30 Hrs)</p>
												<a href="javascript:;" class="u-link">Contibute now</a>
											</div>
										</div>
										<div class="c-activity__layout-item">
											<div class="media-section">
												<img src="<?= config()->base_url . "images/headers/windows.jpg"; ?>" alt="quote" class="img-fluid u-image">
											</div>
											<div class="content-section">
												<h4 class="title">Share Cuisines of Your Region: Ek Bharat Shreshtha Bharat</h4>
												<p class="intro">Last Date: Aug 15, 2021 23:45 PM IST (GMT +5:30 Hrs)</p>
												<a href="javascript:;" class="u-link">Contibute now</a>
											</div>
										</div>
										<div class="c-activity__layout-item">
											<div class="media-section">
												<img src="<?= config()->base_url . "images/headers/windows.jpg"; ?>" alt="quote" class="img-fluid u-image">
											</div>
											<div class="content-section">
												<h4 class="title">Share Cuisines of Your Region: Ek Bharat Shreshtha Bharat</h4>
												<p class="intro">Last Date: Aug 15, 2021 23:45 PM IST (GMT +5:30 Hrs)</p>
												<a href="javascript:;" class="u-link">Contibute now</a>
											</div>
										</div>
										<div class="c-activity__layout-item">
											<div class="media-section">
												<img src="<?= config()->base_url . "images/headers/windows.jpg"; ?>" alt="quote" class="img-fluid u-image">
											</div>
											<div class="content-section">
												<h4 class="title">Share Cuisines of Your Region: Ek Bharat Shreshtha Bharat</h4>
												<p class="intro">Last Date: Aug 15, 2021 23:45 PM IST (GMT +5:30 Hrs)</p>
												<a href="javascript:;" class="u-link">Contibute now</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="closedChallanges" class="tab-pane fade">
								<div class="c-activity__layout">
									<div class="c-activity__layout-list col3">
										<div class="c-activity__layout-item">
											<div class="media-section">
												<img src="../../../images/headers/windows.jpg" alt="quote" class="img-fluid u-image">
											</div>
											<div class="content-section">
												<h4 class="title">Share Cuisines of Your Region: Ek Bharat Shreshtha Bharat</h4>
												<p class="intro">Last Date: Aug 15, 2021 23:45 PM IST (GMT +5:30 Hrs)</p>
												<a href="javascript:;" class="u-link">Contibute now</a>
											</div>
										</div>
										<div class="c-activity__layout-item">
											<div class="media-section">
												<img src="<?= config()->base_url . "images/headers/windows.jpg"; ?>" alt="quote" class="img-fluid u-image">
											</div>
											<div class="content-section">
												<h4 class="title">Share Cuisines of Your Region: Ek Bharat Shreshtha Bharat</h4>
												<p class="intro">Last Date: Aug 15, 2021 23:45 PM IST (GMT +5:30 Hrs)</p>
												<a href="javascript:;" class="u-link">Contibute now</a>
											</div>
										</div>
										<div class="c-activity__layout-item">
											<div class="media-section">
												<img src="<?= config()->base_url . "images/headers/windows.jpg"; ?>" alt="quote" class="img-fluid u-image">
											</div>
											<div class="content-section">
												<h4 class="title">Share Cuisines of Your Region: Ek Bharat Shreshtha Bharat</h4>
												<p class="intro">Last Date: Aug 15, 2021 23:45 PM IST (GMT +5:30 Hrs)</p>
												<a href="javascript:;" class="u-link">Contibute now</a>
											</div>
										</div>
										<div class="c-activity__layout-item">
											<div class="media-section">
												<img src="<?= config()->base_url . "images/headers/windows.jpg"; ?>" alt="quote" class="img-fluid u-image">
											</div>
											<div class="content-section">
												<h4 class="title">Share Cuisines of Your Region: Ek Bharat Shreshtha Bharat</h4>
												<p class="intro">Last Date: Aug 15, 2021 23:45 PM IST (GMT +5:30 Hrs)</p>
												<a href="javascript:;" class="u-link">Contibute now</a>
											</div>
										</div>
										<div class="c-activity__layout-item">
											<div class="media-section">
												<img src="<?= config()->base_url . "images/headers/windows.jpg"; ?>" alt="quote" class="img-fluid u-image">
											</div>
											<div class="content-section">
												<h4 class="title">Share Cuisines of Your Region: Ek Bharat Shreshtha Bharat</h4>
												<p class="intro">Last Date: Aug 15, 2021 23:45 PM IST (GMT +5:30 Hrs)</p>
												<a href="javascript:;" class="u-link">Contibute now</a>
											</div>
										</div>
										<div class="c-activity__layout-item">
											<div class="media-section">
												<img src="<?= config()->base_url . "images/headers/windows.jpg"; ?>" alt="quote" class="img-fluid u-image">
											</div>
											<div class="content-section">
												<h4 class="title">Share Cuisines of Your Region: Ek Bharat Shreshtha Bharat</h4>
												<p class="intro">Last Date: Aug 15, 2021 23:45 PM IST (GMT +5:30 Hrs)</p>
												<a href="javascript:;" class="u-link">Contibute now</a>
											</div>
										</div> 
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>