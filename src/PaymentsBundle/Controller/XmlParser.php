<?php

namespace PaymentsBundle\Controller;

/**
 * Class XmlParser
 *
 * @package PaymentsBundle\Controller
 */
class XmlParser extends AbstractParser
{
    /**
     * @param $inputData
     *
     * @return mixed
     */
    public function getData($inputData)
    {
        $data = simplexml_load_string($inputData);

        return json_decode(json_encode($data), true);
    }
}
