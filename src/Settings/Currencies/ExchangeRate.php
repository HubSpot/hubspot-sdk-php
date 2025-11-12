<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\Settings\Currencies\ExchangeRate\FromCurrencyCode;
use HubspotSDK\Settings\Currencies\ExchangeRate\ToCurrencyCode;

/**
 * @phpstan-type ExchangeRateShape = array{
 *   id: string,
 *   conversionRate: float,
 *   createdAt: \DateTimeInterface,
 *   effectiveAt: \DateTimeInterface,
 *   fromCurrencyCode: value-of<FromCurrencyCode>,
 *   toCurrencyCode: value-of<ToCurrencyCode>,
 *   updatedAt: \DateTimeInterface,
 *   visibleInUI: bool,
 * }
 */
final class ExchangeRate implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ExchangeRateShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public float $conversionRate;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public \DateTimeInterface $effectiveAt;

    /** @var value-of<FromCurrencyCode> $fromCurrencyCode */
    #[Api(enum: FromCurrencyCode::class)]
    public string $fromCurrencyCode;

    /** @var value-of<ToCurrencyCode> $toCurrencyCode */
    #[Api(enum: ToCurrencyCode::class)]
    public string $toCurrencyCode;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api]
    public bool $visibleInUI;

    /**
     * `new ExchangeRate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExchangeRate::with(
     *   id: ...,
     *   conversionRate: ...,
     *   createdAt: ...,
     *   effectiveAt: ...,
     *   fromCurrencyCode: ...,
     *   toCurrencyCode: ...,
     *   updatedAt: ...,
     *   visibleInUI: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExchangeRate)
     *   ->withID(...)
     *   ->withConversionRate(...)
     *   ->withCreatedAt(...)
     *   ->withEffectiveAt(...)
     *   ->withFromCurrencyCode(...)
     *   ->withToCurrencyCode(...)
     *   ->withUpdatedAt(...)
     *   ->withVisibleInUi(...)
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
     * @param ToCurrencyCode|value-of<ToCurrencyCode> $toCurrencyCode
     */
    public static function with(
        string $id,
        float $conversionRate,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $effectiveAt,
        FromCurrencyCode|string $fromCurrencyCode,
        ToCurrencyCode|string $toCurrencyCode,
        \DateTimeInterface $updatedAt,
        bool $visibleInUI,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->conversionRate = $conversionRate;
        $obj->createdAt = $createdAt;
        $obj->effectiveAt = $effectiveAt;
        $obj['fromCurrencyCode'] = $fromCurrencyCode;
        $obj['toCurrencyCode'] = $toCurrencyCode;
        $obj->updatedAt = $updatedAt;
        $obj->visibleInUI = $visibleInUI;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withConversionRate(float $conversionRate): self
    {
        $obj = clone $this;
        $obj->conversionRate = $conversionRate;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withEffectiveAt(\DateTimeInterface $effectiveAt): self
    {
        $obj = clone $this;
        $obj->effectiveAt = $effectiveAt;

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

    /**
     * @param ToCurrencyCode|value-of<ToCurrencyCode> $toCurrencyCode
     */
    public function withToCurrencyCode(
        ToCurrencyCode|string $toCurrencyCode
    ): self {
        $obj = clone $this;
        $obj['toCurrencyCode'] = $toCurrencyCode;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withVisibleInUi(bool $visibleInUi): self
    {
        $obj = clone $this;
        $obj->visibleInUI = $visibleInUi;

        return $obj;
    }
}
