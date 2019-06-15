<?php

namespace CoreBundle\Helpers;

use CoreBundle\Dictionary\ConfigParams;
use CoreBundle\Controller\ApplicationRegistry;

/**
 * Class ApplicationHelper
 *
 * @package CoreBundle\Helpers
 */
class ApplicationHelper
{
    /**
     * @var ApplicationHelper
     */
    private static $instance;

    /**
     * @var string
     */
    private $config = ConfigParams::CONFIG_FILE_PATH_XML;

    /**
     * ApplicationHelper constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return ApplicationHelper
     */
    public static function instance(): ApplicationHelper
    {
        if (self::$instance === null){
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @throws \ErrorException
     */
    public function init()
    {
        $dsn = ApplicationRegistry::getDSN();

        if ($dsn !== null){
            return;
        }

        $this->getOptions();
    }

    /**
     * @throws \ErrorException
     */
    private function getOptions(): void
    {
        $this->ensure(file_exists($this->config), 'Config file does not exist');
        // TODO: need to do refactoring and include yaml file, have some problem with php yaml extension
        $options = simplexml_load_file($this->config);
        $dsn = (string) $options->dsn;
        $this->ensure($dsn, 'DSN does not exist');
        ApplicationRegistry::setDSN($dsn);
    }

    /**
     * @param $expression
     * @param $message
     *
     * @throws \ErrorException
     */
    private function ensure($expression, $message): void
    {
        if (!$expression){
            throw new \ErrorException($message);
        }
    }
}
