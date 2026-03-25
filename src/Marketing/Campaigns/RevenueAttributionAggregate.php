<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Campaigns\RevenueAttributionAggregate\CurrencyCode;

/**
 * @phpstan-type RevenueAttributionAggregateShape = array{
 *   contactsNumber?: int|null,
 *   currencyCode?: null|CurrencyCode|value-of<CurrencyCode>,
 *   dealAmount?: float|null,
 *   dealsNumber?: int|null,
 *   revenueAmount?: float|null,
 * }
 */
final class RevenueAttributionAggregate implements BaseModel
{
    /** @use SdkModel<RevenueAttributionAggregateShape> */
    use SdkModel;

    /**
     * The number of contacts attributed to the campaign.
     */
    #[Optional]
    public ?int $contactsNumber;

    /**
     * The currency code used for the revenue attribution, with accepted values including AED, AFN, ALL, and others.
     *
     * @var value-of<CurrencyCode>|null $currencyCode
     */
    #[Optional(enum: CurrencyCode::class)]
    public ?string $currencyCode;

    /**
     * The total amount of deals attributed to the campaign.
     */
    #[Optional]
    public ?float $dealAmount;

    /**
     * The number of deals attributed to the campaign.
     */
    #[Optional]
    public ?int $dealsNumber;

    /**
     * The total revenue amount attributed to the campaign.
     */
    #[Optional]
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
     * @param CurrencyCode|value-of<CurrencyCode>|null $currencyCode
     */
    public static function with(
        ?int $contactsNumber = null,
        CurrencyCode|string|null $currencyCode = null,
        ?float $dealAmount = null,
        ?int $dealsNumber = null,
        ?float $revenueAmount = null,
    ): self {
        $self = new self;

        null !== $contactsNumber && $self['contactsNumber'] = $contactsNumber;
        null !== $currencyCode && $self['currencyCode'] = $currencyCode;
        null !== $dealAmount && $self['dealAmount'] = $dealAmount;
        null !== $dealsNumber && $self['dealsNumber'] = $dealsNumber;
        null !== $revenueAmount && $self['revenueAmount'] = $revenueAmount;

        return $self;
    }

    /**
     * The number of contacts attributed to the campaign.
     */
    public function withContactsNumber(int $contactsNumber): self
    {
        $self = clone $this;
        $self['contactsNumber'] = $contactsNumber;

        return $self;
    }

    /**
     * The currency code used for the revenue attribution, with accepted values including AED, AFN, ALL, and others.
     *
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode
     */
    public function withCurrencyCode(CurrencyCode|string $currencyCode): self
    {
        $self = clone $this;
        $self['currencyCode'] = $currencyCode;

        return $self;
    }

    /**
     * The total amount of deals attributed to the campaign.
     */
    public function withDealAmount(float $dealAmount): self
    {
        $self = clone $this;
        $self['dealAmount'] = $dealAmount;

        return $self;
    }

    /**
     * The number of deals attributed to the campaign.
     */
    public function withDealsNumber(int $dealsNumber): self
    {
        $self = clone $this;
        $self['dealsNumber'] = $dealsNumber;

        return $self;
    }

    /**
     * The total revenue amount attributed to the campaign.
     */
    public function withRevenueAmount(float $revenueAmount): self
    {
        $self = clone $this;
        $self['revenueAmount'] = $revenueAmount;

        return $self;
    }
}
