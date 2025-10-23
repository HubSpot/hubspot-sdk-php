<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type batch_input_marketing_event_external_unique_identifier = array{
 *   inputs: list<MarketingEventExternalUniqueIdentifier>
 * }
 */
final class BatchInputMarketingEventExternalUniqueIdentifier implements BaseModel
{
    /** @use SdkModel<batch_input_marketing_event_external_unique_identifier> */
    use SdkModel;

    /** @var list<MarketingEventExternalUniqueIdentifier> $inputs */
    #[Api(list: MarketingEventExternalUniqueIdentifier::class)]
    public array $inputs;

    /**
     * `new BatchInputMarketingEventExternalUniqueIdentifier()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputMarketingEventExternalUniqueIdentifier::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputMarketingEventExternalUniqueIdentifier)->withInputs(...)
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
     * @param list<MarketingEventExternalUniqueIdentifier> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<MarketingEventExternalUniqueIdentifier> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
