<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Settings\Currencies\ExchangeRateCreateRequest\FromCurrencyCode;

/**
 * @phpstan-type BatchInputExchangeRateCreateRequestShape = array{
 *   inputs: list<ExchangeRateCreateRequest>
 * }
 */
final class BatchInputExchangeRateCreateRequest implements BaseModel
{
    /** @use SdkModel<BatchInputExchangeRateCreateRequestShape> */
    use SdkModel;

    /** @var list<ExchangeRateCreateRequest> $inputs */
    #[Api(list: ExchangeRateCreateRequest::class)]
    public array $inputs;

    /**
     * `new BatchInputExchangeRateCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputExchangeRateCreateRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputExchangeRateCreateRequest)->withInputs(...)
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
     * @param list<ExchangeRateCreateRequest|array{
     *   conversionRate: float,
     *   fromCurrencyCode: value-of<FromCurrencyCode>,
     *   effectiveAt?: \DateTimeInterface|null,
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<ExchangeRateCreateRequest|array{
     *   conversionRate: float,
     *   fromCurrencyCode: value-of<FromCurrencyCode>,
     *   effectiveAt?: \DateTimeInterface|null,
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
