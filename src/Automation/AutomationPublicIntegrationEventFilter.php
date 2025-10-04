<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicIntegrationEventFilter\FilterType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_integration_event_filter = array{
 *   eventTypeID: int,
 *   filterLines: list<AutomationPublicEventFilterMetadata>,
 *   filterType: value-of<FilterType>,
 * }
 */
final class AutomationPublicIntegrationEventFilter implements BaseModel
{
    /** @use SdkModel<automation_public_integration_event_filter> */
    use SdkModel;

    #[Api('eventTypeId')]
    public int $eventTypeID;

    /** @var list<AutomationPublicEventFilterMetadata> $filterLines */
    #[Api(list: AutomationPublicEventFilterMetadata::class)]
    public array $filterLines;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    /**
     * `new AutomationPublicIntegrationEventFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicIntegrationEventFilter::with(
     *   eventTypeID: ..., filterLines: ..., filterType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicIntegrationEventFilter)
     *   ->withEventTypeID(...)
     *   ->withFilterLines(...)
     *   ->withFilterType(...)
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
     * @param list<AutomationPublicEventFilterMetadata> $filterLines
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        int $eventTypeID,
        array $filterLines,
        FilterType|string $filterType = 'INTEGRATION_EVENT',
    ): self {
        $obj = new self;

        $obj->eventTypeID = $eventTypeID;
        $obj->filterLines = $filterLines;
        $obj['filterType'] = $filterType;

        return $obj;
    }

    public function withEventTypeID(int $eventTypeID): self
    {
        $obj = clone $this;
        $obj->eventTypeID = $eventTypeID;

        return $obj;
    }

    /**
     * @param list<AutomationPublicEventFilterMetadata> $filterLines
     */
    public function withFilterLines(array $filterLines): self
    {
        $obj = clone $this;
        $obj->filterLines = $filterLines;

        return $obj;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $obj = clone $this;
        $obj['filterType'] = $filterType;

        return $obj;
    }
}
