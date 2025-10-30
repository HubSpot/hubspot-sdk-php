<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update an existing conversion rate, specified by its ID.
 *
 * @see HubspotSDK\Settings\Currencies->updateExchangeRate
 *
 * @phpstan-type CurrencyUpdateExchangeRateParamsShape = array{
 *   conversionRate: float, effectiveAt?: \DateTimeInterface
 * }
 */
final class CurrencyUpdateExchangeRateParams implements BaseModel
{
    /** @use SdkModel<CurrencyUpdateExchangeRateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public float $conversionRate;

    #[Api(optional: true)]
    public ?\DateTimeInterface $effectiveAt;

    /**
     * `new CurrencyUpdateExchangeRateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CurrencyUpdateExchangeRateParams::with(conversionRate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CurrencyUpdateExchangeRateParams)->withConversionRate(...)
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

        $obj->conversionRate = $conversionRate;

        null !== $effectiveAt && $obj->effectiveAt = $effectiveAt;

        return $obj;
    }

    public function withConversionRate(float $conversionRate): self
    {
        $obj = clone $this;
        $obj->conversionRate = $conversionRate;

        return $obj;
    }

    public function withEffectiveAt(\DateTimeInterface $effectiveAt): self
    {
        $obj = clone $this;
        $obj->effectiveAt = $effectiveAt;

        return $obj;
    }
}
