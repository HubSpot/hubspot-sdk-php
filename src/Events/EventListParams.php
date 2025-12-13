<?php

declare(strict_types=1);

namespace HubspotSDK\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventListParams\ObjectProperty;
use HubspotSDK\Events\EventListParams\Property;

/**
 * Retrieve instances of event completion data. For example, retrieve all event completions associated with a specific contact.
 *
 * @see HubspotSDK\Services\EventsService::list()
 *
 * @phpstan-type EventListParamsShape = array{
 *   id?: list<string>,
 *   after?: string,
 *   before?: string,
 *   eventType?: string,
 *   limit?: int,
 *   objectID?: int,
 *   objectProperty?: ObjectProperty|array{_propname?: mixed},
 *   objectType?: string,
 *   occurredAfter?: \DateTimeInterface,
 *   occurredBefore?: \DateTimeInterface,
 *   property?: Property|array{_propname?: mixed},
 *   sort?: list<string>,
 * }
 */
final class EventListParams implements BaseModel
{
    /** @use SdkModel<EventListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of an event instance. IDs are 1:1 with event instances. If you provide this filter and additional filters, the other filters must match the values on the event instance to yield results.
     *
     * @var list<string>|null $id
     */
    #[Optional(list: 'string')]
    public ?array $id;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    #[Optional]
    public ?string $before;

    /**
     * The event type name. You can retrieve available event types using the [event types endpoint](#get-%2Fevents%2Fv3%2Fevents%2Fevent-types).
     */
    #[Optional]
    public ?string $eventType;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The ID of the CRM Object to filter event instances on. When including this parameter, you must also include the `objectType` parameter.
     */
    #[Optional]
    public ?int $objectID;

    #[Optional]
    public ?ObjectProperty $objectProperty;

    /**
     * The type of CRM object to filter event instances on (e.g., `contact`). To retrieve event data for a specific CRM record, include the additional `objectId` query parameter (below).
     */
    #[Optional]
    public ?string $objectType;

    /**
     * Filter for event data that occurred after a specific datetime.
     */
    #[Optional]
    public ?\DateTimeInterface $occurredAfter;

    /**
     * Filter for event data that occurred before a specific datetime.
     */
    #[Optional]
    public ?\DateTimeInterface $occurredBefore;

    #[Optional]
    public ?Property $property;

    /**
     * Sort direction based on the timestamp of the event instance, `ASCENDING` or `DESCENDING`.
     *
     * @var list<string>|null $sort
     */
    #[Optional(list: 'string')]
    public ?array $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $id
     * @param ObjectProperty|array{_propname?: mixed} $objectProperty
     * @param Property|array{_propname?: mixed} $property
     * @param list<string> $sort
     */
    public static function with(
        ?array $id = null,
        ?string $after = null,
        ?string $before = null,
        ?string $eventType = null,
        ?int $limit = null,
        ?int $objectID = null,
        ObjectProperty|array|null $objectProperty = null,
        ?string $objectType = null,
        ?\DateTimeInterface $occurredAfter = null,
        ?\DateTimeInterface $occurredBefore = null,
        Property|array|null $property = null,
        ?array $sort = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $after && $self['after'] = $after;
        null !== $before && $self['before'] = $before;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $limit && $self['limit'] = $limit;
        null !== $objectID && $self['objectID'] = $objectID;
        null !== $objectProperty && $self['objectProperty'] = $objectProperty;
        null !== $objectType && $self['objectType'] = $objectType;
        null !== $occurredAfter && $self['occurredAfter'] = $occurredAfter;
        null !== $occurredBefore && $self['occurredBefore'] = $occurredBefore;
        null !== $property && $self['property'] = $property;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * ID of an event instance. IDs are 1:1 with event instances. If you provide this filter and additional filters, the other filters must match the values on the event instance to yield results.
     *
     * @param list<string> $id
     */
    public function withID(array $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    public function withBefore(string $before): self
    {
        $self = clone $this;
        $self['before'] = $before;

        return $self;
    }

    /**
     * The event type name. You can retrieve available event types using the [event types endpoint](#get-%2Fevents%2Fv3%2Fevents%2Fevent-types).
     */
    public function withEventType(string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The ID of the CRM Object to filter event instances on. When including this parameter, you must also include the `objectType` parameter.
     */
    public function withObjectID(int $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * @param ObjectProperty|array{_propname?: mixed} $objectProperty
     */
    public function withObjectProperty(
        ObjectProperty|array $objectProperty
    ): self {
        $self = clone $this;
        $self['objectProperty'] = $objectProperty;

        return $self;
    }

    /**
     * The type of CRM object to filter event instances on (e.g., `contact`). To retrieve event data for a specific CRM record, include the additional `objectId` query parameter (below).
     */
    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    /**
     * Filter for event data that occurred after a specific datetime.
     */
    public function withOccurredAfter(\DateTimeInterface $occurredAfter): self
    {
        $self = clone $this;
        $self['occurredAfter'] = $occurredAfter;

        return $self;
    }

    /**
     * Filter for event data that occurred before a specific datetime.
     */
    public function withOccurredBefore(\DateTimeInterface $occurredBefore): self
    {
        $self = clone $this;
        $self['occurredBefore'] = $occurredBefore;

        return $self;
    }

    /**
     * @param Property|array{_propname?: mixed} $property
     */
    public function withProperty(Property|array $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    /**
     * Sort direction based on the timestamp of the event instance, `ASCENDING` or `DESCENDING`.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
