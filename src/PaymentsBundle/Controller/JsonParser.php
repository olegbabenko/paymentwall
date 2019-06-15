<?php

namespace PaymentsBundle\Controller;

/**
 * Class JsonParser
 *
 * @package PaymentsBundle\Controller
 */
class JsonParser extends AbstractParser
{
    /**
     * @param $inputData
     *
     * @return array
     */
    public function getData($inputData): array
    {
        return json_decode($inputData, true);
    }
}
