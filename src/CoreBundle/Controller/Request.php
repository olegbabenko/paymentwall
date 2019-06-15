<?php

namespace CoreBundle\Controller;

/**
 * Class Request
 *
 * @package CoreBundle\Controller
 */
class Request
{
    /**
     * @var array
     */
    private $properties;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * @param $key
     *
     * @return string|null
     */
    public function getProperty($key): ?string
    {
        return $this->properties[$key] ?? null;
    }

    /**
     * @param $key
     * @param $value
     */
    public function setProperty($key, $value): void
    {
        $this->properties[$key] = $value;
    }

    /**
     * @return array|null
     */
    public function getProperties(): ?array
    {
        return $this->properties ?? null;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $_SERVER['HTTP_CONTENT_TYPE'];
    }

    /**
     * Request init action
     */
    public function init(): void
    {
        if (isset($_SERVER['REQUEST_METHOD'])){
            $this->properties = $_REQUEST;

            return;
        }

        foreach ($_SERVER['argv'] as $argument){
            if (strpos($argument, '=')){
                list($key, $value) = explode('=', $argument);
                $this->setProperty($key, $value);
            }
        }
    }
}
