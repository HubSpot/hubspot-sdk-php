<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MarketingEventCreateRequestParamsShape from \HubSpotSDK\Marketing\MarketingEvents\MarketingEventCreateRequestParams
 *
 * @phpstan-type BatchInputMarketingEventCreateRequestParamsShape = array{
 *   inputs: list<MarketingEventCreateRequestParams|MarketingEventCreateRequestParamsShape>,
 * }
 */
final class BatchInputMarketingEventCreateRequestParams implements BaseModel
{
    /** @use SdkModel<BatchInputMarketingEventCreateRequestParamsShape> */
    use SdkModel;

    /** @var list<MarketingEventCreateRequestParams> $inputs */
    #[Required(list: MarketingEventCreateRequestParams::class)]
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
     * @param list<MarketingEventCreateRequestParams|MarketingEventCreateRequestParamsShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<MarketingEventCreateRequestParams|MarketingEventCreateRequestParamsShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
