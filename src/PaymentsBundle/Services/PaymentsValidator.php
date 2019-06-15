<?php

namespace Payments\Services;

use PaymentsBundle\Controller\ValidatorFactory;
use PaymentBundle\Dictionary\Payments;

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
     * @return array
     */
    public function validate(array $inputData): array
    {
        $validator = ValidatorFactory::create($inputData[Payments::PAYMENT_TYPE]);

        return $validator->validate($inputData);
    }
}
