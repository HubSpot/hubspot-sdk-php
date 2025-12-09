<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
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
final class ExchangeRate implements BaseModel
{
    /** @use SdkModel<ExchangeRateShape> */
    use SdkModel;

    /**
     * A unique identifier for the exchange rate.
     */
    #[Required]
    public string $id;

    /**
     * The conversion rate between the to and from currency code of this exchange rate.
     */
    #[Required]
    public float $conversionRate;

    /**
     * The date the exchange rate was created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * The date the exchange rate is in effect.
     */
    #[Required]
    public \DateTimeInterface $effectiveAt;

    /**
     * This represents the three-letter currency code (such as USD for US Dollar) of the currency you are converting from.
     *
     * @var value-of<FromCurrencyCode> $fromCurrencyCode
     */
    #[Required(enum: FromCurrencyCode::class)]
    public string $fromCurrencyCode;

    /**
     * This represents the three-letter currency code (such as USD for US Dollar) of the currency you are converting to.
     *
     * @var value-of<ToCurrencyCode> $toCurrencyCode
     */
    #[Required(enum: ToCurrencyCode::class)]
    public string $toCurrencyCode;

    /**
     * The date the exchange rate was last updated.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * This indicates if the exchange rate is shown in the MultiCurrency settings page.
     */
    #[Required]
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

        $obj['id'] = $id;
        $obj['conversionRate'] = $conversionRate;
        $obj['createdAt'] = $createdAt;
        $obj['effectiveAt'] = $effectiveAt;
        $obj['fromCurrencyCode'] = $fromCurrencyCode;
        $obj['toCurrencyCode'] = $toCurrencyCode;
        $obj['updatedAt'] = $updatedAt;
        $obj['visibleInUI'] = $visibleInUI;

        return $obj;
    }

    /**
     * A unique identifier for the exchange rate.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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
     * The date the exchange rate was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

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

    /**
     * This represents the three-letter currency code (such as USD for US Dollar) of the currency you are converting from.
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
     * This represents the three-letter currency code (such as USD for US Dollar) of the currency you are converting to.
     *
     * @param ToCurrencyCode|value-of<ToCurrencyCode> $toCurrencyCode
     */
    public function withToCurrencyCode(
        ToCurrencyCode|string $toCurrencyCode
    ): self {
        $obj = clone $this;
        $obj['toCurrencyCode'] = $toCurrencyCode;

        return $obj;
    }

    /**
     * The date the exchange rate was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * This indicates if the exchange rate is shown in the MultiCurrency settings page.
     */
    public function withVisibleInUi(bool $visibleInUi): self
    {
        $obj = clone $this;
        $obj['visibleInUI'] = $visibleInUi;

        return $obj;
    }
}
