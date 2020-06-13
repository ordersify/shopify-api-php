<?php

namespace Slince\Shopify\Traits;

use Psr\Http\Message\ResponseInterface;
use Slince\Shopify\ResponseAccess;

/**
 * Trait ResponseTransform
 * @package Slince\Shopify\Traits
 * @see https://github.com/osiset/Basic-Shopify-API/blob/master/src/Osiset/BasicShopifyAPI/Traits/ResponseTransform.php
 */
trait ResponseTransform
{
    /**
     * Convert response to response access
     * @param ResponseInterface $body
     * @return ResponseAccess
     */
    public function toResponse($body)
    {
        $decoded = json_decode($body, true, 512, JSON_BIGINT_AS_STRING);
        return new ResponseAccess($decoded);
    }
}
