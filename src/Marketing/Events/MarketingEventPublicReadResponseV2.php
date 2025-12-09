<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MarketingEventPublicReadResponseV2Shape = array{
 *   createdAt: \DateTimeInterface,
 *   customProperties: list<CrmPropertyWrapper>,
 *   eventName: string,
 *   objectId: string,
 *   updatedAt: \DateTimeInterface,
 *   appInfo?: AppInfo|null,
 *   attendees?: int|null,
 *   cancellations?: int|null,
 *   endDateTime?: \DateTimeInterface|null,
 *   eventCancelled?: bool|null,
 *   eventCompleted?: bool|null,
 *   eventDescription?: string|null,
 *   eventOrganizer?: string|null,
 *   eventStatus?: string|null,
 *   eventType?: string|null,
 *   eventUrl?: string|null,
 *   externalEventId?: string|null,
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

    #[Required]
    public string $objectId;

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

    #[Optional]
    public ?string $eventUrl;

    #[Optional]
    public ?string $externalEventId;

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
     *   objectId: ...,
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
     * @param list<CrmPropertyWrapper|array{
     *   name: string, value: string
     * }> $customProperties
     * @param AppInfo|array{id: string, name: string} $appInfo
     */
    public static function with(
        \DateTimeInterface $createdAt,
        array $customProperties,
        string $eventName,
        string $objectId,
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
        ?string $eventUrl = null,
        ?string $externalEventId = null,
        ?int $noShows = null,
        ?int $registrants = null,
        ?\DateTimeInterface $startDateTime = null,
    ): self {
        $obj = new self;

        $obj['createdAt'] = $createdAt;
        $obj['customProperties'] = $customProperties;
        $obj['eventName'] = $eventName;
        $obj['objectId'] = $objectId;
        $obj['updatedAt'] = $updatedAt;

        null !== $appInfo && $obj['appInfo'] = $appInfo;
        null !== $attendees && $obj['attendees'] = $attendees;
        null !== $cancellations && $obj['cancellations'] = $cancellations;
        null !== $endDateTime && $obj['endDateTime'] = $endDateTime;
        null !== $eventCancelled && $obj['eventCancelled'] = $eventCancelled;
        null !== $eventCompleted && $obj['eventCompleted'] = $eventCompleted;
        null !== $eventDescription && $obj['eventDescription'] = $eventDescription;
        null !== $eventOrganizer && $obj['eventOrganizer'] = $eventOrganizer;
        null !== $eventStatus && $obj['eventStatus'] = $eventStatus;
        null !== $eventType && $obj['eventType'] = $eventType;
        null !== $eventUrl && $obj['eventUrl'] = $eventUrl;
        null !== $externalEventId && $obj['externalEventId'] = $externalEventId;
        null !== $noShows && $obj['noShows'] = $noShows;
        null !== $registrants && $obj['registrants'] = $registrants;
        null !== $startDateTime && $obj['startDateTime'] = $startDateTime;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * @param list<CrmPropertyWrapper|array{
     *   name: string, value: string
     * }> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $obj = clone $this;
        $obj['customProperties'] = $customProperties;

        return $obj;
    }

    public function withEventName(string $eventName): self
    {
        $obj = clone $this;
        $obj['eventName'] = $eventName;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj['objectId'] = $objectID;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * @param AppInfo|array{id: string, name: string} $appInfo
     */
    public function withAppInfo(AppInfo|array $appInfo): self
    {
        $obj = clone $this;
        $obj['appInfo'] = $appInfo;

        return $obj;
    }

    public function withAttendees(int $attendees): self
    {
        $obj = clone $this;
        $obj['attendees'] = $attendees;

        return $obj;
    }

    public function withCancellations(int $cancellations): self
    {
        $obj = clone $this;
        $obj['cancellations'] = $cancellations;

        return $obj;
    }

    public function withEndDateTime(\DateTimeInterface $endDateTime): self
    {
        $obj = clone $this;
        $obj['endDateTime'] = $endDateTime;

        return $obj;
    }

    public function withEventCancelled(bool $eventCancelled): self
    {
        $obj = clone $this;
        $obj['eventCancelled'] = $eventCancelled;

        return $obj;
    }

    public function withEventCompleted(bool $eventCompleted): self
    {
        $obj = clone $this;
        $obj['eventCompleted'] = $eventCompleted;

        return $obj;
    }

    public function withEventDescription(string $eventDescription): self
    {
        $obj = clone $this;
        $obj['eventDescription'] = $eventDescription;

        return $obj;
    }

    public function withEventOrganizer(string $eventOrganizer): self
    {
        $obj = clone $this;
        $obj['eventOrganizer'] = $eventOrganizer;

        return $obj;
    }

    public function withEventStatus(string $eventStatus): self
    {
        $obj = clone $this;
        $obj['eventStatus'] = $eventStatus;

        return $obj;
    }

    public function withEventType(string $eventType): self
    {
        $obj = clone $this;
        $obj['eventType'] = $eventType;

        return $obj;
    }

    public function withEventURL(string $eventURL): self
    {
        $obj = clone $this;
        $obj['eventUrl'] = $eventURL;

        return $obj;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj['externalEventId'] = $externalEventID;

        return $obj;
    }

    public function withNoShows(int $noShows): self
    {
        $obj = clone $this;
        $obj['noShows'] = $noShows;

        return $obj;
    }

    public function withRegistrants(int $registrants): self
    {
        $obj = clone $this;
        $obj['registrants'] = $registrants;

        return $obj;
    }

    public function withStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $obj = clone $this;
        $obj['startDateTime'] = $startDateTime;

        return $obj;
    }
}
