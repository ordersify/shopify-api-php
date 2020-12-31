<?php

namespace Slince\Shopify\Manager\Order;

use Slince\Shopify\Common\Model\Model;

class Duty extends Model
{
    protected $harmonizedSystemCode;
    protected $countryCodeOfOrigin;
    protected $shopMoney;
    protected $presentmentMoney;
    protected $taxLines;

    /**
     * @return mixed
     */
    public function getHarmonizedSystemCode()
    {
        return $this->harmonizedSystemCode;
    }

    /**
     * @param mixed $harmonizedSystemCode
     * @return Duty
     */
    public function setHarmonizedSystemCode($harmonizedSystemCode)
    {
        $this->harmonizedSystemCode = $harmonizedSystemCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountryCodeOfOrigin()
    {
        return $this->countryCodeOfOrigin;
    }

    /**
     * @param mixed $countryCodeOfOrigin
     * @return Duty
     */
    public function setCountryCodeOfOrigin($countryCodeOfOrigin)
    {
        $this->countryCodeOfOrigin = $countryCodeOfOrigin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getShopMoney()
    {
        return $this->shopMoney;
    }

    /**
     * @param mixed $shopMoney
     * @return Duty
     */
    public function setShopMoney($shopMoney)
    {
        $this->shopMoney = $shopMoney;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPresentmentMoney()
    {
        return $this->presentmentMoney;
    }

    /**
     * @param mixed $presentmentMoney
     * @return Duty
     */
    public function setPresentmentMoney($presentmentMoney)
    {
        $this->presentmentMoney = $presentmentMoney;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTaxLines()
    {
        return $this->taxLines;
    }

    /**
     * @param mixed $taxLines
     * @return Duty
     */
    public function setTaxLines($taxLines)
    {
        $this->taxLines = $taxLines;
        return $this;
    }


}
