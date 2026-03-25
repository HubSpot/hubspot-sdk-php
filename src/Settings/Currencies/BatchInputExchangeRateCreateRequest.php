<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExchangeRateCreateRequestShape from \HubspotSDK\Settings\Currencies\ExchangeRateCreateRequest
 *
 * @phpstan-type BatchInputExchangeRateCreateRequestShape = array{
 *   inputs: list<ExchangeRateCreateRequest|ExchangeRateCreateRequestShape>
 * }
 */
final class BatchInputExchangeRateCreateRequest implements BaseModel
{
    /** @use SdkModel<BatchInputExchangeRateCreateRequestShape> */
    use SdkModel;

    /** @var list<ExchangeRateCreateRequest> $inputs */
    #[Required(list: ExchangeRateCreateRequest::class)]
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
     * @param list<ExchangeRateCreateRequest|ExchangeRateCreateRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<ExchangeRateCreateRequest|ExchangeRateCreateRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
