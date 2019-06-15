<?php

namespace PaymentsBundle\Controller;

use CoreBundle\Controller\ApiController;
use CoreBundle\Controller\Request;
use Payments\Services\PaymentsValidator;
use CoreBundle\Controller\JsonResponse;

/**
 * Class PaymentController
 *
 * @package PaymentsBundle\Controller
 */
class PaymentController extends ApiController
{
    /**
     * @var PaymentsValidator
     */
    private $paymentsValidator;

    /**
     * PaymentController constructor.
     */
    public function __construct()
    {
        $this->paymentsValidator = new PaymentsValidator();
    }

    /**
     * @param Request $request
     */
    public function index(Request $request): void
    {
        //TODO: default page for payments must be here
        echo 'Wrong route, try another one';
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function validation(Request $request): JsonResponse
    {
        $content = $request->getProperties();
        $contentType = $request->getContentType();
        $parser = ParserFactory::create($contentType);
        $inputData = $parser->getData($content);
        $result = $this->paymentsValidator->validate($inputData);

        if (count($result) > 1){
            return $this->error($result);
        }

        return $this->success(true);
    }
}
