<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Currencies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type batch_input_exchange_rate_update_request = array{
 *   inputs: list<ExchangeRateUpdateRequest>
 * }
 */
final class BatchInputExchangeRateUpdateRequest implements BaseModel
{
    /** @use SdkModel<batch_input_exchange_rate_update_request> */
    use SdkModel;

    /** @var list<ExchangeRateUpdateRequest> $inputs */
    #[Api(list: ExchangeRateUpdateRequest::class)]
    public array $inputs;

    /**
     * `new BatchInputExchangeRateUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputExchangeRateUpdateRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputExchangeRateUpdateRequest)->withInputs(...)
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
     * @param list<ExchangeRateUpdateRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<ExchangeRateUpdateRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
