<?php

declare(strict_types=1);

namespace Documents\Ecommerce;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use InvalidArgumentException;

/** @ODM\EmbeddedDocument */
class Money
{
    /**
     * @ODM\Field(type="float")
     *
     * @var float|null
     */
    protected $amount;

    /**
     * @ODM\ReferenceOne(targetDocument=Documents\Ecommerce\Currency::class, cascade="all")
     *
     * @var Currency|null
     */
    protected $currency;

    public function __construct($amount, Currency $currency)
    {
        $amount = (float) $amount;
        if (empty($amount) || $amount <= 0) {
            throw new InvalidArgumentException(
                'money amount cannot be empty, equal or less than 0'
            );
        }

        $this->amount = $amount;
        $this->setCurrency($currency);
    }

    public function getAmount()
    {
        return $this->amount * $this->getCurrency()->getMultiplier();
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency(Currency $currency): void
    {
        $this->currency = $currency;
    }
}
