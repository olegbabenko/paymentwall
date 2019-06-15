<?php

namespace CoreBundle\Dictionary;

/**
 * Class RequestParams
 *
 * @package CoreBundle\Dictionary
 */
class RequestParams
{
    /**
     * @const string
     */
    public const REQUEST_NAME = 'request';

    /**
     * @const string
     */
    public const REQUEST_METHOD_GET = 'GET';

    /**
     * @const string
     */
    public const REQUEST_CONTENT_TYPE_JSON = 'application/json';

    /**
     * @const string
     */
    public const REQUEST_CONTENT_TYPE_XML = 'application/xml';

    /**
     * @const array
     */
    public const ALLOWED_REQUEST_TYPES = [
        self::REQUEST_CONTENT_TYPE_JSON,
        self::REQUEST_CONTENT_TYPE_XML
    ];
}
