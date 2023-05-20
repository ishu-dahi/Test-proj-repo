---
process:
   filters:
       [ext:pages.template.filter.image, ext:joomla.template.filter.module]
---

<!DOCTYPE html>
<html xmlns:og="http://opengraphprotocol.org/schema/" class="h-full" lang="<?= route()->query['language']; ?>" dir="<?= direction() ?>" vocab="http://schema.org/">
<head>
	<meta charset="utf-8"/>
	<!--<base href="<? //= htmlspecialchars(url()); ?>" />-->

	<ktml:title>
	<ktml:meta>
	<ktml:link>
	<ktml:style>

	<title><?= title() ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<meta name="mobile-web-app-capable" content="yes"/>
	<meta name="apple-mobile-web-app-capable" content="yes"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
	<meta name="apple-mobile-web-app-title" content="<?= config()->site->name ?>"/>
	<meta name="application-name" content="<?= config()->site->name ?>"/>
	<meta name="theme-color" content="<?= config()->site->main_color ?>"/>

	<meta name="msapplication-config" content="theme://images/icons/browserconfig.xml"/>

	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="theme://images/icons/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="theme://images/icons/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="theme://images/icons/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="theme://images/icons/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="theme://images/icons/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="theme://images/icons/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="theme://images/icons/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="theme://images/icons/apple-touch-icon-152x152.png" />
	<link rel="apple-touch-icon-precomposed" sizes="180x180" href="theme://images/icons/apple-touch-icon-180x180.png" />

	<link rel="icon" type="image/png" href="theme://images/icons/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="theme://images/icons/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="theme://images/icons/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="theme://images/icons/android-chrome-192x192.png" sizes="192x192" />

	<ktml:style src="theme://css/mixed.min.css" rel="preload" as="style" />
	<ktml:script src="theme://js/app.min.js" defer="defer" />

	<script>
	document.addEventListener("DOMContentLoaded", () => {
		if ('connection' in navigator && navigator.connection.saveData === true) {
			document.documentElement.classList.add('save-data');
		}
	})
	</script>

	

	<noscript>
		<style data-inline>img.lazyprogressive {background-image: none; display: none;}</style>
	</noscript>
</head>

<body class="<?= isset(page()->class) ? config()->site->body_class . ' ' . page()->class : config()->site->body_class ?>">
	<div class="wrapper">
		<?= partial('template:partials/page/header'); ?>

		<ktml:content>

		<?= partial('template:partials/page/footer'); ?>
	</div>

	<ktml:script>
</body>
</html>
