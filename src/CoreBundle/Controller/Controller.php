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

    /**
     * Front Controller init action
     *
     * @throws \ErrorException
     */
    public static function run(): void
    {
        $instance = new Controller();
        $instance->init();
        $instance->handleRequest();
    }

    /**
     * @return void
     *
     * @throws \Exception
     */
    private function handleRequest(): void
    {
        $request = RequestRegistry::getRequest();
        $this->initRoute($request);
    }

    /**
     * @return void
     *
     * @throws \ErrorException
     */
    private function init(): void
    {
        $applicationHelper = ApplicationHelper::instance();
        $applicationHelper->init();
    }

    /**
     * @param Request $request
     *
     * @throws \Exception
     */
    private function initRoute(Request $request): void
    {
        RouteParser::init($request);
    }
}
