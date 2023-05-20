<?php
return array(

	'http_cache'              => true,
	// 'http_cache_time'         => 900,
	// 'http_cache_time_browser' => 900,

	// Static caching
	'http_static_cache'         => true, //getenv('PAGES_STATIC_ROOT') ? true : false,
	'http_static_cache_path'    => getenv('PAGES_STATIC_ROOT'), // ? getenv('PAGES_STATIC_ROOT') : false,

	// Page caching
	'page_cache'            => false,
	// 'page_cache_path'       => JPATH_ROOT.'/joomlatools-pages/cache/pages',
	// 'data_cache_validation' => true,

	// Data caching
	'data_cache'            => false,
	// 'data_cache_path'       => JPATH_ROOT.'/joomlatools-pages/cache/data',
	// 'data_cache_validation' => true,
	// 'data_namespaces'       => array(),

	// Remote caching
	'http_resource_cache'        => false, //JFactory::getConfig()->get('caching'),
	// 'http_resource_cache_path'   => JPATH_ROOT.'/joomlatools-pages/cache/resources',
	// 'http_resource_cache_debug'  => JDEBUG ? false : true,

	// Template caching
	'template_cache'            => false, //DEBUG ? false : true,
	// 'template_cache_path'       => JPATH_ROOT.'/joomlatools-pages/cache/templates',
	// 'template_cache_validation' => true,

	'data_namespaces' => [
		'global'  => JPATH_ROOT . '/joomlatools-pages/data'
	],

	// Site
	'site' => [
		'body_class'        => '',
		'main_color'        => '#313970',
		'name'              => 'Bhashini',
	],

	// Page
	'page' => [
		'metadata' => [
			'summary'       => 'Bhashini',
			'og:site_name'  => 'Bhashini',
			'og:url'        => 'http://ttpl99-php74.local/tekdi-bhashini/',
			'og:title'      => 'Bhashini',
			'og:description'=> 'Bhashini',
			'og:image'      => '/images/logo.png',
			// 'twitter:site'  => '@todoaddhere',
			// 'twitter:card'  => 'summary_large_image',
		],

		'visible'   => true,
		'published' => true,
	],

	'aliases' => [
		'theme://'  => '/theme/',
		'images://' => '/images/',
	],

	// 'aliases' => [
	// 	'theme://'                      => '/theme/',
	// 	'images://'                     => '/images/',
	// 	"'images"                       => "'/images/",
	// 	'images/'                       => '/images/',
	// 	'/images/'                      => '/images/',
	// 	'//tekdi-bhashini'              => '/tekdi-bhashini',
	// 	'tekdi-bhashini' => 'tekdi-bhashini',
	// 	'theme/images/'  => 'theme/images/'
	// ],

	// Google Analytics (Google Tag Manager Code)
	'gtm_code' => '',

	// Extensions
	/*'extension_path' =>
	[
		JPATH_ROOT . '/extensions',
	],*/

	'base_url' => '/',
);
