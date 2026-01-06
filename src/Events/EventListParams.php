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
 *   objectProperty?: ObjectProperty|array{propname?: mixed},
 *   objectType?: string,
 *   occurredAfter?: \DateTimeInterface,
 *   occurredBefore?: \DateTimeInterface,
 *   property?: Property|array{propname?: mixed},
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
     * @param ObjectProperty|array{propname?: mixed} $objectProperty
     * @param Property|array{propname?: mixed} $property
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $after && $obj['after'] = $after;
        null !== $before && $obj['before'] = $before;
        null !== $eventType && $obj['eventType'] = $eventType;
        null !== $limit && $obj['limit'] = $limit;
        null !== $objectID && $obj['objectID'] = $objectID;
        null !== $objectProperty && $obj['objectProperty'] = $objectProperty;
        null !== $objectType && $obj['objectType'] = $objectType;
        null !== $occurredAfter && $obj['occurredAfter'] = $occurredAfter;
        null !== $occurredBefore && $obj['occurredBefore'] = $occurredBefore;
        null !== $property && $obj['property'] = $property;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * ID of an event instance. IDs are 1:1 with event instances. If you provide this filter and additional filters, the other filters must match the values on the event instance to yield results.
     *
     * @param list<string> $id
     */
    public function withID(array $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    public function withBefore(string $before): self
    {
        $obj = clone $this;
        $obj['before'] = $before;

        return $obj;
    }

    /**
     * The event type name. You can retrieve available event types using the [event types endpoint](#get-%2Fevents%2Fv3%2Fevents%2Fevent-types).
     */
    public function withEventType(string $eventType): self
    {
        $obj = clone $this;
        $obj['eventType'] = $eventType;

        return $obj;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * The ID of the CRM Object to filter event instances on. When including this parameter, you must also include the `objectType` parameter.
     */
    public function withObjectID(int $objectID): self
    {
        $obj = clone $this;
        $obj['objectID'] = $objectID;

        return $obj;
    }

    /**
     * @param ObjectProperty|array{propname?: mixed} $objectProperty
     */
    public function withObjectProperty(
        ObjectProperty|array $objectProperty
    ): self {
        $obj = clone $this;
        $obj['objectProperty'] = $objectProperty;

        return $obj;
    }

    /**
     * The type of CRM object to filter event instances on (e.g., `contact`). To retrieve event data for a specific CRM record, include the additional `objectId` query parameter (below).
     */
    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj['objectType'] = $objectType;

        return $obj;
    }

    /**
     * Filter for event data that occurred after a specific datetime.
     */
    public function withOccurredAfter(\DateTimeInterface $occurredAfter): self
    {
        $obj = clone $this;
        $obj['occurredAfter'] = $occurredAfter;

        return $obj;
    }

    /**
     * Filter for event data that occurred before a specific datetime.
     */
    public function withOccurredBefore(\DateTimeInterface $occurredBefore): self
    {
        $obj = clone $this;
        $obj['occurredBefore'] = $occurredBefore;

        return $obj;
    }

    /**
     * @param Property|array{propname?: mixed} $property
     */
    public function withProperty(Property|array $property): self
    {
        $obj = clone $this;
        $obj['property'] = $property;

        return $obj;
    }

    /**
     * Sort direction based on the timestamp of the event instance, `ASCENDING` or `DESCENDING`.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }
}
