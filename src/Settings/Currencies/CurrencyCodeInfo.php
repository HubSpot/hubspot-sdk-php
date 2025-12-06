<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CurrencyCodeInfoShape = array{
 *   currencyCode: string, currencyName: string
 * }
 */
final class CurrencyCodeInfo implements BaseModel
{
    /** @use SdkModel<CurrencyCodeInfoShape> */
    use SdkModel;

    /**
     * The three-letter code representing a specific currency (ex. USD).
     */
    #[Api]
    public string $currencyCode;

    /**
     * The full name of the currency (ex. US Dollar).
     */
    #[Api]
    public string $currencyName;

    /**
     * `new CurrencyCodeInfo()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CurrencyCodeInfo::with(currencyCode: ..., currencyName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CurrencyCodeInfo)->withCurrencyCode(...)->withCurrencyName(...)
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
        string $currencyCode,
        string $currencyName
    ): self {
        $obj = new self;

        $obj['currencyCode'] = $currencyCode;
        $obj['currencyName'] = $currencyName;

        return $obj;
    }

    /**
     * The three-letter code representing a specific currency (ex. USD).
     */
    public function withCurrencyCode(string $currencyCode): self
    {
        $obj = clone $this;
        $obj['currencyCode'] = $currencyCode;

        return $obj;
    }

    /**
     * The full name of the currency (ex. US Dollar).
     */
    public function withCurrencyName(string $currencyName): self
    {
        $obj = clone $this;
        $obj['currencyName'] = $currencyName;

        return $obj;
    }
}
