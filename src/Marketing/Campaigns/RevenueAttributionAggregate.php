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

    #[Optional]
    public ?int $contactsNumber;

    /** @var value-of<CurrencyCode>|null $currencyCode */
    #[Optional(enum: CurrencyCode::class)]
    public ?string $currencyCode;

    #[Optional]
    public ?float $dealAmount;

    #[Optional]
    public ?int $dealsNumber;

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
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode
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

    public function withContactsNumber(int $contactsNumber): self
    {
        $self = clone $this;
        $self['contactsNumber'] = $contactsNumber;

        return $self;
    }

    /**
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode
     */
    public function withCurrencyCode(CurrencyCode|string $currencyCode): self
    {
        $self = clone $this;
        $self['currencyCode'] = $currencyCode;

        return $self;
    }

    public function withDealAmount(float $dealAmount): self
    {
        $self = clone $this;
        $self['dealAmount'] = $dealAmount;

        return $self;
    }

    public function withDealsNumber(int $dealsNumber): self
    {
        $self = clone $this;
        $self['dealsNumber'] = $dealsNumber;

        return $self;
    }

    public function withRevenueAmount(float $revenueAmount): self
    {
        $self = clone $this;
        $self['revenueAmount'] = $revenueAmount;

        return $self;
    }
}
