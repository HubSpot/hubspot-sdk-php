<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * The current state of the timeline event.
 *
 * @phpstan-type TimelineEventResponseShape = array{
 *   id: string,
 *   eventTemplateId: string,
 *   objectType: string,
 *   tokens: array<string,string>,
 *   createdAt?: \DateTimeInterface|null,
 *   domain?: string|null,
 *   email?: string|null,
 *   extraData?: mixed,
 *   objectId?: string|null,
 *   timelineIFrame?: TimelineEventIFrame|null,
 *   timestamp?: \DateTimeInterface|null,
 *   utk?: string|null,
 * }
 */
final class TimelineEventResponse implements BaseModel
{
    /** @use SdkModel<TimelineEventResponseShape> */
    use SdkModel;

    /**
     * Identifier for the event. This should be unique to the app and event template. If you use the same ID for different CRM objects, the last to be processed will win and the first will not have a record. You can also use `{{uuid}}` anywhere in the ID to generate a unique string, guaranteeing uniqueness.
     */
    #[Required]
    public string $id;

    /**
     * The event template ID.
     */
    #[Required]
    public string $eventTemplateId;

    /**
     * The ObjectType associated with the EventTemplate.
     */
    #[Required]
    public string $objectType;

    /**
     * A collection of token keys and values associated with the template tokens.
     *
     * @var array<string,string> $tokens
     */
    #[Required(map: 'string')]
    public array $tokens;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

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
    #[Optional]
    public ?string $objectId;

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
     * `new TimelineEventResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TimelineEventResponse::with(
     *   id: ..., eventTemplateId: ..., objectType: ..., tokens: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TimelineEventResponse)
     *   ->withID(...)
     *   ->withEventTemplateID(...)
     *   ->withObjectType(...)
     *   ->withTokens(...)
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
     * @param TimelineEventIFrame|array{
     *   headerLabel: string, height: int, linkLabel: string, url: string, width: int
     * } $timelineIFrame
     */
    public static function with(
        string $id,
        string $eventTemplateId,
        string $objectType,
        array $tokens,
        ?\DateTimeInterface $createdAt = null,
        ?string $domain = null,
        ?string $email = null,
        mixed $extraData = null,
        ?string $objectId = null,
        TimelineEventIFrame|array|null $timelineIFrame = null,
        ?\DateTimeInterface $timestamp = null,
        ?string $utk = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['eventTemplateId'] = $eventTemplateId;
        $obj['objectType'] = $objectType;
        $obj['tokens'] = $tokens;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $domain && $obj['domain'] = $domain;
        null !== $email && $obj['email'] = $email;
        null !== $extraData && $obj['extraData'] = $extraData;
        null !== $objectId && $obj['objectId'] = $objectId;
        null !== $timelineIFrame && $obj['timelineIFrame'] = $timelineIFrame;
        null !== $timestamp && $obj['timestamp'] = $timestamp;
        null !== $utk && $obj['utk'] = $utk;

        return $obj;
    }

    /**
     * Identifier for the event. This should be unique to the app and event template. If you use the same ID for different CRM objects, the last to be processed will win and the first will not have a record. You can also use `{{uuid}}` anywhere in the ID to generate a unique string, guaranteeing uniqueness.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The event template ID.
     */
    public function withEventTemplateID(string $eventTemplateID): self
    {
        $obj = clone $this;
        $obj['eventTemplateId'] = $eventTemplateID;

        return $obj;
    }

    /**
     * The ObjectType associated with the EventTemplate.
     */
    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj['objectType'] = $objectType;

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
        $obj['tokens'] = $tokens;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The event domain (often paired with utk).
     */
    public function withDomain(string $domain): self
    {
        $obj = clone $this;
        $obj['domain'] = $domain;

        return $obj;
    }

    /**
     * The email address used for contact-specific events. This can be used to identify existing contacts, create new ones, or change the email for an existing contact (if paired with the `objectId`).
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * Additional event-specific data that can be interpreted by the template's markdown.
     */
    public function withExtraData(mixed $extraData): self
    {
        $obj = clone $this;
        $obj['extraData'] = $extraData;

        return $obj;
    }

    /**
     * The CRM object identifier. This is required for every event other than contacts (where utk or email can be used).
     */
    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj['objectId'] = $objectID;

        return $obj;
    }

    /**
     * @param TimelineEventIFrame|array{
     *   headerLabel: string, height: int, linkLabel: string, url: string, width: int
     * } $timelineIFrame
     */
    public function withTimelineIFrame(
        TimelineEventIFrame|array $timelineIFrame
    ): self {
        $obj = clone $this;
        $obj['timelineIFrame'] = $timelineIFrame;

        return $obj;
    }

    /**
     * The time the event occurred. If not passed in, the curren time will be assumed. This is used to determine where an event is shown on a CRM object's timeline.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * Use the `utk` parameter to associate an event with a contact by `usertoken`. This is recommended if you don't know a user's email, but have an identifying user token in your cookie.
     */
    public function withUtk(string $utk): self
    {
        $obj = clone $this;
        $obj['utk'] = $utk;

        return $obj;
    }
}
