<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CrmPropertyWrapperShape from \HubSpotSDK\Marketing\MarketingEvents\CrmPropertyWrapper
 * @phpstan-import-type AppInfoShape from \HubSpotSDK\Marketing\MarketingEvents\AppInfo
 *
 * @phpstan-type MarketingEventPublicDefaultResponseV2Shape = array{
 *   createdAt: \DateTimeInterface,
 *   customProperties: list<CrmPropertyWrapper|CrmPropertyWrapperShape>,
 *   eventName: string,
 *   objectID: string,
 *   updatedAt: \DateTimeInterface,
 *   appInfo?: null|AppInfo|AppInfoShape,
 *   endDateTime?: \DateTimeInterface|null,
 *   eventCancelled?: bool|null,
 *   eventCompleted?: bool|null,
 *   eventDescription?: string|null,
 *   eventOrganizer?: string|null,
 *   eventType?: string|null,
 *   eventURL?: string|null,
 *   startDateTime?: \DateTimeInterface|null,
 * }
 */
final class MarketingEventPublicDefaultResponseV2 implements BaseModel
{
    /** @use SdkModel<MarketingEventPublicDefaultResponseV2Shape> */
    use SdkModel;

    /**
     * The creation date and time of the marketing event.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /** @var list<CrmPropertyWrapper> $customProperties */
    #[Required(list: CrmPropertyWrapper::class)]
    public array $customProperties;

    /**
     * The name of the marketing event.
     */
    #[Required]
    public string $eventName;

    /**
     * The internal ID of the marketing event in HubSpot.
     */
    #[Required('objectId')]
    public string $objectID;

    /**
     * The update date and time of the marketing event.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Optional]
    public ?AppInfo $appInfo;

    /**
     * The end date and time of the marketing event.
     */
    #[Optional]
    public ?\DateTimeInterface $endDateTime;

    /**
     * Indicates if the marketing event has been cancelled.
     */
    #[Optional]
    public ?bool $eventCancelled;

    /**
     * Indicates if the marketing event has been completed.
     */
    #[Optional]
    public ?bool $eventCompleted;

    /**
     * The description of the marketing event.
     */
    #[Optional]
    public ?string $eventDescription;

    /**
     * The name of the organizer of the marketing event.
     */
    #[Optional]
    public ?string $eventOrganizer;

    /**
     * The type of the marketing event.
     */
    #[Optional]
    public ?string $eventType;

    /**
     * A URL in the external event application where the marketing event can be managed.
     */
    #[Optional('eventUrl')]
    public ?string $eventURL;

    /**
     * The start date and time of the marketing event.
     */
    #[Optional]
    public ?\DateTimeInterface $startDateTime;

    /**
     * `new MarketingEventPublicDefaultResponseV2()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventPublicDefaultResponseV2::with(
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
     * (new MarketingEventPublicDefaultResponseV2)
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
     * @param list<CrmPropertyWrapper|CrmPropertyWrapperShape> $customProperties
     * @param AppInfo|AppInfoShape|null $appInfo
     */
    public static function with(
        \DateTimeInterface $createdAt,
        array $customProperties,
        string $eventName,
        string $objectID,
        \DateTimeInterface $updatedAt,
        AppInfo|array|null $appInfo = null,
        ?\DateTimeInterface $endDateTime = null,
        ?bool $eventCancelled = null,
        ?bool $eventCompleted = null,
        ?string $eventDescription = null,
        ?string $eventOrganizer = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        ?\DateTimeInterface $startDateTime = null,
    ): self {
        $self = new self;

        $self['createdAt'] = $createdAt;
        $self['customProperties'] = $customProperties;
        $self['eventName'] = $eventName;
        $self['objectID'] = $objectID;
        $self['updatedAt'] = $updatedAt;

        null !== $appInfo && $self['appInfo'] = $appInfo;
        null !== $endDateTime && $self['endDateTime'] = $endDateTime;
        null !== $eventCancelled && $self['eventCancelled'] = $eventCancelled;
        null !== $eventCompleted && $self['eventCompleted'] = $eventCompleted;
        null !== $eventDescription && $self['eventDescription'] = $eventDescription;
        null !== $eventOrganizer && $self['eventOrganizer'] = $eventOrganizer;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $eventURL && $self['eventURL'] = $eventURL;
        null !== $startDateTime && $self['startDateTime'] = $startDateTime;

        return $self;
    }

    /**
     * The creation date and time of the marketing event.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param list<CrmPropertyWrapper|CrmPropertyWrapperShape> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $self = clone $this;
        $self['customProperties'] = $customProperties;

        return $self;
    }

    /**
     * The name of the marketing event.
     */
    public function withEventName(string $eventName): self
    {
        $self = clone $this;
        $self['eventName'] = $eventName;

        return $self;
    }

    /**
     * The internal ID of the marketing event in HubSpot.
     */
    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * The update date and time of the marketing event.
     */
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

    /**
     * The end date and time of the marketing event.
     */
    public function withEndDateTime(\DateTimeInterface $endDateTime): self
    {
        $self = clone $this;
        $self['endDateTime'] = $endDateTime;

        return $self;
    }

    /**
     * Indicates if the marketing event has been cancelled.
     */
    public function withEventCancelled(bool $eventCancelled): self
    {
        $self = clone $this;
        $self['eventCancelled'] = $eventCancelled;

        return $self;
    }

    /**
     * Indicates if the marketing event has been completed.
     */
    public function withEventCompleted(bool $eventCompleted): self
    {
        $self = clone $this;
        $self['eventCompleted'] = $eventCompleted;

        return $self;
    }

    /**
     * The description of the marketing event.
     */
    public function withEventDescription(string $eventDescription): self
    {
        $self = clone $this;
        $self['eventDescription'] = $eventDescription;

        return $self;
    }

    /**
     * The name of the organizer of the marketing event.
     */
    public function withEventOrganizer(string $eventOrganizer): self
    {
        $self = clone $this;
        $self['eventOrganizer'] = $eventOrganizer;

        return $self;
    }

    /**
     * The type of the marketing event.
     */
    public function withEventType(string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    /**
     * A URL in the external event application where the marketing event can be managed.
     */
    public function withEventURL(string $eventURL): self
    {
        $self = clone $this;
        $self['eventURL'] = $eventURL;

        return $self;
    }

    /**
     * The start date and time of the marketing event.
     */
    public function withStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $self = clone $this;
        $self['startDateTime'] = $startDateTime;

        return $self;
    }
}
