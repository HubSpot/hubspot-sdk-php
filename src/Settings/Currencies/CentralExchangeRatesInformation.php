<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CentralExchangeRatesInformationShape = array{
 *   centralExchangeRatesEnabled: bool
 * }
 */
final class CentralExchangeRatesInformation implements BaseModel
{
    /** @use SdkModel<CentralExchangeRatesInformationShape> */
    use SdkModel;

    /**
     * Indicates if central exchange rates is enabled for the portal or not.
     */
    #[Required]
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
        $self = new self;

        $self['centralExchangeRatesEnabled'] = $centralExchangeRatesEnabled;

        return $self;
    }

    /**
     * Indicates if central exchange rates is enabled for the portal or not.
     */
    public function withCentralExchangeRatesEnabled(
        bool $centralExchangeRatesEnabled
    ): self {
        $self = clone $this;
        $self['centralExchangeRatesEnabled'] = $centralExchangeRatesEnabled;

        return $self;
    }
}
