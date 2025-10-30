<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Settings\Currencies\ExchangeRateCreateRequest\FromCurrencyCode;

/**
 * @phpstan-type ExchangeRateCreateRequestShape = array{
 *   conversionRate: float,
 *   fromCurrencyCode: value-of<FromCurrencyCode>,
 *   effectiveAt?: \DateTimeInterface,
 * }
 */
final class ExchangeRateCreateRequest implements BaseModel
{
    /** @use SdkModel<ExchangeRateCreateRequestShape> */
    use SdkModel;

    #[Api]
    public float $conversionRate;

    /** @var value-of<FromCurrencyCode> $fromCurrencyCode */
    #[Api(enum: FromCurrencyCode::class)]
    public string $fromCurrencyCode;

    #[Api(optional: true)]
    public ?\DateTimeInterface $effectiveAt;

    /**
     * `new ExchangeRateCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExchangeRateCreateRequest::with(conversionRate: ..., fromCurrencyCode: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExchangeRateCreateRequest)
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

        $obj->conversionRate = $conversionRate;
        $obj['fromCurrencyCode'] = $fromCurrencyCode;

        null !== $effectiveAt && $obj->effectiveAt = $effectiveAt;

        return $obj;
    }

    public function withConversionRate(float $conversionRate): self
    {
        $obj = clone $this;
        $obj->conversionRate = $conversionRate;

        return $obj;
    }

    /**
     * @param FromCurrencyCode|value-of<FromCurrencyCode> $fromCurrencyCode
     */
    public function withFromCurrencyCode(
        FromCurrencyCode|string $fromCurrencyCode
    ): self {
        $obj = clone $this;
        $obj['fromCurrencyCode'] = $fromCurrencyCode;

        return $obj;
    }

    public function withEffectiveAt(\DateTimeInterface $effectiveAt): self
    {
        $obj = clone $this;
        $obj->effectiveAt = $effectiveAt;

        return $obj;
    }
}
