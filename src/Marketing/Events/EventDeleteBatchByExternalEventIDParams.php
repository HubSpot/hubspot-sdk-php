<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Marketing\EventsService::deleteBatchByExternalEventID()
 *
 * @phpstan-import-type MarketingEventExternalUniqueIdentifierShape from \HubspotSDK\Marketing\Events\MarketingEventExternalUniqueIdentifier
 *
 * @phpstan-type EventDeleteBatchByExternalEventIDParamsShape = array{
 *   inputs: list<MarketingEventExternalUniqueIdentifier|MarketingEventExternalUniqueIdentifierShape>,
 * }
 */
final class EventDeleteBatchByExternalEventIDParams implements BaseModel
{
    /** @use SdkModel<EventDeleteBatchByExternalEventIDParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<MarketingEventExternalUniqueIdentifier> $inputs */
    #[Required(list: MarketingEventExternalUniqueIdentifier::class)]
    public array $inputs;

    /**
     * `new EventDeleteBatchByExternalEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventDeleteBatchByExternalEventIDParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventDeleteBatchByExternalEventIDParams)->withInputs(...)
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
     * @param list<MarketingEventExternalUniqueIdentifier|MarketingEventExternalUniqueIdentifierShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<MarketingEventExternalUniqueIdentifier|MarketingEventExternalUniqueIdentifierShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
