<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ContactAssociationShape from \HubSpotSDK\Marketing\MarketingEvents\ContactAssociation
 * @phpstan-import-type MarketingEventAssociationShape from \HubSpotSDK\Marketing\MarketingEvents\MarketingEventAssociation
 *
 * @phpstan-type ParticipationAssociationsShape = array{
 *   contact: ContactAssociation|ContactAssociationShape,
 *   marketingEvent: MarketingEventAssociation|MarketingEventAssociationShape,
 * }
 */
final class ParticipationAssociations implements BaseModel
{
    /** @use SdkModel<ParticipationAssociationsShape> */
    use SdkModel;

    #[Required]
    public ContactAssociation $contact;

    #[Required]
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
     * @param ContactAssociation|ContactAssociationShape $contact
     * @param MarketingEventAssociation|MarketingEventAssociationShape $marketingEvent
     */
    public static function with(
        ContactAssociation|array $contact,
        MarketingEventAssociation|array $marketingEvent,
    ): self {
        $self = new self;

        $self['contact'] = $contact;
        $self['marketingEvent'] = $marketingEvent;

        return $self;
    }

    /**
     * @param ContactAssociation|ContactAssociationShape $contact
     */
    public function withContact(ContactAssociation|array $contact): self
    {
        $self = clone $this;
        $self['contact'] = $contact;

        return $self;
    }

    /**
     * @param MarketingEventAssociation|MarketingEventAssociationShape $marketingEvent
     */
    public function withMarketingEvent(
        MarketingEventAssociation|array $marketingEvent
    ): self {
        $self = clone $this;
        $self['marketingEvent'] = $marketingEvent;

        return $self;
    }
}
