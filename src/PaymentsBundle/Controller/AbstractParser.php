<?php

namespace PaymentsBundle\Controller;

/**
 * Class AbstractParser
 *
 * @package PaymentsBundle\Controller
 */
abstract class AbstractParser
{
    /**
     * @param $inputData
     *
     * @return mixed
     */
    abstract public function getData($inputData);
}
