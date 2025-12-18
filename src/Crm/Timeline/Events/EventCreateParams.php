<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Timeline\TimelineEventIFrame;

/**
 * Send a single instance of event data to a specified event type.
 *
 * @see HubspotSDK\Services\Crm\Timeline\EventsService::create()
 *
 * @phpstan-import-type TimelineEventIFrameShape from \HubspotSDK\Crm\Timeline\TimelineEventIFrame
 *
 * @phpstan-type EventCreateParamsShape = array{
 *   eventTemplateID: string,
 *   tokens: array<string,string>,
 *   id?: string|null,
 *   domain?: string|null,
 *   email?: string|null,
 *   extraData?: mixed,
 *   objectID?: string|null,
 *   timelineIFrame?: null|TimelineEventIFrame|TimelineEventIFrameShape,
 *   timestamp?: \DateTimeInterface|null,
 *   utk?: string|null,
 * }
 */
final class EventCreateParams implements BaseModel
{
    /** @use SdkModel<EventCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The event template ID.
     */
    #[Required('eventTemplateId')]
    public string $eventTemplateID;

    /**
     * A collection of token keys and values associated with the template tokens.
     *
     * @var array<string,string> $tokens
     */
    #[Required(map: 'string')]
    public array $tokens;

    /**
     * Identifier for the event. This is optional, and we recommend you do not pass this in. We will create one for you if you omit this. You can also use `{{uuid}}` anywhere in the ID to generate a unique string, guaranteeing uniqueness.
     */
    #[Optional]
    public ?string $id;

    /**
     * The event domain (often paired with utk).
     */
    #[Optional]
    public ?string $domain;

    /**
     * The email address used for contact-specific events. This can be used to identify existing contacts, create new ones, or change the email for an existing contact (if paired with the `objectId`).
     */
    #[Optional]
    public ?string $email;

    /**
     * Additional event-specific data that can be interpreted by the template's markdown.
     */
    #[Optional]
    public mixed $extraData;

    /**
     * The CRM object identifier. This is required for every event other than contacts (where utk or email can be used).
     */
    #[Optional('objectId')]
    public ?string $objectID;

    #[Optional]
    public ?TimelineEventIFrame $timelineIFrame;

    /**
     * The time the event occurred. If not passed in, the curren time will be assumed. This is used to determine where an event is shown on a CRM object's timeline.
     */
    #[Optional]
    public ?\DateTimeInterface $timestamp;

    /**
     * Use the `utk` parameter to associate an event with a contact by `usertoken`. This is recommended if you don't know a user's email, but have an identifying user token in your cookie.
     */
    #[Optional]
    public ?string $utk;

    /**
     * `new EventCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventCreateParams::with(eventTemplateID: ..., tokens: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventCreateParams)->withEventTemplateID(...)->withTokens(...)
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
     * @param array<string,string> $tokens
     * @param TimelineEventIFrame|TimelineEventIFrameShape|null $timelineIFrame
     */
    public static function with(
        string $eventTemplateID,
        array $tokens,
        ?string $id = null,
        ?string $domain = null,
        ?string $email = null,
        mixed $extraData = null,
        ?string $objectID = null,
        TimelineEventIFrame|array|null $timelineIFrame = null,
        ?\DateTimeInterface $timestamp = null,
        ?string $utk = null,
    ): self {
        $self = new self;

        $self['eventTemplateID'] = $eventTemplateID;
        $self['tokens'] = $tokens;

        null !== $id && $self['id'] = $id;
        null !== $domain && $self['domain'] = $domain;
        null !== $email && $self['email'] = $email;
        null !== $extraData && $self['extraData'] = $extraData;
        null !== $objectID && $self['objectID'] = $objectID;
        null !== $timelineIFrame && $self['timelineIFrame'] = $timelineIFrame;
        null !== $timestamp && $self['timestamp'] = $timestamp;
        null !== $utk && $self['utk'] = $utk;

        return $self;
    }

    /**
     * The event template ID.
     */
    public function withEventTemplateID(string $eventTemplateID): self
    {
        $self = clone $this;
        $self['eventTemplateID'] = $eventTemplateID;

        return $self;
    }

    /**
     * A collection of token keys and values associated with the template tokens.
     *
     * @param array<string,string> $tokens
     */
    public function withTokens(array $tokens): self
    {
        $self = clone $this;
        $self['tokens'] = $tokens;

        return $self;
    }

    /**
     * Identifier for the event. This is optional, and we recommend you do not pass this in. We will create one for you if you omit this. You can also use `{{uuid}}` anywhere in the ID to generate a unique string, guaranteeing uniqueness.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The event domain (often paired with utk).
     */
    public function withDomain(string $domain): self
    {
        $self = clone $this;
        $self['domain'] = $domain;

        return $self;
    }

    /**
     * The email address used for contact-specific events. This can be used to identify existing contacts, create new ones, or change the email for an existing contact (if paired with the `objectId`).
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Additional event-specific data that can be interpreted by the template's markdown.
     */
    public function withExtraData(mixed $extraData): self
    {
        $self = clone $this;
        $self['extraData'] = $extraData;

        return $self;
    }

    /**
     * The CRM object identifier. This is required for every event other than contacts (where utk or email can be used).
     */
    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * @param TimelineEventIFrame|TimelineEventIFrameShape $timelineIFrame
     */
    public function withTimelineIFrame(
        TimelineEventIFrame|array $timelineIFrame
    ): self {
        $self = clone $this;
        $self['timelineIFrame'] = $timelineIFrame;

        return $self;
    }

    /**
     * The time the event occurred. If not passed in, the curren time will be assumed. This is used to determine where an event is shown on a CRM object's timeline.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * Use the `utk` parameter to associate an event with a contact by `usertoken`. This is recommended if you don't know a user's email, but have an identifying user token in your cookie.
     */
    public function withUtk(string $utk): self
    {
        $self = clone $this;
        $self['utk'] = $utk;

        return $self;
    }
}
