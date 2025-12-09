<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update an existing conversion rate, specified by its ID.
 *
 * @see HubspotSDK\Services\Settings\CurrenciesService::updateExchangeRate()
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
