<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MarketingEventEmailSubscriberShape from \HubSpotSDK\Marketing\MarketingEvents\MarketingEventEmailSubscriber
 *
 * @phpstan-type BatchInputMarketingEventEmailSubscriberShape = array{
 *   inputs: list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape>
 * }
 */
final class BatchInputMarketingEventEmailSubscriber implements BaseModel
{
    /** @use SdkModel<BatchInputMarketingEventEmailSubscriberShape> */
    use SdkModel;

    /**
     * List of marketing event details to create or update.
     *
     * @var list<MarketingEventEmailSubscriber> $inputs
     */
    #[Required(list: MarketingEventEmailSubscriber::class)]
    public array $inputs;

    /**
     * `new BatchInputMarketingEventEmailSubscriber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputMarketingEventEmailSubscriber::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputMarketingEventEmailSubscriber)->withInputs(...)
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
     * @param list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * List of marketing event details to create or update.
     *
     * @param list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
