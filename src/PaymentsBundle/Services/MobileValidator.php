<?php

namespace PaymentsBundle\Controller;

use CoreBundle\Dictionary\Api;
use Payments\Controller\AbstractValidator;
use PaymentBundle\Dictionary\Payments;
use PaymentsBundle\Helpers\Sanitizer;

/**
 * Class MobileValidator
 *
 * @package PaymentsBundle\Controller
 */
class MobileValidator extends AbstractValidator
{
    use Sanitizer;

    /**
     * @param array $inputData
     *
     * @return array
     */
    public function validate(array $inputData): array
    {
        $errors = [];
        $this->checkNumber($inputData[Payments::PAYMENT_DATA][Payments::PAYMENT_DATA_NUMBER],$errors);

        if (count($errors) > 0 ){
            return [
                Api::RESULT => false,
                Api::ERRORS => $errors
            ];
        }

        return [
            Api::RESULT => true
        ];
    }

    /**
     * @param string $number
     * @param        $errors
     */
    private function checkNumber(string $number, &$errors): void
    {
        $number = $this->sanitize($number);

        if (preg_match(Payments::PAYMENT_NUMERIC_PATTERN, $number))
        {
            $errors[] = 'Wrong phone format';
        }

        if (strlen($number) > 12 || strlen($number) < 10){
            $errors[] = 'Incorrect phone number';
        }
    }
}
