<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\MarketingEventSubscriber;

/**
 * Record a subscriber state between multiple HubSpot contacts and a marketing event, using HubSpot contact IDs. Note that the contact must already exist in HubSpot; a contact will not be created.
 *
 * @see HubspotSDK\Marketing\Events->upsertSubscriberStateByID
 *
 * @phpstan-type event_upsert_subscriber_state_by_id_params = array{
 *   externalEventID: string,
 *   externalAccountID: string,
 *   inputs: list<MarketingEventSubscriber>,
 * }
 */
final class EventUpsertSubscriberStateByIDParams implements BaseModel
{
    /** @use SdkModel<event_upsert_subscriber_state_by_id_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $externalEventID;

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    #[Api]
    public string $externalAccountID;

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
     * @param list<MarketingEventSubscriber> $inputs
     */
    public static function with(
        string $externalEventID,
        string $externalAccountID,
        array $inputs
    ): self {
        $obj = new self;

        $obj->externalEventID = $externalEventID;
        $obj->externalAccountID = $externalAccountID;
        $obj->inputs = $inputs;

        return $obj;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj->externalEventID = $externalEventID;

        return $obj;
    }

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj->externalAccountID = $externalAccountID;

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
