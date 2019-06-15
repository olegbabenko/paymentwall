<?php

namespace CoreBundle\Controller;

use CoreBundle\Dictionary\RequestParams;

/**
 * Class RequestRegistry
 *
 * @package CoreBundle\Controller
 */
class RequestRegistry extends Registry
{
    /**
     * @var array
     */
    private $values = array();

    /**
     * @var RequestRegistry
     */
    private static $instance;

    /**
     * RequestRegistry constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return RequestRegistry
     */
    public static function instance(): RequestRegistry
    {
        if (self::$instance === null){
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param $key
     *
     * @return mixed|null
     */
    protected function get($key)
    {
        return $this->values[$key] ?? null;
    }

    /**
     * @param $key
     * @param $value
     *
     * @return void
     */
    protected function set($key, $value): void
    {
        $this->values[$key] = $value;
    }

    /**
     * @return Request
     */
    public static function getRequest(): Request
    {
        $instance = self::instance();

        if ($instance->get(RequestParams::REQUEST_NAME) === null) {
            $instance->set(RequestParams::REQUEST_NAME, new Request());
        }

        return $instance->get(RequestParams::REQUEST_NAME);
    }
}
