<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Marketing\EventsService::upsertSubscriberStateByID()
 *
 * @phpstan-import-type MarketingEventSubscriberShape from \HubspotSDK\Marketing\Events\MarketingEventSubscriber
 *
 * @phpstan-type EventUpsertSubscriberStateByIDParamsShape = array{
 *   externalEventID: string,
 *   externalAccountID: string,
 *   inputs: list<MarketingEventSubscriber|MarketingEventSubscriberShape>,
 * }
 */
final class EventUpsertSubscriberStateByIDParams implements BaseModel
{
    /** @use SdkModel<EventUpsertSubscriberStateByIDParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $externalEventID;

    #[Required]
    public string $externalAccountID;

    /**
     * List of HubSpot contacts to subscribe to the marketing event.
     *
     * @var list<MarketingEventSubscriber> $inputs
     */
    #[Required(list: MarketingEventSubscriber::class)]
    public array $inputs;

    /**
     * `new EventUpsertSubscriberStateByIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventUpsertSubscriberStateByIDParams::with(
     *   externalEventID: ..., externalAccountID: ..., inputs: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventUpsertSubscriberStateByIDParams)
     *   ->withExternalEventID(...)
     *   ->withExternalAccountID(...)
     *   ->withInputs(...)
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
     * @param list<MarketingEventSubscriber|MarketingEventSubscriberShape> $inputs
     */
    public static function with(
        string $externalEventID,
        string $externalAccountID,
        array $inputs
    ): self {
        $self = new self;

        $self['externalEventID'] = $externalEventID;
        $self['externalAccountID'] = $externalAccountID;
        $self['inputs'] = $inputs;

        return $self;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $self = clone $this;
        $self['externalEventID'] = $externalEventID;

        return $self;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

        return $self;
    }

    /**
     * List of HubSpot contacts to subscribe to the marketing event.
     *
     * @param list<MarketingEventSubscriber|MarketingEventSubscriberShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
