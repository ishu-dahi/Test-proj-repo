<?php

class ExtPagesTemplateFilterImage extends ComPagesTemplateFilterAbstract
{
    protected function _initialize(KObjectConfig $config)
    {
        $config->append(array(
            'priority' => self::PRIORITY_LOWEST,
            'enable'   => JDEBUG ? false : true,
        ));

        parent::_initialize($config);
    }

    public function enabled()
    {
        return (bool) $this->getConfig()->enable;
    }

    public function filter(&$text)
    {
        //Filter the images only at the end of the rendering cycle
        // Hack - if condition changed by Tekdi team
        // if($this->getTemplate()->getLayout() === false && $this->enabled())
        if(/*$this->getTemplate()->getLayout() === false &&*/ $this->enabled())
        {
            $matches = array();
            //First pass - Find images between <ktml:images></ktml:images>
            if(preg_match_all('#<ktml:images(.*)>(.*)<\/ktml:images>#siU', $text, $matches))
            {
                foreach($matches[0] as $key => $match)
                {
                    $attribs = $this->parseAttributes($matches[1][$key]);

                    //Convert class to array
                    if(isset($attribs['class'])) {
                        $attribs['class'] = explode(' ', $attribs['class']);
                    }

                    //Filter image elements
                    $result = $this->filterImages($matches[2][$key], $attribs);

                    //Filter background images
                    $result = $this->filterBackgroundImages($result, $attribs);

                    $text = str_replace($match, $result, $text);
                }
            }

            //Second pass - Filter image elements
            $text =  $this->filterImages($text);

            //Second pass- Filter the background images
            $text = $this->filterBackgroundImages($text);

            //Add client hints
            $text .= '<meta http-equiv="Accept-CH" content="dpr, width, viewport-width, downlink" />';
            $text .= '<meta http-equiv="Accept-CH-Lifetime" content="86400" />';
        }
    }

    public function filterImages($html, $config = array())
    {
        $matches = array();
        if(preg_match_all('#<img\s([^>]*?[\'\"][^>]*?)>(?!\s*<\/noscript>)#siU', $html, $matches))
        {
            foreach($matches[1] as $key => $match)
            {
                $attribs = $this->parseAttributes($match);
                $src     = $attribs['src'] ?? null;
                $valid   = !isset($attribs['srcset']) && !isset($atrribs['data-srcset']) && !isset($attribs['data-src']);

                //Only handle none responsive supported images
                if($src && $valid && $this->getTemplate()->helper('image.supported', $src))
                {
                    //Convert class to array
                    if(isset($attribs['class'])) {
                        $attribs['class'] = explode(' ', $attribs['class']);
                    }

                    $attribs['url'] = '/'.ltrim($src, '/');
                    unset($attribs['src']);

                    foreach($attribs as $name => $value)
                    {
                        if(strpos($name, 'data-') !== false)
                        {
                            unset($attribs[$name]);

                            $name = str_replace('data-', '', $name);

                            if($value === 'true') {
                                $value = true;
                            }

                            if($value === 'false') {
                                $value = false;
                            }

                            $attribs[$name] = $value;
                        }
                    }

                    //Rename hyphen to underscore
                    $options = array();
                    foreach(array_replace_recursive($config, $attribs) as $name => $value)
                    {
                        $name = str_replace('-', '_', $name);
                        $options[$name] = $value;
                    }

                    //Filter the images
                    $html = str_replace($matches[0][$key], $this->getTemplate()->helper('image', $options), $html);
                }
            }
        }

        return $html;
    }

    public function filterBackgroundImages($html, $config = array())
    {
        $matches = array();
        if(preg_match_all('#<[a-zA-Z0-9+\#.-]+(\s[^>]*?(background-image\s*:\s*url\((.+)\);).*)>#iU', $html, $matches))
        {
            foreach($matches[1] as $key => $match)
            {
                $html .= $this->getTemplate()->helper('image.import', 'bgset');

                $attribs = $this->parseAttributes($match);

                foreach($attribs as $name => $value)
                {
                    if(strpos($name, 'data-') !== false)
                    {
                        unset($attribs[$name]);

                        $name = str_replace('data-', '', $name);

                        if($value === 'true') {
                            $value = true;
                        }

                        if($value === 'false') {
                            $value = false;
                        }

                        $attribs[$name] = $value;
                    }
                }


                //Rename hyphen to underscore
                $options = array();
                foreach(array_replace_recursive($config, $attribs) as $name => $value)
                {
                    $name = str_replace('-', '_', $name);
                    $options[$name] = $value;
                }


                if($srcset = $this->getTemplate()->helper('image.srcset', $matches[3][$key], $options))
                {
                    $attribs['data-sizes'] = 'auto';
                    $attribs['data-bgset'] = implode(',', $srcset);

                    if(isset($attribs['class'])) {
                        $attribs['class'] = $attribs['class'].' lazyload';
                    } else {
                        $attribs['class'] = 'lazyload';
                    }

                    $attribs['style'] = str_replace($matches[2][$key], '', $attribs['style']);

                    if(empty(trim($attribs['style'], '"'))) {
                        unset($attribs['style']);
                    }

                    $attribs = $this->buildAttributes($attribs);

                    //Filter the images
                    $html = str_replace($matches[1][$key], $attribs, $html);
                }
            }
        }

        return $html;
    }
}
