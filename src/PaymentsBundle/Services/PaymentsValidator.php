<?php

namespace Payments\Services;

use PaymentsBundle\Controller\ValidatorFactory;

/**
 * Class PaymentsValidator
 *
 * @package Payments\Services
 */
class PaymentsValidator
{
    /**
     * @param array $inputData
     *
     * @return mixed
     */
    public function validate(array $inputData)
    {
        $validator = ValidatorFactory::create($inputData['payment_type']);

        return $validator->validate($inputData);
    }
}
