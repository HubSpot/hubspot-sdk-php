<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Settings\Currencies\CompanyCurrencyUpdateRequest\CurrencyCode;

/**
 * @phpstan-type CompanyCurrencyUpdateRequestShape = array{
 *   currencyCode: value-of<CurrencyCode>
 * }
 */
final class CompanyCurrencyUpdateRequest implements BaseModel
{
    /** @use SdkModel<CompanyCurrencyUpdateRequestShape> */
    use SdkModel;

    /** @var value-of<CurrencyCode> $currencyCode */
    #[Api(enum: CurrencyCode::class)]
    public string $currencyCode;

    /**
     * `new CompanyCurrencyUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CompanyCurrencyUpdateRequest::with(currencyCode: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CompanyCurrencyUpdateRequest)->withCurrencyCode(...)
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
        $obj = new self;

        $obj['currencyCode'] = $currencyCode;

        return $obj;
    }

    /**
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode
     */
    public function withCurrencyCode(CurrencyCode|string $currencyCode): self
    {
        $obj = clone $this;
        $obj['currencyCode'] = $currencyCode;

        return $obj;
    }
}
