<?php

namespace CoreBundle\Controller;

/**
 * Class DefaultController
 *
 * @package CoreBundle\Controller
 */
class DefaultController
{
    /**
     * Default entry point for application
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        echo 'Hi! We`re working hard, so default page coming soon';
    }
}
