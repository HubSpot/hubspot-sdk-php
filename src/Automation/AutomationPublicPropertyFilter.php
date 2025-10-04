<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicPropertyFilter\FilterType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_property_filter = array{
 *   filterType: value-of<FilterType>,
 *   operation: AutomationPublicBoolPropertyOperation|AutomationPublicNumberPropertyOperation|AutomationPublicStringPropertyOperation|AutomationPublicDateTimePropertyOperation|AutomationPublicRangedDatePropertyOperation|AutomationPublicComparativePropertyUpdatedOperation|AutomationPublicComparativeDatePropertyOperation|AutomationPublicRollingDateRangePropertyOperation|AutomationPublicRollingPropertyUpdatedOperation|AutomationPublicEnumerationPropertyOperation|AutomationPublicAllPropertyTypesOperation|AutomationPublicRangedNumberPropertyOperation|AutomationPublicMultiStringPropertyOperation|AutomationPublicDatePropertyOperation|AutomationPublicCalendarDatePropertyOperation|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation,
 *   property: string,
 * }
 */
final class AutomationPublicPropertyFilter implements BaseModel
{
    /** @use SdkModel<automation_public_property_filter> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api]
    public AutomationPublicBoolPropertyOperation|AutomationPublicNumberPropertyOperation|AutomationPublicStringPropertyOperation|AutomationPublicDateTimePropertyOperation|AutomationPublicRangedDatePropertyOperation|AutomationPublicComparativePropertyUpdatedOperation|AutomationPublicComparativeDatePropertyOperation|AutomationPublicRollingDateRangePropertyOperation|AutomationPublicRollingPropertyUpdatedOperation|AutomationPublicEnumerationPropertyOperation|AutomationPublicAllPropertyTypesOperation|AutomationPublicRangedNumberPropertyOperation|AutomationPublicMultiStringPropertyOperation|AutomationPublicDatePropertyOperation|AutomationPublicCalendarDatePropertyOperation|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation $operation;

    #[Api]
    public string $property;

    /**
     * `new AutomationPublicPropertyFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicPropertyFilter::with(
     *   filterType: ..., operation: ..., property: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicPropertyFilter)
     *   ->withFilterType(...)
     *   ->withOperation(...)
     *   ->withProperty(...)
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
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        AutomationPublicBoolPropertyOperation|AutomationPublicNumberPropertyOperation|AutomationPublicStringPropertyOperation|AutomationPublicDateTimePropertyOperation|AutomationPublicRangedDatePropertyOperation|AutomationPublicComparativePropertyUpdatedOperation|AutomationPublicComparativeDatePropertyOperation|AutomationPublicRollingDateRangePropertyOperation|AutomationPublicRollingPropertyUpdatedOperation|AutomationPublicEnumerationPropertyOperation|AutomationPublicAllPropertyTypesOperation|AutomationPublicRangedNumberPropertyOperation|AutomationPublicMultiStringPropertyOperation|AutomationPublicDatePropertyOperation|AutomationPublicCalendarDatePropertyOperation|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation $operation,
        string $property,
        FilterType|string $filterType = 'PROPERTY',
    ): self {
        $obj = new self;

        $obj['filterType'] = $filterType;
        $obj->operation = $operation;
        $obj->property = $property;

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

    public function withOperation(
        AutomationPublicBoolPropertyOperation|AutomationPublicNumberPropertyOperation|AutomationPublicStringPropertyOperation|AutomationPublicDateTimePropertyOperation|AutomationPublicRangedDatePropertyOperation|AutomationPublicComparativePropertyUpdatedOperation|AutomationPublicComparativeDatePropertyOperation|AutomationPublicRollingDateRangePropertyOperation|AutomationPublicRollingPropertyUpdatedOperation|AutomationPublicEnumerationPropertyOperation|AutomationPublicAllPropertyTypesOperation|AutomationPublicRangedNumberPropertyOperation|AutomationPublicMultiStringPropertyOperation|AutomationPublicDatePropertyOperation|AutomationPublicCalendarDatePropertyOperation|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation $operation,
    ): self {
        $obj = clone $this;
        $obj->operation = $operation;

        return $obj;
    }

    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj->property = $property;

        return $obj;
    }
}
