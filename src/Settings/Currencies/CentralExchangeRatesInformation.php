<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type central_exchange_rates_information = array{
 *   centralExchangeRatesEnabled: bool
 * }
 */
final class CentralExchangeRatesInformation implements BaseModel
{
    /** @use SdkModel<central_exchange_rates_information> */
    use SdkModel;

    #[Api]
    public bool $centralExchangeRatesEnabled;

    /**
     * `new CentralExchangeRatesInformation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CentralExchangeRatesInformation::with(centralExchangeRatesEnabled: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CentralExchangeRatesInformation)->withCentralExchangeRatesEnabled(...)
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
    public static function with(bool $centralExchangeRatesEnabled): self
    {
        $obj = new self;

        $obj->centralExchangeRatesEnabled = $centralExchangeRatesEnabled;

        return $obj;
    }

    public function withCentralExchangeRatesEnabled(
        bool $centralExchangeRatesEnabled
    ): self {
        $obj = clone $this;
        $obj->centralExchangeRatesEnabled = $centralExchangeRatesEnabled;

        return $obj;
    }
}
