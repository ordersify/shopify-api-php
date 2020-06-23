<?php

namespace Slince\Shopify\Manager\PriceSet;

class PriceSet
{
    /** @var ShopMoney $shopMoney */
    protected $shopMoney;

    /** @var PresentmentMoney $presentmentMoney */
    protected $presentmentMoney;

    /**
     * @return PresentmentMoney
     */
    public function getPresentmentMoney(): PresentmentMoney
    {
        return $this->presentmentMoney;
    }

    /**
     * @return ShopMoney
     */
    public function getShopMoney(): ShopMoney
    {
        return $this->shopMoney;
    }

    /**
     * @param PresentmentMoney $presentmentMoney
     */
    public function setPresentmentMoney(PresentmentMoney $presentmentMoney): void
    {
        $this->presentmentMoney = $presentmentMoney;
    }

    /**
     * @param ShopMoney $shopMoney
     */
    public function setShopMoney(ShopMoney $shopMoney): void
    {
        $this->shopMoney = $shopMoney;
    }
}