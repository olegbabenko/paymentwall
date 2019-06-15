<?php

namespace Payments\Controller;

use PaymentBundle\Dictionary\Payments;

/**
 * Class CardValidator
 *
 * @package Payments\Controller
 */
class CardValidator extends AbstractValidator
{
    /**
     * @param array $inputData
     *
     * @return array
     */
    public function validate(array $inputData): array
    {
        $errors = [];

        $this->checkNumber($inputData[Payments::PAYMENT_DATA][Payments::PAYMENT_DATA_NUMBER], $errors);
        $this->checkDate($inputData[Payments::PAYMENT_DATA][Payments::PAYMENT_DATA_DATE], $errors);
        $this->checkCvv($inputData[Payments::PAYMENT_DATA][Payments::PAYMENT_DATA_CVV], $errors);
        $this->checkEmail($inputData[Payments::PAYMENT_DATA][Payments::PAYMENT_DATA_EMAIL], $errors);

        if (count($errors) > 0 ){
            return [
                'result' => false,
                'errors' => $errors
            ];
        }

        return [
            'result' => true
        ];
    }

    /**
     * @param string $number
     * @param array  $errors
     */
    private function checkNumber(string $number, array &$errors): void
    {
       if (empty($number)){
           $errors[] = 'Credit card number is empty';
       }
    }

    /**
     * @param string $date
     * @param array  $errors
     */
    private function checkDate(string $date, array &$errors): void
    {
        if (empty($date)){
            $errors[] = 'Expiration date is empty';
        }

        if (strlen($date) !== 5){
            $errors[] = 'Wrong date format';
        }

        $dateArray = explode('/', $date);
        [$month, $year] = $dateArray;

        if (strlen($month) !== 2){
            $errors[] = 'Wrong month format in expiration date';
        }

        if (strlen($month) !== 2){
            $errors[] = 'Wrong year format in expiration date';
        }

        if (preg_match(Payments::PAYMENT_NUMERIC_PATTERN, $month) === 1 || $month < 1 || $month > 12 ) {
            $errors[] = 'Invalid value of month in expiration date';
        }

        if (preg_match(Payments::PAYMENT_NUMERIC_PATTERN, $year) === 1 || $year < date('y'))
        {
            $errors[] = 'Invalid value of year in expiration date';
        }

        if ($year === date('y') && $month <= date('m')){
            $errors[] = 'Entered date has expired';
        }
    }

    /**
     * @param string $cvv
     * @param array  $errors
     */
    private function checkCvv(string $cvv, array &$errors): void
    {
        if (empty($cvv)){
            $errors[] = 'CVV2 is empty';
        }

        if (strlen($cvv) !== 3){
            $errors[] = 'Wrong format CVV2';
        }

        if (preg_match(Payments::PAYMENT_NUMERIC_PATTERN, $cvv) === 1)
        {
            $errors[] = 'Invalid value CVV2';
        }
    }

    /**
     * @param string $email
     * @param array  $errors
     */
    private function checkEmail(string $email, array &$errors): void
    {
        if (empty($email)){
            $errors[] = 'Email is empty';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Email is invalid';
        }
    }
}
