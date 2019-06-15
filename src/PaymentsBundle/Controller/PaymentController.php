<?php

namespace PaymentsBundle\Controller;

use CoreBundle\Controller\Request;

/**
 * Class PaymentController
 *
 * @package PaymentsBundle\Controller
 */
class PaymentController
{
    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        echo 'Payment controller is alive';
    }
}
