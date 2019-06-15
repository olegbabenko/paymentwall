<?php

namespace PaymentsBundle\Controller;

use PaymentBundle\Dictionary\Payments;
use Payments\Controller\AbstractValidator;
use Payments\Controller\CardValidator;

/**
 * Class ValidatorFactory
 *
 * @package PaymentsBundle\Controller
 */
class ValidatorFactory extends AbstractValidatorFactory
{
    /**
     * @param string $paymentType
     *
     * @return AbstractValidator
     */
    public static function create(string $paymentType): AbstractValidator
    {
        if ($paymentType === Payments::PAYMENT_TYPE_CARD){
            return new CardValidator();
        }

        return new MobileValidator();
    }
}
