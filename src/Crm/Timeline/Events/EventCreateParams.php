<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Timeline\TimelineEventIFrame;

/**
 * Send a single instance of event data to a specified event type.
 *
 * @see HubspotSDK\Services\Crm\Timeline\EventsService::create()
 *
 * @phpstan-type EventCreateParamsShape = array{
 *   eventTemplateId: string,
 *   tokens: array<string,string>,
 *   id?: string,
 *   domain?: string,
 *   email?: string,
 *   extraData?: mixed,
 *   objectId?: string,
 *   timelineIFrame?: TimelineEventIFrame,
 *   timestamp?: \DateTimeInterface,
 *   utk?: string,
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
    #[Api]
    public string $eventTemplateId;

    /**
     * A collection of token keys and values associated with the template tokens.
     *
     * @var array<string,string> $tokens
     */
    #[Api(map: 'string')]
    public array $tokens;

    /**
     * Identifier for the event. This is optional, and we recommend you do not pass this in. We will create one for you if you omit this. You can also use `{{uuid}}` anywhere in the ID to generate a unique string, guaranteeing uniqueness.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The event domain (often paired with utk).
     */
    #[Api(optional: true)]
    public ?string $domain;

    /**
     * The email address used for contact-specific events. This can be used to identify existing contacts, create new ones, or change the email for an existing contact (if paired with the `objectId`).
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * Additional event-specific data that can be interpreted by the template's markdown.
     */
    #[Api(optional: true)]
    public mixed $extraData;

    /**
     * The CRM object identifier. This is required for every event other than contacts (where utk or email can be used).
     */
    #[Api(optional: true)]
    public ?string $objectId;

    #[Api(optional: true)]
    public ?TimelineEventIFrame $timelineIFrame;

    /**
     * The time the event occurred. If not passed in, the curren time will be assumed. This is used to determine where an event is shown on a CRM object's timeline.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $timestamp;

    /**
     * Use the `utk` parameter to associate an event with a contact by `usertoken`. This is recommended if you don't know a user's email, but have an identifying user token in your cookie.
     */
    #[Api(optional: true)]
    public ?string $utk;

    /**
     * `new EventCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventCreateParams::with(eventTemplateId: ..., tokens: ...)
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
     */
    public static function with(
        string $eventTemplateId,
        array $tokens,
        ?string $id = null,
        ?string $domain = null,
        ?string $email = null,
        mixed $extraData = null,
        ?string $objectId = null,
        ?TimelineEventIFrame $timelineIFrame = null,
        ?\DateTimeInterface $timestamp = null,
        ?string $utk = null,
    ): self {
        $obj = new self;

        $obj->eventTemplateId = $eventTemplateId;
        $obj->tokens = $tokens;

        null !== $id && $obj->id = $id;
        null !== $domain && $obj->domain = $domain;
        null !== $email && $obj->email = $email;
        null !== $extraData && $obj->extraData = $extraData;
        null !== $objectId && $obj->objectId = $objectId;
        null !== $timelineIFrame && $obj->timelineIFrame = $timelineIFrame;
        null !== $timestamp && $obj->timestamp = $timestamp;
        null !== $utk && $obj->utk = $utk;

        return $obj;
    }

    /**
     * The event template ID.
     */
    public function withEventTemplateID(string $eventTemplateID): self
    {
        $obj = clone $this;
        $obj->eventTemplateId = $eventTemplateID;

        return $obj;
    }

    /**
     * A collection of token keys and values associated with the template tokens.
     *
     * @param array<string,string> $tokens
     */
    public function withTokens(array $tokens): self
    {
        $obj = clone $this;
        $obj->tokens = $tokens;

        return $obj;
    }

    /**
     * Identifier for the event. This is optional, and we recommend you do not pass this in. We will create one for you if you omit this. You can also use `{{uuid}}` anywhere in the ID to generate a unique string, guaranteeing uniqueness.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The event domain (often paired with utk).
     */
    public function withDomain(string $domain): self
    {
        $obj = clone $this;
        $obj->domain = $domain;

        return $obj;
    }

    /**
     * The email address used for contact-specific events. This can be used to identify existing contacts, create new ones, or change the email for an existing contact (if paired with the `objectId`).
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * Additional event-specific data that can be interpreted by the template's markdown.
     */
    public function withExtraData(mixed $extraData): self
    {
        $obj = clone $this;
        $obj->extraData = $extraData;

        return $obj;
    }

    /**
     * The CRM object identifier. This is required for every event other than contacts (where utk or email can be used).
     */
    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectId = $objectID;

        return $obj;
    }

    public function withTimelineIFrame(
        TimelineEventIFrame $timelineIFrame
    ): self {
        $obj = clone $this;
        $obj->timelineIFrame = $timelineIFrame;

        return $obj;
    }

    /**
     * The time the event occurred. If not passed in, the curren time will be assumed. This is used to determine where an event is shown on a CRM object's timeline.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }

    /**
     * Use the `utk` parameter to associate an event with a contact by `usertoken`. This is recommended if you don't know a user's email, but have an identifying user token in your cookie.
     */
    public function withUtk(string $utk): self
    {
        $obj = clone $this;
        $obj->utk = $utk;

        return $obj;
    }
}
