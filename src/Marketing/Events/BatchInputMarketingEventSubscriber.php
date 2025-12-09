<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputMarketingEventSubscriberShape = array{
 *   inputs: list<MarketingEventSubscriber>
 * }
 */
final class BatchInputMarketingEventSubscriber implements BaseModel
{
    /** @use SdkModel<BatchInputMarketingEventSubscriberShape> */
    use SdkModel;

    /**
     * List of HubSpot contacts to subscribe to the marketing event.
     *
     * @var list<MarketingEventSubscriber> $inputs
     */
    #[Required(list: MarketingEventSubscriber::class)]
    public array $inputs;

    /**
     * `new BatchInputMarketingEventSubscriber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputMarketingEventSubscriber::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputMarketingEventSubscriber)->withInputs(...)
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
     * @param list<MarketingEventSubscriber|array{
     *   interactionDateTime: int, properties: array<string,string>, vid: int
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * List of HubSpot contacts to subscribe to the marketing event.
     *
     * @param list<MarketingEventSubscriber|array{
     *   interactionDateTime: int, properties: array<string,string>, vid: int
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
