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
 * @phpstan-type MarketingEventPublicDefaultResponseV2Shape = array{
 *   createdAt: \DateTimeInterface,
 *   customProperties: list<CrmPropertyWrapperShape>,
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
    public ?string $eventType;

    #[Optional('eventUrl')]
    public ?string $eventURL;

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
     * @param list<CrmPropertyWrapperShape> $customProperties
     * @param AppInfoShape $appInfo
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
     * @param AppInfoShape $appInfo
     */
    public function withAppInfo(AppInfo|array $appInfo): self
    {
        $self = clone $this;
        $self['appInfo'] = $appInfo;

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

    public function withStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $self = clone $this;
        $self['startDateTime'] = $startDateTime;

        return $self;
    }
}
