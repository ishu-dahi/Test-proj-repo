<?php
define('KPATH_PAGES', JPATH_ROOT . '/joomlatools-pages');

return [
	/*'ext:pages.subscriber.minify' => ['enable' => getenv('SITE') ? true : false],
	'ext:pages.template.helper.image' => [
		'exclude'   => ['gif'],
		'max_width' => 1280,
		'base_path' => $_SERVER['PAGES_IMAGES_ROOT'],
	],*/
	'ext:pages.template.filter.image'   => [
		 'enable'    => true,
   ],
   /*'ext:pages.template.filter.video'   => [
		'enable'    => true
	],*/
	/*'ext:pages.subscriber.redirector' => [
	  'redirects' => include KPATH_PAGES . '/redirects.php'
	],*/
	'ext:pages.event.subscriber.redirector' => [
		'redirects' => include KPATH_PAGES . '/redirects.php'
	]
];
