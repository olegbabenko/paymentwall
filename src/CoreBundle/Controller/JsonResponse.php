<?php

namespace CoreBundle\Controller;

use CoreBundle\Dictionary\Api;

/**
 * Class JsonResponse
 *
 * @package CoreBundle\Controller
 */
class JsonResponse
{
    /**
     * @var mixed
     */
    public $status;

    /**
     * @var mixed
     */
    private $code;

    /**
     * JsonResponse constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->status = $data[Api::STATUS];
        $this->code = $data[Api::CODE];
        $this->create($data);
    }

    /**
     * @param $data
     *
     * @return false|string
     */
    public function create($data)
    {
        header('Content-Type: application/json');
        header('Status: '.$this->code);

        return json_encode($data);
    }
}
