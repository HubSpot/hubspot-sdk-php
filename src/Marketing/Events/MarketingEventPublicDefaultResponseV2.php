<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type MarketingEventPublicDefaultResponseV2Shape = array{
 *   createdAt: \DateTimeInterface,
 *   customProperties: list<CrmPropertyWrapper>,
 *   eventName: string,
 *   objectId: string,
 *   updatedAt: \DateTimeInterface,
 *   appInfo?: AppInfo|null,
 *   endDateTime?: \DateTimeInterface|null,
 *   eventCancelled?: bool|null,
 *   eventCompleted?: bool|null,
 *   eventDescription?: string|null,
 *   eventOrganizer?: string|null,
 *   eventType?: string|null,
 *   eventUrl?: string|null,
 *   startDateTime?: \DateTimeInterface|null,
 * }
 */
final class MarketingEventPublicDefaultResponseV2 implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MarketingEventPublicDefaultResponseV2Shape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public \DateTimeInterface $createdAt;

    /** @var list<CrmPropertyWrapper> $customProperties */
    #[Api(list: CrmPropertyWrapper::class)]
    public array $customProperties;

    #[Api]
    public string $eventName;

    #[Api]
    public string $objectId;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?AppInfo $appInfo;

    #[Api(optional: true)]
    public ?\DateTimeInterface $endDateTime;

    #[Api(optional: true)]
    public ?bool $eventCancelled;

    #[Api(optional: true)]
    public ?bool $eventCompleted;

    #[Api(optional: true)]
    public ?string $eventDescription;

    #[Api(optional: true)]
    public ?string $eventOrganizer;

    #[Api(optional: true)]
    public ?string $eventType;

    #[Api(optional: true)]
    public ?string $eventUrl;

    #[Api(optional: true)]
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
     *   objectId: ...,
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
        ?\DateTimeInterface $endDateTime = null,
        ?bool $eventCancelled = null,
        ?bool $eventCompleted = null,
        ?string $eventDescription = null,
        ?string $eventOrganizer = null,
        ?string $eventType = null,
        ?string $eventUrl = null,
        ?\DateTimeInterface $startDateTime = null,
    ): self {
        $obj = new self;

        $obj['createdAt'] = $createdAt;
        $obj['customProperties'] = $customProperties;
        $obj['eventName'] = $eventName;
        $obj['objectId'] = $objectId;
        $obj['updatedAt'] = $updatedAt;

        null !== $appInfo && $obj['appInfo'] = $appInfo;
        null !== $endDateTime && $obj['endDateTime'] = $endDateTime;
        null !== $eventCancelled && $obj['eventCancelled'] = $eventCancelled;
        null !== $eventCompleted && $obj['eventCompleted'] = $eventCompleted;
        null !== $eventDescription && $obj['eventDescription'] = $eventDescription;
        null !== $eventOrganizer && $obj['eventOrganizer'] = $eventOrganizer;
        null !== $eventType && $obj['eventType'] = $eventType;
        null !== $eventUrl && $obj['eventUrl'] = $eventUrl;
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

    public function withStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $obj = clone $this;
        $obj['startDateTime'] = $startDateTime;

        return $obj;
    }
}
