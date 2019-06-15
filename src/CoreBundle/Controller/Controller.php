<?php

namespace CoreBundle\Controller;

use CoreBundle\Helpers\ApplicationHelper;

/**
 * Class Controller
 *
 * @package CoreBundle\Controller
 */
class Controller
{
    /**
     * Controller constructor.
     */
    private function __construct()
    {
    }

    public static function run(): void
    {
        $instance = new Controller();
        $instance->init();
        $instance->handleRequest();
    }

    private function handleRequest()
    {
        $request = RequestRegistry::getRequest();
    }

    private function init()
    {
        $applicationHelper = ApplicationHelper::instance();
        $applicationHelper->init();

    }
}
