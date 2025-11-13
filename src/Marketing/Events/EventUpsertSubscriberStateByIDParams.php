<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Record a subscriber state between multiple HubSpot contacts and a marketing event, using HubSpot contact IDs. Note that the contact must already exist in HubSpot; a contact will not be created.
 *
 * @see HubspotSDK\Services\Marketing\EventsService::upsertSubscriberStateByID()
 *
 * @phpstan-type EventUpsertSubscriberStateByIDParamsShape = array{
 *   externalEventId: string,
 *   externalAccountId: string,
 *   inputs: list<MarketingEventSubscriber>,
 * }
 */
final class EventUpsertSubscriberStateByIDParams implements BaseModel
{
    /** @use SdkModel<EventUpsertSubscriberStateByIDParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $externalEventId;

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    #[Api]
    public string $externalAccountId;

    /**
     * List of HubSpot contacts to subscribe to the marketing event.
     *
     * @var list<MarketingEventSubscriber> $inputs
     */
    #[Api(list: MarketingEventSubscriber::class)]
    public array $inputs;

    /**
     * `new EventUpsertSubscriberStateByIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventUpsertSubscriberStateByIDParams::with(
     *   externalEventId: ..., externalAccountId: ..., inputs: ...
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
     * @param list<MarketingEventSubscriber> $inputs
     */
    public static function with(
        string $externalEventId,
        string $externalAccountId,
        array $inputs
    ): self {
        $obj = new self;

        $obj->externalEventId = $externalEventId;
        $obj->externalAccountId = $externalAccountId;
        $obj->inputs = $inputs;

        return $obj;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj->externalEventId = $externalEventID;

        return $obj;
    }

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj->externalAccountId = $externalAccountID;

        return $obj;
    }

    /**
     * List of HubSpot contacts to subscribe to the marketing event.
     *
     * @param list<MarketingEventSubscriber> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
