<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Settings\Currencies\CurrencyCreateExchangeRateParams\FromCurrencyCode;

/**
 * Create a new exchange rate with specified conversion rate and currency codes.
 *
 * @see HubspotSDK\Services\Settings\CurrenciesService::createExchangeRate()
 *
 * @phpstan-type CurrencyCreateExchangeRateParamsShape = array{
 *   conversionRate: float,
 *   fromCurrencyCode: FromCurrencyCode|value-of<FromCurrencyCode>,
 *   effectiveAt?: \DateTimeInterface,
 * }
 */
final class CurrencyCreateExchangeRateParams implements BaseModel
{
    /** @use SdkModel<CurrencyCreateExchangeRateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The conversion rate between the to and from currency code of this exchange rate.
     */
    #[Api]
    public float $conversionRate;

    /**
     * This represents the three-letter currency code (such as USD for US Dollar) of the currency you want to convert from.
     *
     * @var value-of<FromCurrencyCode> $fromCurrencyCode
     */
    #[Api(enum: FromCurrencyCode::class)]
    public string $fromCurrencyCode;

    /**
     * The date the exchange rate is in effect.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $effectiveAt;

    /**
     * `new CurrencyCreateExchangeRateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CurrencyCreateExchangeRateParams::with(
     *   conversionRate: ..., fromCurrencyCode: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CurrencyCreateExchangeRateParams)
     *   ->withConversionRate(...)
     *   ->withFromCurrencyCode(...)
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
     *
     * @param FromCurrencyCode|value-of<FromCurrencyCode> $fromCurrencyCode
     */
    public static function with(
        float $conversionRate,
        FromCurrencyCode|string $fromCurrencyCode,
        ?\DateTimeInterface $effectiveAt = null,
    ): self {
        $obj = new self;

        $obj['conversionRate'] = $conversionRate;
        $obj['fromCurrencyCode'] = $fromCurrencyCode;

        null !== $effectiveAt && $obj['effectiveAt'] = $effectiveAt;

        return $obj;
    }

    /**
     * The conversion rate between the to and from currency code of this exchange rate.
     */
    public function withConversionRate(float $conversionRate): self
    {
        $obj = clone $this;
        $obj['conversionRate'] = $conversionRate;

        return $obj;
    }

    /**
     * This represents the three-letter currency code (such as USD for US Dollar) of the currency you want to convert from.
     *
     * @param FromCurrencyCode|value-of<FromCurrencyCode> $fromCurrencyCode
     */
    public function withFromCurrencyCode(
        FromCurrencyCode|string $fromCurrencyCode
    ): self {
        $obj = clone $this;
        $obj['fromCurrencyCode'] = $fromCurrencyCode;

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
