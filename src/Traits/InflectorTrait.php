<?php

namespace Slince\Shopify\Traits;

use Doctrine\Inflector\CachedWordInflector;
use Doctrine\Inflector\Inflector;
use Doctrine\Inflector\Rules\English;
use Doctrine\Inflector\RulesetInflector;

trait InflectorTrait
{
    /** @var Inflector|null $inflector */
    protected $inflector = null;

    /**
     * Get Inflector
     *
     * @return Inflector
     */
    public function getInflector()
    {
        if (is_null($this->inflector)) {
            $this->inflector = new Inflector(
                new CachedWordInflector(new RulesetInflector(
                    English\Rules::getSingularRuleset()
                )),
                new CachedWordInflector(new RulesetInflector(
                    English\Rules::getPluralRuleset()
                ))
            );
        }
        return $this->inflector;
    }
}