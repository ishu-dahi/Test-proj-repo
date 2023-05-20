 <div class="col-md-12 col-xs-12"> 
	<div class="c-tabs__container">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#TestimonialsTab">Testimonials</a></li>
			<li><a data-toggle="tab" href="#PartnersTab">Partners</a></li>
		</ul>
		<div class="tab-content">
			<div id="TestimonialsTab" class="tab-pane fade in active">
				<? $testimonials = $article->fields->get('ecosystemtestimonials')->value; ?>
				<div class="c-tabs__main">
					<? foreach($testimonials as $testimonial):?> 
						<div class="c-tabs__main-tile">
							<? if (strpos($testimonial['url'], 'youtu') > 0)
							{
								if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $testimonial['url'], $match))
								{
									$vurl = "https://www.youtube.com/embed/" . $match[1];
								}
							}
							elseif (strpos($testimonial['url'], 'vimeo') > 0)
							{
								$result = preg_match(
										'/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/(?:[^\/]*)\/videos\/|album\/(?:\d+)\/video\/|video\/|)(\d+)(?:[a-zA-Z0-9_\-]+)?/i',
										$testimonial['url'], $mat);

								$vurl = "https://player.vimeo.com/video/" . $mat[1];
							}
							else
							{
								$vurl='#';
							} ?>
							<a href="<?= $testimonial['url']; ?>" class="c-tabs__main-tile-media thumb-img js-testimonialVideo" data-video-url="<?=$vurl?>" data-modal-id="#<?=$testimonial['id']?>"> 							
							 
									<img src="<?= $testimonial['thumb']; ?>" alt="<?= $testimonial['thumb-alt']; ?>" class="u-image">
							 
							</a>
							<div class="c-tabs__main-tile-content">
								<div class="title">
									<? if (isset($testimonial['title']) && !empty($testimonial['title'])): ?>
										<?= $testimonial['title']; ?>
									<? endif; ?>
								</div>
								<div class="desc">
									<? if (isset($testimonial['description']) && !empty($testimonial['description'])): ?>
										<?= $testimonial['description']; ?>
									<? endif; ?> 
								</div>
							</div>
						</div> 
					<? endforeach ?> 
				</div>	 
			</div>
			<div id="PartnersTab" class="tab-pane fade">
			<? $partners = $article->fields->get('ecosystempartner')->value; ?>
				<div class="c-tabs__main">
					<div class="c-slide js-partnerSlide p-0">
						<div class="c-slide__section splide__track">
							<div class="c-slide__section-content splide__list">
							<? foreach($partners as $partner):?> 
								<a href="<?= $partner['url']; ?>" target="_blank" class="c-tabs__main-tile c-slide__section-item splide__slide">
									<div class="c-tabs__main-tile-media">
										<img src="<?= $partner['logo']; ?>" alt="" class="u-image"> 
									</div>
									<div class="c-tabs__main-tile-content">
										<div class="title">
											<? if (isset($partner['title']) && !empty($partner['title'])): ?>
												<?= $partner['title']; ?>
											<? endif; ?>
										</div>
										<div class="desc">
											<? if (isset($partner['description']) && !empty($partner['description'])): ?>
												<?= $partner['description']; ?>
											<? endif; ?> 
										</div>
									</div>
								</a> 
							<? endforeach ?> 
							</div>
						</div>
					</div> 
				</div>
				<div class="c-testimonials c-slide js-testiSlide p-0 hide">
					<div class="c-testimonials__main splide__track">
						<div class="splide__list c-testimonials__grid">
							<a href="javascript:;" class="splide__slide c-testimonials__grid-item">
								<div class="avtar-section">
									<img class="lazymissing" src="/bhashini-local/images/states/circle-map.png" alt="" class="u-icon img-fluid">
								</div>
								<div class="content-section">
									<div class="main">
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
										<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									</div>
									<div class="sub">
										<p>Lorem Ipsum is simply dummy text of the printing </p>
									</div>
								</div>
							</a>

							<a href="javascript:;" class="splide__slide c-testimonials__grid-item">
								<div class="avtar-section">
									<img class="lazymissing" src="/bhashini-local/images/states/circle-map.png" alt="" class="u-icon img-fluid">
								</div>
								<div class="content-section">
									<div class="main">
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
										<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									</div>
									<div class="sub">
										<p>Lorem Ipsum is simply dummy text of the printing </p>
									</div>
								</div>
							</a>

							<a href="javascript:;" class="splide__slide c-testimonials__grid-item">
								<div class="avtar-section">
									<img class="lazymissing" src="/bhashini-local/images/states/circle-map.png" alt="" class="u-icon img-fluid">
								</div>
								<div class="content-section">
									<div class="main">
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
										<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									</div>
									<div class="sub">
										<p>Lorem Ipsum is simply dummy text of the printing </p>
									</div>
								</div>
							</a>
							 
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>     
<!-- Modal -->
<div id="testimonialVideoModal" class="modal fade o-modal--v1" role="dialog">
	<div class="modal-dialog"> 
		<!-- Modal content-->
		<div class="modal-content"> 
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			<div class="modal-body"> 	 
				<iframe width="100%" height="550" src="#" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				 
			</div> 
		</div>

	</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
	var splide = new Splide('.js-testiSlide', {
		perPage: 4,
		perMove: 1,
		pagination: false,
		breakpoints: {
			567: {
				perPage: 1,
				gap: '2rem',
			},
			767: {
				perPage: 2,
				gap: '2rem',
			},
			1199: {
				perPage: 3,
				gap: '2rem',
			},
			1920: {
				perPage: 3,
				gap: '3rem',
			},
		},
	});
	splide.mount(); 
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
	var splide = new Splide('.js-partnerSlide', {
		perPage: 4,
		perMove: 1,
		pagination: false,
		breakpoints: {
			567: {
				perPage: 1,
				gap: '2rem',
			},
			767: {
				perPage: 2,
				gap: '2rem',
			},
			1199: {
				perPage: 3,
				gap: '2rem',
			},
			1920: {
				perPage: 4,
				gap: '3rem',
			},
		},
	});
	splide.mount(); 
});
</script>