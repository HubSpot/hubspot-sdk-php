<?php

declare(strict_types=1);

namespace HubspotSDK\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventListParams\ObjectProperty;
use HubspotSDK\Events\EventListParams\Property;

/**
 * Retrieve instances of event completion data. For example, retrieve all event completions associated with a specific contact.
 *
 * @see HubspotSDK\Events->list
 *
 * @phpstan-type event_list_params = array{
 *   id?: list<string>,
 *   after?: string,
 *   before?: string,
 *   eventType?: string,
 *   limit?: int,
 *   objectID?: int,
 *   objectProperty?: ObjectProperty,
 *   objectType?: string,
 *   occurredAfter?: \DateTimeInterface,
 *   occurredBefore?: \DateTimeInterface,
 *   property?: Property,
 *   sort?: list<string>,
 * }
 */
final class EventListParams implements BaseModel
{
    /** @use SdkModel<event_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of an event instance. IDs are 1:1 with event instances. If you provide this filter and additional filters, the other filters must match the values on the event instance to yield results.
     *
     * @var list<string>|null $id
     */
    #[Api(list: 'string', optional: true)]
    public ?array $id;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Pagination cursor for backward navigation. Retrieves events occurring before the specified cursor position. Note: Currently only forward pagination with after is supported.
     */
    #[Api(optional: true)]
    public ?string $before;

    /**
     * The event type name. You can retrieve available event types using the [event types endpoint](#get-%2Fevents%2Fv3%2Fevents%2Fevent-types).
     */
    #[Api(optional: true)]
    public ?string $eventType;

    /**
     * The maximum number of results to display per page.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * The ID of the CRM Object to filter event instances on. When including this parameter, you must also include the `objectType` parameter.
     */
    #[Api(optional: true)]
    public ?int $objectID;

    #[Api(optional: true)]
    public ?ObjectProperty $objectProperty;

    /**
     * The type of CRM object to filter event instances on (e.g., `contact`). To retrieve event data for a specific CRM record, include the additional `objectId` query parameter (below).
     */
    #[Api(optional: true)]
    public ?string $objectType;

    /**
     * Filter for event data that occurred after a specific datetime.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $occurredAfter;

    /**
     * Filter for event data that occurred before a specific datetime.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $occurredBefore;

    #[Api(optional: true)]
    public ?Property $property;

    /**
     * Sort direction based on the timestamp of the event instance, `ASCENDING` or `DESCENDING`.
     *
     * @var list<string>|null $sort
     */
    #[Api(list: 'string', optional: true)]
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
     * @param list<string> $sort
     */
    public static function with(
        ?array $id = null,
        ?string $after = null,
        ?string $before = null,
        ?string $eventType = null,
        ?int $limit = null,
        ?int $objectID = null,
        ?ObjectProperty $objectProperty = null,
        ?string $objectType = null,
        ?\DateTimeInterface $occurredAfter = null,
        ?\DateTimeInterface $occurredBefore = null,
        ?Property $property = null,
        ?array $sort = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $after && $obj->after = $after;
        null !== $before && $obj->before = $before;
        null !== $eventType && $obj->eventType = $eventType;
        null !== $limit && $obj->limit = $limit;
        null !== $objectID && $obj->objectID = $objectID;
        null !== $objectProperty && $obj->objectProperty = $objectProperty;
        null !== $objectType && $obj->objectType = $objectType;
        null !== $occurredAfter && $obj->occurredAfter = $occurredAfter;
        null !== $occurredBefore && $obj->occurredBefore = $occurredBefore;
        null !== $property && $obj->property = $property;
        null !== $sort && $obj->sort = $sort;

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
        $obj->id = $id;

        return $obj;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * Pagination cursor for backward navigation. Retrieves events occurring before the specified cursor position. Note: Currently only forward pagination with after is supported.
     */
    public function withBefore(string $before): self
    {
        $obj = clone $this;
        $obj->before = $before;

        return $obj;
    }

    /**
     * The event type name. You can retrieve available event types using the [event types endpoint](#get-%2Fevents%2Fv3%2Fevents%2Fevent-types).
     */
    public function withEventType(string $eventType): self
    {
        $obj = clone $this;
        $obj->eventType = $eventType;

        return $obj;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * The ID of the CRM Object to filter event instances on. When including this parameter, you must also include the `objectType` parameter.
     */
    public function withObjectID(int $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }

    public function withObjectProperty(ObjectProperty $objectProperty): self
    {
        $obj = clone $this;
        $obj->objectProperty = $objectProperty;

        return $obj;
    }

    /**
     * The type of CRM object to filter event instances on (e.g., `contact`). To retrieve event data for a specific CRM record, include the additional `objectId` query parameter (below).
     */
    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }

    /**
     * Filter for event data that occurred after a specific datetime.
     */
    public function withOccurredAfter(\DateTimeInterface $occurredAfter): self
    {
        $obj = clone $this;
        $obj->occurredAfter = $occurredAfter;

        return $obj;
    }

    /**
     * Filter for event data that occurred before a specific datetime.
     */
    public function withOccurredBefore(\DateTimeInterface $occurredBefore): self
    {
        $obj = clone $this;
        $obj->occurredBefore = $occurredBefore;

        return $obj;
    }

    public function withProperty(Property $property): self
    {
        $obj = clone $this;
        $obj->property = $property;

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
        $obj->sort = $sort;

        return $obj;
    }
}
