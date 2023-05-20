<? $route = explode('/', page()->path); ?>

<div class="wpu__breadcrumbs my-30">
	<ul class="list-reset flex text-grey-dark">
		<li class="inline">
			<a href="/" class="red-300 fs-12 lh-14">
				<span><?= ucfirst('Home'); ?></span>
			</a>
		</li>

		<? foreach($route as $key => $segment):  ?>
			<? $segments[] = $segment; ?>

			<?php
			if (strpos($segment, '-'))
			{
				$segmentsExplodedArray = explode('-', $segment);
				$breadCrumbsText = '';

				foreach ($segmentsExplodedArray as $seg)
				{
					$breadCrumbsText .= ' ' . ucfirst($seg);
				}
			}
			else
			{
				$breadCrumbsText = ucfirst($segment);
			}
			?>

			<? if ($key != count($route) - 1): ?>
				<li class="inline">
					<a href="<?= route(implode('/', $segments)) ?>" class="red-300 fs-12 lh-14">
						<span><?= ucfirst($breadCrumbsText); ?></span></a>
				</li>
			<? else: ?>
				<li class="inline is-active">
					<span itemprop="name" class="red-300 fs-12 lh-14">
						<?= (page()->isCollection() && !state()->isUnique()) ? $breadCrumbsText : page()->title; ?>
					</span>
				</li>
			<? endif; ?>
		<? endforeach; ?>
	</ul>
</div>

<? //Generate microdata
$segments  = [];
$microdata = data([
	"@context" => "https://schema.org",
	"@type"    => "BreadcrumbList",
	'itemListElement' => []
]);

foreach ($route as $key => $segment)
{
	$segments[] = $segment;
	$microdata->itemListElement = [
		"@type"    => "ListItem",
		"position" => $key + 1,
		"name"     => rtrim(page()->isCollection() ? ucfirst($segment) : page()->title, '.'),
		"item"     =>(string) url(route(implode('/', $segments)))
	];
}
?>

<script data-inline type="application/ld+json">
	<?= $microdata ?>
</script>
