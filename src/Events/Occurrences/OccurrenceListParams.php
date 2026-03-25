<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Occurrences;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\Occurrences\OccurrenceListParams\ObjectProperty;
use HubspotSDK\Events\Occurrences\OccurrenceListParams\Property;

/**
 * Retrieve event occurrences for the specified time frame. This endpoint allows filtering by various parameters such as object type, event type, and occurrence time. It supports pagination and sorting of results.
 *
 * @see HubspotSDK\Services\Events\OccurrencesService::list()
 *
 * @phpstan-import-type ObjectPropertyShape from \HubspotSDK\Events\Occurrences\OccurrenceListParams\ObjectProperty
 * @phpstan-import-type PropertyShape from \HubspotSDK\Events\Occurrences\OccurrenceListParams\Property
 *
 * @phpstan-type OccurrenceListParamsShape = array{
 *   id?: list<string>|null,
 *   after?: string|null,
 *   before?: string|null,
 *   eventType?: string|null,
 *   limit?: int|null,
 *   objectID?: int|null,
 *   objectProperty?: null|ObjectProperty|ObjectPropertyShape,
 *   objectType?: string|null,
 *   occurredAfter?: \DateTimeInterface|null,
 *   occurredBefore?: \DateTimeInterface|null,
 *   properties?: list<string>|null,
 *   property?: null|Property|PropertyShape,
 *   sort?: list<string>|null,
 * }
 */
final class OccurrenceListParams implements BaseModel
{
    /** @use SdkModel<OccurrenceListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * An array of event IDs to filter by.
     *
     * @var list<string>|null $id
     */
    #[Optional(list: 'string')]
    public ?array $id;

    /**
     * A cursor token for pagination. Use the value from the previous response's paging.next.after field.
     */
    #[Optional]
    public ?string $after;

    /**
     * A cursor token to retrieve results before a specific point.
     */
    #[Optional]
    public ?string $before;

    /**
     * The type of event to filter by.
     */
    #[Optional]
    public ?string $eventType;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The unique identifier of the object associated with the events.
     */
    #[Optional]
    public ?int $objectID;

    #[Optional]
    public ?ObjectProperty $objectProperty;

    /**
     * The type of object associated with the events.
     */
    #[Optional]
    public ?string $objectType;

    /**
     * Filter events that occurred after this date-time.
     */
    #[Optional]
    public ?\DateTimeInterface $occurredAfter;

    /**
     * Filter events that occurred before this date-time.
     */
    #[Optional]
    public ?\DateTimeInterface $occurredBefore;

    /**
     * An array of property names to include in the response.
     *
     * @var list<string>|null $properties
     */
    #[Optional(list: 'string')]
    public ?array $properties;

    #[Optional]
    public ?Property $property;

    /**
     * An array of fields to sort the results by.
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
     * @param list<string>|null $id
     * @param ObjectProperty|ObjectPropertyShape|null $objectProperty
     * @param list<string>|null $properties
     * @param Property|PropertyShape|null $property
     * @param list<string>|null $sort
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
        ?array $properties = null,
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
        null !== $properties && $self['properties'] = $properties;
        null !== $property && $self['property'] = $property;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * An array of event IDs to filter by.
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
     * A cursor token for pagination. Use the value from the previous response's paging.next.after field.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * A cursor token to retrieve results before a specific point.
     */
    public function withBefore(string $before): self
    {
        $self = clone $this;
        $self['before'] = $before;

        return $self;
    }

    /**
     * The type of event to filter by.
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
     * The unique identifier of the object associated with the events.
     */
    public function withObjectID(int $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * @param ObjectProperty|ObjectPropertyShape $objectProperty
     */
    public function withObjectProperty(
        ObjectProperty|array $objectProperty
    ): self {
        $self = clone $this;
        $self['objectProperty'] = $objectProperty;

        return $self;
    }

    /**
     * The type of object associated with the events.
     */
    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    /**
     * Filter events that occurred after this date-time.
     */
    public function withOccurredAfter(\DateTimeInterface $occurredAfter): self
    {
        $self = clone $this;
        $self['occurredAfter'] = $occurredAfter;

        return $self;
    }

    /**
     * Filter events that occurred before this date-time.
     */
    public function withOccurredBefore(\DateTimeInterface $occurredBefore): self
    {
        $self = clone $this;
        $self['occurredBefore'] = $occurredBefore;

        return $self;
    }

    /**
     * An array of property names to include in the response.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param Property|PropertyShape $property
     */
    public function withProperty(Property|array $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    /**
     * An array of fields to sort the results by.
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
