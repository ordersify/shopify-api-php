<?php

/*
 * This file is part of the slince/shopify-api-php
 *
 * (c) Slince <taosikai@yeah.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Slince\Shopify\Manager\Order;

use Slince\Shopify\Common\Model\Model;
use Slince\Shopify\Manager\PriceSet\PriceSet;

class DiscountAllocation extends Model
{
    /**
     * @var string
     */
    protected $amount;

    /**
     * @var float
     */
    protected $value;

    /**
     * @var string
     */
    protected $discountApplicationIndex;

    /**
     * @var PriceSet
     */
    protected $amountSet;

    /**
     * @return string
     */
    public function getAmountSet()
    {
        return $this->amountSet;
    }

    /**
     * @param PriceSet $amountSet
     *
     * @return DiscountAllocation
     */
    public function setAmountSet($amountSet)
    {
        $this->amountSet = $amountSet;

        return $this;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     *                                                                
     * @return DiscountAllocation
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getDiscountApplicationIndex()
    {
        return $this->discountApplicationIndex;
    }

    /**
     * @param string $discountApplicationIndex
     *                                                                
     * @return DiscountAllocation
     */
    public function setDiscountApplicationIndex($discountApplicationIndex)
    {
        $this->discountApplicationIndex = $discountApplicationIndex;

        return $this;
    }
}