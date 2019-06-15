<?php

namespace PaymentsBundle\Controller;

/**
 * Class AbstractParserFactory
 *
 * @package PaymentsBundle\Controller
 */
abstract class AbstractParserFactory
{
    /**
     * @param string $contentType
     *
     * @return mixed
     */
    abstract protected static function create(string $contentType);
}
