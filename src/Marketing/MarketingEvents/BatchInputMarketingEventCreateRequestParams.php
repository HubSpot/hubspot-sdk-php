<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type batch_input_marketing_event_create_request_params = array{
 *   inputs: list<MarketingEventCreateRequestParams>
 * }
 */
final class BatchInputMarketingEventCreateRequestParams implements BaseModel
{
    /** @use SdkModel<batch_input_marketing_event_create_request_params> */
    use SdkModel;

    /** @var list<MarketingEventCreateRequestParams> $inputs */
    #[Api(list: MarketingEventCreateRequestParams::class)]
    public array $inputs;

    /**
     * `new BatchInputMarketingEventCreateRequestParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputMarketingEventCreateRequestParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputMarketingEventCreateRequestParams)->withInputs(...)
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
     * @param list<MarketingEventCreateRequestParams> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<MarketingEventCreateRequestParams> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
