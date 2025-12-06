<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ParticipationAssociationsShape = array{
 *   contact: ContactAssociation, marketingEvent: MarketingEventAssociation
 * }
 */
final class ParticipationAssociations implements BaseModel
{
    /** @use SdkModel<ParticipationAssociationsShape> */
    use SdkModel;

    #[Api]
    public ContactAssociation $contact;

    #[Api]
    public MarketingEventAssociation $marketingEvent;

    /**
     * `new ParticipationAssociations()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipationAssociations::with(contact: ..., marketingEvent: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ParticipationAssociations)->withContact(...)->withMarketingEvent(...)
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
     * @param ContactAssociation|array{
     *   contactId: string,
     *   email: string,
     *   firstname?: string|null,
     *   lastname?: string|null,
     * } $contact
     * @param MarketingEventAssociation|array{
     *   marketingEventId: string,
     *   name: string,
     *   externalAccountId?: string|null,
     *   externalEventId?: string|null,
     * } $marketingEvent
     */
    public static function with(
        ContactAssociation|array $contact,
        MarketingEventAssociation|array $marketingEvent,
    ): self {
        $obj = new self;

        $obj['contact'] = $contact;
        $obj['marketingEvent'] = $marketingEvent;

        return $obj;
    }

    /**
     * @param ContactAssociation|array{
     *   contactId: string,
     *   email: string,
     *   firstname?: string|null,
     *   lastname?: string|null,
     * } $contact
     */
    public function withContact(ContactAssociation|array $contact): self
    {
        $obj = clone $this;
        $obj['contact'] = $contact;

        return $obj;
    }

    /**
     * @param MarketingEventAssociation|array{
     *   marketingEventId: string,
     *   name: string,
     *   externalAccountId?: string|null,
     *   externalEventId?: string|null,
     * } $marketingEvent
     */
    public function withMarketingEvent(
        MarketingEventAssociation|array $marketingEvent
    ): self {
        $obj = clone $this;
        $obj['marketingEvent'] = $marketingEvent;

        return $obj;
    }
}
