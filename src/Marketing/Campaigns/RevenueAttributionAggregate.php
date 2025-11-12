<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Campaigns\RevenueAttributionAggregate\CurrencyCode;

/**
 * @phpstan-type RevenueAttributionAggregateShape = array{
 *   contactsNumber?: int|null,
 *   currencyCode?: value-of<CurrencyCode>|null,
 *   dealAmount?: float|null,
 *   dealsNumber?: int|null,
 *   revenueAmount?: float|null,
 * }
 */
final class RevenueAttributionAggregate implements BaseModel
{
    /** @use SdkModel<RevenueAttributionAggregateShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?int $contactsNumber;

    /** @var value-of<CurrencyCode>|null $currencyCode */
    #[Api(enum: CurrencyCode::class, optional: true)]
    public ?string $currencyCode;

    #[Api(optional: true)]
    public ?float $dealAmount;

    #[Api(optional: true)]
    public ?int $dealsNumber;

    #[Api(optional: true)]
    public ?float $revenueAmount;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode
     */
    public static function with(
        ?int $contactsNumber = null,
        CurrencyCode|string|null $currencyCode = null,
        ?float $dealAmount = null,
        ?int $dealsNumber = null,
        ?float $revenueAmount = null,
    ): self {
        $obj = new self;

        null !== $contactsNumber && $obj->contactsNumber = $contactsNumber;
        null !== $currencyCode && $obj['currencyCode'] = $currencyCode;
        null !== $dealAmount && $obj->dealAmount = $dealAmount;
        null !== $dealsNumber && $obj->dealsNumber = $dealsNumber;
        null !== $revenueAmount && $obj->revenueAmount = $revenueAmount;

        return $obj;
    }

    public function withContactsNumber(int $contactsNumber): self
    {
        $obj = clone $this;
        $obj->contactsNumber = $contactsNumber;

        return $obj;
    }

    /**
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode
     */
    public function withCurrencyCode(CurrencyCode|string $currencyCode): self
    {
        $obj = clone $this;
        $obj['currencyCode'] = $currencyCode;

        return $obj;
    }

    public function withDealAmount(float $dealAmount): self
    {
        $obj = clone $this;
        $obj->dealAmount = $dealAmount;

        return $obj;
    }

    public function withDealsNumber(int $dealsNumber): self
    {
        $obj = clone $this;
        $obj->dealsNumber = $dealsNumber;

        return $obj;
    }

    public function withRevenueAmount(float $revenueAmount): self
    {
        $obj = clone $this;
        $obj->revenueAmount = $revenueAmount;

        return $obj;
    }
}
