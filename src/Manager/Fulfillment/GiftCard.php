<?php

/*
 * This file is part of the slince/shopify-api-php
 *
 * (c) Slince <taosikai@yeah.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Slince\Shopify\Manager\Fulfillment;

use Slince\Shopify\Common\Model\Model;
use Slince\Shopify\Common\Model\AdminGraphqlApiId;
use Slince\Shopify\Manager\Order\LineItem;

class GiftCard extends Model
{

    /**
     * @var string
     */
    protected $lineItemId;

    /**
     * @var string
     */
    protected $maskedCode;

    /**
     * @return string
     */
    public function getLineItemId()
    {
        return $this->lineItemId;
    }

    /**
     * @param int $lineItemId
     *
     * @return GiftCard
     */
    public function setLineItemId($lineItemId)
    {
        $this->lineItemId = $lineItemId;

        return $this;
    }

    /**
     * @return string
     */
    public function getMaskedCode()
    {
        return $this->maskedCode;
    }

    /**
     * @param string $maskedCode
     *
     * @return GiftCard
     */
    public function setMaskedCode($maskedCode)
    {
        $this->maskedCode = $maskedCode;

        return $this;
    }
}
