<?php

declare(strict_types=1);

namespace HubSpotSDK\Settings\Currencies\ExchangeRates;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateUpdateVisibilityParams\FromCurrencyCode;
use HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateUpdateVisibilityParams\ToCurrencyCode;

/**
 * Change the visibility setting for a currency pair. This will hide or display a currency pair for users in the HubSpot app.
 *
 * @see HubSpotSDK\Services\Settings\Currencies\ExchangeRatesService::updateVisibility()
 *
 * @phpstan-type ExchangeRateUpdateVisibilityParamsShape = array{
 *   fromCurrencyCode: FromCurrencyCode|value-of<FromCurrencyCode>,
 *   toCurrencyCode: ToCurrencyCode|value-of<ToCurrencyCode>,
 *   visibleInUi: bool,
 * }
 */
final class ExchangeRateUpdateVisibilityParams implements BaseModel
{
    /** @use SdkModel<ExchangeRateUpdateVisibilityParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * This represents the three-letter currency code (such as USD for US Dollar) of the currency you want to convert from.
     *
     * @var value-of<FromCurrencyCode> $fromCurrencyCode
     */
    #[Required(enum: FromCurrencyCode::class)]
    public string $fromCurrencyCode;

    /**
     * This represents the three-letter currency code (such as USD for US Dollar) of the currency you want to convert to.
     *
     * @var value-of<ToCurrencyCode> $toCurrencyCode
     */
    #[Required(enum: ToCurrencyCode::class)]
    public string $toCurrencyCode;

    /**
     * This indicates if the currency pair is shown in the MultiCurrency settings page. Setting this to false will remove the currency pair from the settings page.
     */
    #[Required('visibleInUI')]
    public bool $visibleInUi;

    /**
     * `new ExchangeRateUpdateVisibilityParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExchangeRateUpdateVisibilityParams::with(
     *   fromCurrencyCode: ..., toCurrencyCode: ..., visibleInUi: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExchangeRateUpdateVisibilityParams)
     *   ->withFromCurrencyCode(...)
     *   ->withToCurrencyCode(...)
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
        FromCurrencyCode|string $fromCurrencyCode,
        ToCurrencyCode|string $toCurrencyCode,
        bool $visibleInUi,
    ): self {
        $self = new self;

        $self['fromCurrencyCode'] = $fromCurrencyCode;
        $self['toCurrencyCode'] = $toCurrencyCode;
        $self['visibleInUi'] = $visibleInUi;

        return $self;
    }

    /**
     * This represents the three-letter currency code (such as USD for US Dollar) of the currency you want to convert from.
     *
     * @param FromCurrencyCode|value-of<FromCurrencyCode> $fromCurrencyCode
     */
    public function withFromCurrencyCode(
        FromCurrencyCode|string $fromCurrencyCode
    ): self {
        $self = clone $this;
        $self['fromCurrencyCode'] = $fromCurrencyCode;

        return $self;
    }

    /**
     * This represents the three-letter currency code (such as USD for US Dollar) of the currency you want to convert to.
     *
     * @param ToCurrencyCode|value-of<ToCurrencyCode> $toCurrencyCode
     */
    public function withToCurrencyCode(
        ToCurrencyCode|string $toCurrencyCode
    ): self {
        $self = clone $this;
        $self['toCurrencyCode'] = $toCurrencyCode;

        return $self;
    }

    /**
     * This indicates if the currency pair is shown in the MultiCurrency settings page. Setting this to false will remove the currency pair from the settings page.
     */
    public function withVisibleInUi(bool $visibleInUi): self
    {
        $self = clone $this;
        $self['visibleInUi'] = $visibleInUi;

        return $self;
    }
}
