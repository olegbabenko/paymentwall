<?php

namespace PaymentsBundle\Controller;

use CoreBundle\Controller\ApiController;
use CoreBundle\Controller\Request;
use CoreBundle\Dictionary\RequestParams;
use PaymentBundle\Dictionary\Payments;
use Payments\Services\PaymentsValidator;
use CoreBundle\Controller\JsonResponse;
use CoreBundle\Dictionary\Api;

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
        if ($_SERVER['REQUEST_METHOD'] === RequestParams::REQUEST_METHOD_GET){
            echo 'This method not allowed';
            exit();
        }

        $content = $request->getProperties();
        $contentType = $request->getContentType();

        if (!in_array($contentType, RequestParams::ALLOWED_REQUEST_TYPES, true)){
            return $this->error(
                 [
                     Api::RESULT => false,
                     Api::ERRORS => 'Parameter \'content type\' of request is not allowed'
                 ]
            );
        }

        $parser = ParserFactory::create($contentType);
        $inputData = $parser->getData($content);
        $hashResult = $this->hashValidate($inputData);

        if ($hashResult){
            return $this->error(
                [
                    Api::RESULT => false,
                    Api::ERRORS => 'Incorrect hash value'
                ]
            );
        }

        $result = $this->paymentsValidator->validate($inputData);

        if (count($result) > 1){
            return $this->error($result);
        }

        return $this->success(true);
    }

    /**
     * @param $inputData
     *
     * @return bool
     */
    private function hashValidate($inputData): bool
    {
        $hash = $inputData[Payments::PAYMENT_DATA_HASH];
        unset($inputData[Payments::PAYMENT_DATA_HASH], $inputData[Payments::PAYMENT_TYPE]);
        $newHash = md5(json_encode($inputData));
        $result = hash_equals($hash, $newHash);

        if ($result){
            return true;
        }

        return false;
    }
}
