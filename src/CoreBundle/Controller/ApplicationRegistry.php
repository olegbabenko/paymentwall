<?php

namespace CoreBundle\Controller;

use CoreBundle\Dictionary\ConfigParams;

/**
 * Class ApplicationRegistry
 *
 * @package CoreBundle\Controller
 */
class ApplicationRegistry extends Registry
{
    /**
     * @var array
     */
    private $values = array();

    /**
     * @var ApplicationRegistry
     */
    private static $instance;

    /**
     * ApplicationRegistry constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return ApplicationRegistry
     */
    public static function instance(): ApplicationRegistry
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
     * @return string|null
     */
    public static function getDSN(): ?string
    {
        return self::instance()->get(ConfigParams::DSN);
    }

    /**
     * @param $dsn
     *
     * @return void
     */
    public static function setDSN($dsn): void
    {
        self::instance()->set(ConfigParams::DSN, $dsn);
    }
}
