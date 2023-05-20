<?php

class ExtPagesSubscriberRedirector extends ComPagesEventSubscriberAbstract
{
    protected function _initialize(KObjectConfig $config)
    {
        $config->append(array(
            'priority'  => KEvent::PRIORITY_HIGHEST,
            'redirects' => array(),
        ));

        parent::_initialize($config);
    }

    public function onAfterApplicationRoute(KEventInterface $event)
    {
        $request = $this->getObject('request');
        $base    = $request->getBasePath();
        $url     = urldecode( $request->getUrl()->getPath());

        $route  = rtrim(str_replace(array($base, '/index.php'), '', $url), '/');

        // Hacks by tekdi - lines commened, and lines next to those
        $redirectsArray = include KPATH_PAGES . '/redirects.php';

        if($url = $this->getConfig()->redirects->get($route))
        //if (!empty($redirectsArray[$route]))
        {
            $dispatcher = $this->getObject('com://site/pages.dispatcher.http');
            $response   = $dispatcher->getResponse();

            //Set the redirect status
            $response->setStatus(KHttpResponse::MOVED_PERMANENTLY);

            $dispatcher->redirect($url);

            // 301 Moved Permanently
            //header("Location: " . $redirectsArray[$route], TRUE, 301);
            //die();
        }
    }
}
