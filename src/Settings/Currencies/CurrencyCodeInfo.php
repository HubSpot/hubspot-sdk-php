<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type currency_code_info = array{
 *   currencyCode: string, currencyName: string
 * }
 */
final class CurrencyCodeInfo implements BaseModel
{
    /** @use SdkModel<currency_code_info> */
    use SdkModel;

    #[Api]
    public string $currencyCode;

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

        $obj->currencyCode = $currencyCode;
        $obj->currencyName = $currencyName;

        return $obj;
    }

    public function withCurrencyCode(string $currencyCode): self
    {
        $obj = clone $this;
        $obj->currencyCode = $currencyCode;

        return $obj;
    }

    public function withCurrencyName(string $currencyName): self
    {
        $obj = clone $this;
        $obj->currencyName = $currencyName;

        return $obj;
    }
}
