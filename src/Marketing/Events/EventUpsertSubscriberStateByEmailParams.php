<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Record a subscriber state between multiple HubSpot contacts and a marketing event, using contact email addresses. Note that the contact must already exist in HubSpot; a contact will not be created. The contactProperties field is used only when creating a new contact. These properties will not update existing contacts.
 *
 * @see HubspotSDK\Services\Marketing\EventsService::upsertSubscriberStateByEmail()
 *
 * @phpstan-type EventUpsertSubscriberStateByEmailParamsShape = array{
 *   externalEventId: string,
 *   externalAccountId: string,
 *   inputs: list<MarketingEventEmailSubscriber|array{
 *     contactProperties: array<string,string>,
 *     email: string,
 *     interactionDateTime: int,
 *     properties: array<string,string>,
 *   }>,
 * }
 */
final class EventUpsertSubscriberStateByEmailParams implements BaseModel
{
    /** @use SdkModel<EventUpsertSubscriberStateByEmailParamsShape> */
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
     * List of marketing event details to create or update.
     *
     * @var list<MarketingEventEmailSubscriber> $inputs
     */
    #[Api(list: MarketingEventEmailSubscriber::class)]
    public array $inputs;

    /**
     * `new EventUpsertSubscriberStateByEmailParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventUpsertSubscriberStateByEmailParams::with(
     *   externalEventId: ..., externalAccountId: ..., inputs: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventUpsertSubscriberStateByEmailParams)
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
     * @param list<MarketingEventEmailSubscriber|array{
     *   contactProperties: array<string,string>,
     *   email: string,
     *   interactionDateTime: int,
     *   properties: array<string,string>,
     * }> $inputs
     */
    public static function with(
        string $externalEventId,
        string $externalAccountId,
        array $inputs
    ): self {
        $obj = new self;

        $obj['externalEventId'] = $externalEventId;
        $obj['externalAccountId'] = $externalAccountId;
        $obj['inputs'] = $inputs;

        return $obj;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj['externalEventId'] = $externalEventID;

        return $obj;
    }

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj['externalAccountId'] = $externalAccountID;

        return $obj;
    }

    /**
     * List of marketing event details to create or update.
     *
     * @param list<MarketingEventEmailSubscriber|array{
     *   contactProperties: array<string,string>,
     *   email: string,
     *   interactionDateTime: int,
     *   properties: array<string,string>,
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
