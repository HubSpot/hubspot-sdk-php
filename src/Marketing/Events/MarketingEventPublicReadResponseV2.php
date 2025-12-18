<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CrmPropertyWrapperShape from \HubspotSDK\Marketing\Events\CrmPropertyWrapper
 * @phpstan-import-type AppInfoShape from \HubspotSDK\Marketing\Events\AppInfo
 *
 * @phpstan-type MarketingEventPublicReadResponseV2Shape = array{
 *   createdAt: \DateTimeInterface,
 *   customProperties: list<CrmPropertyWrapperShape>,
 *   eventName: string,
 *   objectID: string,
 *   updatedAt: \DateTimeInterface,
 *   appInfo?: null|AppInfo|AppInfoShape,
 *   attendees?: int|null,
 *   cancellations?: int|null,
 *   endDateTime?: \DateTimeInterface|null,
 *   eventCancelled?: bool|null,
 *   eventCompleted?: bool|null,
 *   eventDescription?: string|null,
 *   eventOrganizer?: string|null,
 *   eventStatus?: string|null,
 *   eventType?: string|null,
 *   eventURL?: string|null,
 *   externalEventID?: string|null,
 *   noShows?: int|null,
 *   registrants?: int|null,
 *   startDateTime?: \DateTimeInterface|null,
 * }
 */
final class MarketingEventPublicReadResponseV2 implements BaseModel
{
    /** @use SdkModel<MarketingEventPublicReadResponseV2Shape> */
    use SdkModel;

    #[Required]
    public \DateTimeInterface $createdAt;

    /** @var list<CrmPropertyWrapper> $customProperties */
    #[Required(list: CrmPropertyWrapper::class)]
    public array $customProperties;

    #[Required]
    public string $eventName;

    #[Required('objectId')]
    public string $objectID;

    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Optional]
    public ?AppInfo $appInfo;

    #[Optional]
    public ?int $attendees;

    #[Optional]
    public ?int $cancellations;

    #[Optional]
    public ?\DateTimeInterface $endDateTime;

    #[Optional]
    public ?bool $eventCancelled;

    #[Optional]
    public ?bool $eventCompleted;

    #[Optional]
    public ?string $eventDescription;

    #[Optional]
    public ?string $eventOrganizer;

    #[Optional]
    public ?string $eventStatus;

    #[Optional]
    public ?string $eventType;

    #[Optional('eventUrl')]
    public ?string $eventURL;

    #[Optional('externalEventId')]
    public ?string $externalEventID;

    #[Optional]
    public ?int $noShows;

    #[Optional]
    public ?int $registrants;

    #[Optional]
    public ?\DateTimeInterface $startDateTime;

    /**
     * `new MarketingEventPublicReadResponseV2()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventPublicReadResponseV2::with(
     *   createdAt: ...,
     *   customProperties: ...,
     *   eventName: ...,
     *   objectID: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventPublicReadResponseV2)
     *   ->withCreatedAt(...)
     *   ->withCustomProperties(...)
     *   ->withEventName(...)
     *   ->withObjectID(...)
     *   ->withUpdatedAt(...)
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
     * @param list<CrmPropertyWrapperShape> $customProperties
     * @param AppInfo|AppInfoShape|null $appInfo
     */
    public static function with(
        \DateTimeInterface $createdAt,
        array $customProperties,
        string $eventName,
        string $objectID,
        \DateTimeInterface $updatedAt,
        AppInfo|array|null $appInfo = null,
        ?int $attendees = null,
        ?int $cancellations = null,
        ?\DateTimeInterface $endDateTime = null,
        ?bool $eventCancelled = null,
        ?bool $eventCompleted = null,
        ?string $eventDescription = null,
        ?string $eventOrganizer = null,
        ?string $eventStatus = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        ?string $externalEventID = null,
        ?int $noShows = null,
        ?int $registrants = null,
        ?\DateTimeInterface $startDateTime = null,
    ): self {
        $self = new self;

        $self['createdAt'] = $createdAt;
        $self['customProperties'] = $customProperties;
        $self['eventName'] = $eventName;
        $self['objectID'] = $objectID;
        $self['updatedAt'] = $updatedAt;

        null !== $appInfo && $self['appInfo'] = $appInfo;
        null !== $attendees && $self['attendees'] = $attendees;
        null !== $cancellations && $self['cancellations'] = $cancellations;
        null !== $endDateTime && $self['endDateTime'] = $endDateTime;
        null !== $eventCancelled && $self['eventCancelled'] = $eventCancelled;
        null !== $eventCompleted && $self['eventCompleted'] = $eventCompleted;
        null !== $eventDescription && $self['eventDescription'] = $eventDescription;
        null !== $eventOrganizer && $self['eventOrganizer'] = $eventOrganizer;
        null !== $eventStatus && $self['eventStatus'] = $eventStatus;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $eventURL && $self['eventURL'] = $eventURL;
        null !== $externalEventID && $self['externalEventID'] = $externalEventID;
        null !== $noShows && $self['noShows'] = $noShows;
        null !== $registrants && $self['registrants'] = $registrants;
        null !== $startDateTime && $self['startDateTime'] = $startDateTime;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param list<CrmPropertyWrapperShape> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $self = clone $this;
        $self['customProperties'] = $customProperties;

        return $self;
    }

    public function withEventName(string $eventName): self
    {
        $self = clone $this;
        $self['eventName'] = $eventName;

        return $self;
    }

    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param AppInfo|AppInfoShape $appInfo
     */
    public function withAppInfo(AppInfo|array $appInfo): self
    {
        $self = clone $this;
        $self['appInfo'] = $appInfo;

        return $self;
    }

    public function withAttendees(int $attendees): self
    {
        $self = clone $this;
        $self['attendees'] = $attendees;

        return $self;
    }

    public function withCancellations(int $cancellations): self
    {
        $self = clone $this;
        $self['cancellations'] = $cancellations;

        return $self;
    }

    public function withEndDateTime(\DateTimeInterface $endDateTime): self
    {
        $self = clone $this;
        $self['endDateTime'] = $endDateTime;

        return $self;
    }

    public function withEventCancelled(bool $eventCancelled): self
    {
        $self = clone $this;
        $self['eventCancelled'] = $eventCancelled;

        return $self;
    }

    public function withEventCompleted(bool $eventCompleted): self
    {
        $self = clone $this;
        $self['eventCompleted'] = $eventCompleted;

        return $self;
    }

    public function withEventDescription(string $eventDescription): self
    {
        $self = clone $this;
        $self['eventDescription'] = $eventDescription;

        return $self;
    }

    public function withEventOrganizer(string $eventOrganizer): self
    {
        $self = clone $this;
        $self['eventOrganizer'] = $eventOrganizer;

        return $self;
    }

    public function withEventStatus(string $eventStatus): self
    {
        $self = clone $this;
        $self['eventStatus'] = $eventStatus;

        return $self;
    }

    public function withEventType(string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    public function withEventURL(string $eventURL): self
    {
        $self = clone $this;
        $self['eventURL'] = $eventURL;

        return $self;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $self = clone $this;
        $self['externalEventID'] = $externalEventID;

        return $self;
    }

    public function withNoShows(int $noShows): self
    {
        $self = clone $this;
        $self['noShows'] = $noShows;

        return $self;
    }

    public function withRegistrants(int $registrants): self
    {
        $self = clone $this;
        $self['registrants'] = $registrants;

        return $self;
    }

    public function withStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $self = clone $this;
        $self['startDateTime'] = $startDateTime;

        return $self;
    }
}
