<?php

namespace CoreBundle\Controller;

/**
 * Class Registry
 *
 * @package CoreBundle\Controller
 */
abstract class Registry
{
    /**
     * @param $key
     *
     * @return mixed
     */
    abstract protected function get($key);

    /**
     * @param $key
     * @param $value
     *
     * @return mixed
     */
    abstract protected function set($key, $value);
}
