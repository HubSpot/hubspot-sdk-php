<?php

declare(strict_types=1);

namespace HubSpotSDK\Settings\Currencies\ExchangeRates;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Update an existing conversion rate, specified by its ID.
 *
 * @see HubSpotSDK\Services\Settings\Currencies\ExchangeRatesService::updateExchangeRate()
 *
 * @phpstan-type ExchangeRateUpdateExchangeRateParamsShape = array{
 *   conversionRate: float, effectiveAt?: \DateTimeInterface|null
 * }
 */
final class ExchangeRateUpdateExchangeRateParams implements BaseModel
{
    /** @use SdkModel<ExchangeRateUpdateExchangeRateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The updated conversion rate between the to and from currency code of this exchange rate.
     */
    #[Required]
    public float $conversionRate;

    /**
     * The date the exchange rate is in effect.
     */
    #[Optional]
    public ?\DateTimeInterface $effectiveAt;

    /**
     * `new ExchangeRateUpdateExchangeRateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExchangeRateUpdateExchangeRateParams::with(conversionRate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExchangeRateUpdateExchangeRateParams)->withConversionRate(...)
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
        float $conversionRate,
        ?\DateTimeInterface $effectiveAt = null
    ): self {
        $self = new self;

        $self['conversionRate'] = $conversionRate;

        null !== $effectiveAt && $self['effectiveAt'] = $effectiveAt;

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
     * The date the exchange rate is in effect.
     */
    public function withEffectiveAt(\DateTimeInterface $effectiveAt): self
    {
        $self = clone $this;
        $self['effectiveAt'] = $effectiveAt;

        return $self;
    }
}
