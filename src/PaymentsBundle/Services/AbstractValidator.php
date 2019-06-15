<?php

namespace Payments\Controller;

/**
 * Class AbstractValidator
 *
 * @package Payments\Controller
 */
abstract class AbstractValidator
{
    /**
     * @param array $inputData
     *
     * @return mixed
     */
    abstract public function validate(array $inputData);
}
