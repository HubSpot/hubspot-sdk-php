<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns all Marketing Events available on the portal, along with their properties, regardless of whether they were created manually or through the application.
 *
 * The marketing events returned by this endpoint are sorted by objectId.
 *
 * @see HubspotSDK\Services\Marketing\EventsService::list()
 *
 * @phpstan-type EventListParamsShape = array{
 *   after?: string|null, limit?: int|null
 * }
 */
final class EventListParams implements BaseModel
{
    /** @use SdkModel<EventListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The cursor indicating the position of the last retrieved item.
     */
    #[Optional]
    public ?string $after;

    /**
     * The limit for response size. The default value is 10, the max number is 100.
     */
    #[Optional]
    public ?int $limit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $after = null, ?int $limit = null): self
    {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    /**
     * The cursor indicating the position of the last retrieved item.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * The limit for response size. The default value is 10, the max number is 100.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
