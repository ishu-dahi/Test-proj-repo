<?php

class ExtPagesTemplateHelperLazysizes extends ComPagesTemplateHelperBehavior
{
	public function import($plugin = '', $config = array())
	{
		$config = new KObjectConfigJson($config);
		$config->append(array(
			'debug' =>  JFactory::getApplication()->getCfg('debug'),
		));

		$html   = '';
		$script = $plugin ? 'lazysizes-'.$plugin : 'lazysizes';
		if (!static::isLoaded($script))
		{
			if($script == 'lazysizes')
			{
				// Hack by Tekdi - commented line
				// $html .= '<ktml:script src="https://unpkg.com/lazysizes@5.2.2/lazysizes.'.(!$config->debug ? 'min.js' : 'js').'" defer="defer" />';
				$html .= <<<LAZYSIZES
<script>
window.lazySizesConfig = window.lazySizesConfig || {}
window.lazySizesConfig.fastLoadedClass = 'lazycached'

if ('connection' in navigator) {
	/*Only load nearby elements*/
	if(navigator.connection.effectiveType.includes('2g')) { window.lazySizesConfig.loadMode = 2}

    /*Only load visible elements*/
	if(navigator.connection.saveData === true) { window.lazySizesConfig.loadMode = 1}
}

window.addEventListener('lazybeforeunveil', function (e) {
    var detail = e.detail;
    if(detail.instance == lazySizes) {
        var img = e.target;
        setTimeout(function () {
            if (img.complete && img.naturalHeight) {
                img.classList.add('lazycached');
            }
        }, 75);
    }
});
</script>

<style>
/* Lazyloaded images */
span.img-container {display: inline-block; overflow: hidden;}

span.img-container > img {margin: 0;}

.lazyprogressive {background-image: var(--lqi); background-repeat: no-repeat; background-size: contain; filter: blur(8px);}

.lazyloaded {filter: blur(0); transition: filter 300ms linear;}

.ls-is-cached, .lazycached {filter: none; transition: none;}

.lazymissing {/*^TKD*/ /*text-align: center; color: #4a5568; background-color: #f7fafc;  border: 2px dotted #e2e8f0; font-size: 0.875rem; padding: 1rem;*/}
</style>
LAZYSIZES;
			}

			// Hack by Tekdi - commented lines
			/*if($script == 'lazysizes-bgset')
			{
				$html .= $this->import();
				$html .= '<ktml:script src="https://unpkg.com/lazysizes@5.2.2/plugins/bgset/ls.bgset.' . (!$config->debug ? 'min.js' : 'js') . '" defer="defer" />';
			}

			if($script == 'lazysizes-unveilhooks')
			{
				$html .= $this->import();
				$html .= '<ktml:script src="https://unpkg.com/lazysizes@5.2.2/plugins/unveilhooks/ls.unveilhooks.' . (!$config->debug ? 'min.js' : 'js') . '" defer="defer" />';
			}*/

			static::setLoaded($script);
		}

		return $html;
	}
}
