<?php

namespace Payments\Controller;

use PaymentBundle\Dictionary\Payments;
use CoreBundle\Dictionary\Api;
use PaymentsBundle\Helpers\Sanitizer;

/**
 * Class CardValidator
 *
 * @package Payments\Controller
 */
class CardValidator extends AbstractValidator
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

        $this->checkNumber($inputData[Payments::PAYMENT_DATA][Payments::PAYMENT_DATA_NUMBER], $errors);
        $this->checkDate($inputData[Payments::PAYMENT_DATA][Payments::PAYMENT_DATA_DATE], $errors);
        $this->checkCvv($inputData[Payments::PAYMENT_DATA][Payments::PAYMENT_DATA_CVV], $errors);
        $this->checkEmail($inputData[Payments::PAYMENT_DATA][Payments::PAYMENT_DATA_EMAIL], $errors);

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
     * @param array  $errors
     */
    private function checkNumber(string $number, array &$errors): void
    {
        $number = $this->sanitize($number);

       if (empty($number)){
           $errors[] = 'Credit card number is empty';
       }

        if (preg_match(Payments::PAYMENT_NUMERIC_PATTERN, $number) === 1)
        {
            $errors[] = 'Invalid value of credit card number';
        }

        if (strlen($number) > 16 || strlen($number) < 13){
            $errors[] = 'Wrong format number of credit card';
        }
    }

    /**
     * @param string $date
     * @param array  $errors
     */
    private function checkDate(string $date, array &$errors): void
    {
        $date = $this->sanitize($date);

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
        $cvv = $this->sanitize($cvv);

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
        $email = $this->sanitize($email);

        if (empty($email)){
            $errors[] = 'Email is empty';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Email is invalid';
        }
    }
}
