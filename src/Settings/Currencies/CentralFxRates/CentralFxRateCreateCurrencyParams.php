<?php

declare(strict_types=1);

namespace HubSpotSDK\Settings\Currencies\CentralFxRates;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Settings\Currencies\CentralFxRates\CentralFxRateCreateCurrencyParams\CurrencyCode;

/**
 * Create a new currency with central exchange rates in the portal. Unsupported currencies cannot be added here.
 *
 * @see HubSpotSDK\Services\Settings\Currencies\CentralFxRatesService::createCurrency()
 *
 * @phpstan-type CentralFxRateCreateCurrencyParamsShape = array{
 *   currencyCode: CurrencyCode|value-of<CurrencyCode>
 * }
 */
final class CentralFxRateCreateCurrencyParams implements BaseModel
{
    /** @use SdkModel<CentralFxRateCreateCurrencyParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The currency code being added to the HubSpot portal for use with central exchange rates.
     *
     * @var value-of<CurrencyCode> $currencyCode
     */
    #[Required(enum: CurrencyCode::class)]
    public string $currencyCode;

    /**
     * `new CentralFxRateCreateCurrencyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CentralFxRateCreateCurrencyParams::with(currencyCode: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CentralFxRateCreateCurrencyParams)->withCurrencyCode(...)
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
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode
     */
    public static function with(CurrencyCode|string $currencyCode): self
    {
        $self = new self;

        $self['currencyCode'] = $currencyCode;

        return $self;
    }

    /**
     * The currency code being added to the HubSpot portal for use with central exchange rates.
     *
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode
     */
    public function withCurrencyCode(CurrencyCode|string $currencyCode): self
    {
        $self = clone $this;
        $self['currencyCode'] = $currencyCode;

        return $self;
    }
}
