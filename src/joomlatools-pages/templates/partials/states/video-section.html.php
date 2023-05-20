<div class="splide js-videoSlide">
	<div class="splide__track">
		<ul class="splide__list">
			<?
			$videos = $article->fields->get('state-language-videos')->value;
			foreach($videos as $video):
				if (strpos($video['url'], 'youtu') > 0)
				{
					if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video['url'], $match))
					{
						$vurl = "https://www.youtube.com/embed/" . $match[1];
					}
				}
				elseif (strpos($video['url'], 'vimeo') > 0)
				{
					$result = preg_match(
							'/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/(?:[^\/]*)\/videos\/|album\/(?:\d+)\/video\/|video\/|)(\d+)(?:[a-zA-Z0-9_\-]+)?/i',
							$video['url'], $mat);

					$vurl = "https://player.vimeo.com/video/" . $mat[1];
				}
				else
				{
					return false;
				}
			?>
			<li class="splide__slide">
				<? if (!empty($video['url'])): ?>
					<iframe width="100%" height="550" src="<?= $vurl; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<? endif; ?>
				<div class="title">
					<? if (!empty($video['title'])): ?>
						<?= $video['title']; ?>
					<? endif; ?>
				</div>
			</li>
			<? endforeach ?>
		</ul>
	</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
	var splide = new Splide('.js-videoSlide', {
		padding: '35rem',
		lazyLoad: 'nearby',
		cover: true,
		gap: '10rem',
	});
	splide.mount();
});
</script> 
