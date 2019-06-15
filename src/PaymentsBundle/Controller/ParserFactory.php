<?php

namespace PaymentsBundle\Controller;

use CoreBundle\Dictionary\RequestParams;

/**
 * Class ParserFactory
 *
 * @package PaymentsBundle\Controller
 */
class ParserFactory extends AbstractParserFactory
{
    /**
     * @param string $contentType
     *
     * @return AbstractParser
     */
    public static function create(string $contentType): AbstractParser
    {
        if ($contentType === RequestParams::REQUEST_CONTENT_TYPE_XML){
            return new XmlParser();
        }

        return new JsonParser();
    }
}
