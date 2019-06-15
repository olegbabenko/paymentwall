<?php

namespace PaymentsBundle\Controller;

/**
 * Class AbstractValidatorFactory
 *
 * @package PaymentsBundle\Controller
 */
abstract class AbstractValidatorFactory
{
    /**
     * @param string $paymentType
     *
     * @return mixed
     */
    abstract public static function create(string $paymentType);
}
