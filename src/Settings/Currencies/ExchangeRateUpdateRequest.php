<?php

declare(strict_types=1);

namespace HubSpotSDK\Settings\Currencies;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExchangeRateUpdateRequestShape = array{
 *   id: string, conversionRate: float, effectiveAt?: \DateTimeInterface|null
 * }
 */
final class ExchangeRateUpdateRequest implements BaseModel
{
    /** @use SdkModel<ExchangeRateUpdateRequestShape> */
    use SdkModel;

    /**
     * A unique identifier for the exchange rate being updated.
     */
    #[Required]
    public string $id;

    /**
     * The updated conversion rate between the to and from currency code of this exchange rate.
     */
    #[Required]
    public float $conversionRate;

    /**
     * The date the exchange rate will be in effect.
     */
    #[Optional]
    public ?\DateTimeInterface $effectiveAt;

    /**
     * `new ExchangeRateUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExchangeRateUpdateRequest::with(id: ..., conversionRate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExchangeRateUpdateRequest)->withID(...)->withConversionRate(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $id,
        float $conversionRate,
        ?\DateTimeInterface $effectiveAt = null
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['conversionRate'] = $conversionRate;

        null !== $effectiveAt && $self['effectiveAt'] = $effectiveAt;

        return $self;
    }

    /**
     * A unique identifier for the exchange rate being updated.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The updated conversion rate between the to and from currency code of this exchange rate.
     */
    public function withConversionRate(float $conversionRate): self
    {
        $self = clone $this;
        $self['conversionRate'] = $conversionRate;

        return $self;
    }

    /**
     * The date the exchange rate will be in effect.
     */
    public function withEffectiveAt(\DateTimeInterface $effectiveAt): self
    {
        $self = clone $this;
        $self['effectiveAt'] = $effectiveAt;

        return $self;
    }
}
