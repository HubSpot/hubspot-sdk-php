<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\PropertyFilter\FilterType;

/**
 * @phpstan-type ComboEventRuleShape = array{
 *   count: int,
 *   eventTypeID: string,
 *   propertyFilters: list<PropertyFilter>,
 *   lookbackWindowDays?: int|null,
 * }
 */
final class ComboEventRule implements BaseModel
{
    /** @use SdkModel<ComboEventRuleShape> */
    use SdkModel;

    #[Required]
    public int $count;

    #[Required('eventTypeId')]
    public string $eventTypeID;

    /** @var list<PropertyFilter> $propertyFilters */
    #[Required(list: PropertyFilter::class)]
    public array $propertyFilters;

    #[Optional]
    public ?int $lookbackWindowDays;

    /**
     * `new ComboEventRule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ComboEventRule::with(count: ..., eventTypeID: ..., propertyFilters: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ComboEventRule)
     *   ->withCount(...)
     *   ->withEventTypeID(...)
     *   ->withPropertyFilters(...)
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
     * @param list<PropertyFilter|array{
     *   filterType: value-of<FilterType>,
     *   operation: BoolPropertyOperation|NumberPropertyOperation|StringPropertyOperation|DateTimePropertyOperation|RangedDatePropertyOperation|ComparativeDatePropertyOperation|ComparativePropertyUpdatedOperation|RollingDateRangePropertyOperation|RollingPropertyUpdatedOperation|EnumerationPropertyOperation|AllPropertyTypesOperation|RangedNumberPropertyOperation|MultiStringPropertyOperation|DatePropertyOperation|CalendarDatePropertyOperation|TimePointOperation|RangedTimeOperation,
     *   property: string,
     *   frameworkFilterID?: int|null,
     * }> $propertyFilters
     */
    public static function with(
        int $count,
        string $eventTypeID,
        array $propertyFilters,
        ?int $lookbackWindowDays = null,
    ): self {
        $self = new self;

        $self['count'] = $count;
        $self['eventTypeID'] = $eventTypeID;
        $self['propertyFilters'] = $propertyFilters;

        null !== $lookbackWindowDays && $self['lookbackWindowDays'] = $lookbackWindowDays;

        return $self;
    }

    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    public function withEventTypeID(string $eventTypeID): self
    {
        $self = clone $this;
        $self['eventTypeID'] = $eventTypeID;

        return $self;
    }

    /**
     * @param list<PropertyFilter|array{
     *   filterType: value-of<FilterType>,
     *   operation: BoolPropertyOperation|NumberPropertyOperation|StringPropertyOperation|DateTimePropertyOperation|RangedDatePropertyOperation|ComparativeDatePropertyOperation|ComparativePropertyUpdatedOperation|RollingDateRangePropertyOperation|RollingPropertyUpdatedOperation|EnumerationPropertyOperation|AllPropertyTypesOperation|RangedNumberPropertyOperation|MultiStringPropertyOperation|DatePropertyOperation|CalendarDatePropertyOperation|TimePointOperation|RangedTimeOperation,
     *   property: string,
     *   frameworkFilterID?: int|null,
     * }> $propertyFilters
     */
    public function withPropertyFilters(array $propertyFilters): self
    {
        $self = clone $this;
        $self['propertyFilters'] = $propertyFilters;

        return $self;
    }

    public function withLookbackWindowDays(int $lookbackWindowDays): self
    {
        $self = clone $this;
        $self['lookbackWindowDays'] = $lookbackWindowDays;

        return $self;
    }
}
