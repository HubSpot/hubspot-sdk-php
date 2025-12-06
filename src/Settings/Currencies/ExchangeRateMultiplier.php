<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExchangeRateMultiplierShape = array{
 *   conversionRate: float, effectiveAt?: \DateTimeInterface|null
 * }
 */
final class ExchangeRateMultiplier implements BaseModel
{
    /** @use SdkModel<ExchangeRateMultiplierShape> */
    use SdkModel;

    /**
     * The updated conversion rate between the to and from currency code of this exchange rate.
     */
    #[Api]
    public float $conversionRate;

    /**
     * The date the exchange rate is in effect.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $effectiveAt;

    /**
     * `new ExchangeRateMultiplier()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExchangeRateMultiplier::with(conversionRate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExchangeRateMultiplier)->withConversionRate(...)
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
        $obj = new self;

        $obj['conversionRate'] = $conversionRate;

        null !== $effectiveAt && $obj['effectiveAt'] = $effectiveAt;

        return $obj;
    }

    /**
     * The updated conversion rate between the to and from currency code of this exchange rate.
     */
    public function withConversionRate(float $conversionRate): self
    {
        $obj = clone $this;
        $obj['conversionRate'] = $conversionRate;

        return $obj;
    }

    /**
     * The date the exchange rate is in effect.
     */
    public function withEffectiveAt(\DateTimeInterface $effectiveAt): self
    {
        $obj = clone $this;
        $obj['effectiveAt'] = $effectiveAt;

        return $obj;
    }
}
