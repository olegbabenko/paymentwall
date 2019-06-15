<?php

namespace PaymentBundle\Dictionary;

/**
 * Class Payments
 *
 * @package PaymentBundle\Dictionary
 */
class Payments
{
    /**
     * @const string
     */
    public const PAYMENT_TYPE = 'payment_type';

    /**
     * @const string
     */
    public const PAYMENT_DATA = 'payment_data';


    /**
     * @const string
     */
    public const PAYMENT_TYPE_CARD = 'card';

    /**
     * @const string
     */
    public const PAYMENT_TYPE_MOBILE = 'mobile';

    /**
     * @const string
     */
    public const PAYMENT_DATA_NUMBER = 'number';

    /**
     * @const string
     */
    public const PAYMENT_DATA_DATE = 'date';

    /**
     * @const string
     */
    public const PAYMENT_DATA_CVV = 'cvv';

    /**
     * @const string
     */
    public const PAYMENT_DATA_EMAIL = 'email';

    /**
     * @const string
     */
    public const PAYMENT_NUMERIC_PATTERN = '/\D/';
}
