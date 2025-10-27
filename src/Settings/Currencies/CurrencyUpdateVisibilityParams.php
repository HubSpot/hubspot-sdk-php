<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams\FromCurrencyCode;
use HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams\ToCurrencyCode;

/**
 * Change the visibility setting for a currency pair. This will hide or display a currency pair for users in the HubSpot app.
 *
 * @see HubspotSDK\Settings\Currencies->updateVisibility
 *
 * @phpstan-type currency_update_visibility_params = array{
 *   fromCurrencyCode: FromCurrencyCode|value-of<FromCurrencyCode>,
 *   toCurrencyCode: ToCurrencyCode|value-of<ToCurrencyCode>,
 *   visibleInUi: bool,
 * }
 */
final class CurrencyUpdateVisibilityParams implements BaseModel
{
    /** @use SdkModel<currency_update_visibility_params> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<FromCurrencyCode> $fromCurrencyCode */
    #[Api(enum: FromCurrencyCode::class)]
    public string $fromCurrencyCode;

    /** @var value-of<ToCurrencyCode> $toCurrencyCode */
    #[Api(enum: ToCurrencyCode::class)]
    public string $toCurrencyCode;

    #[Api('visibleInUI')]
    public bool $visibleInUi;

    /**
     * `new CurrencyUpdateVisibilityParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CurrencyUpdateVisibilityParams::with(
     *   fromCurrencyCode: ..., toCurrencyCode: ..., visibleInUi: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CurrencyUpdateVisibilityParams)
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
        $obj = new self;

        $obj['fromCurrencyCode'] = $fromCurrencyCode;
        $obj['toCurrencyCode'] = $toCurrencyCode;
        $obj->visibleInUi = $visibleInUi;

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

    public function withVisibleInUi(bool $visibleInUi): self
    {
        $obj = clone $this;
        $obj->visibleInUi = $visibleInUi;

        return $obj;
    }
}
