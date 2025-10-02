<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_event_filter_metadata = array{
 *   operation: AutomationPublicBoolPropertyOperation|AutomationPublicNumberPropertyOperation|AutomationPublicStringPropertyOperation|AutomationPublicDateTimePropertyOperation|AutomationPublicRangedDatePropertyOperation|AutomationPublicComparativePropertyUpdatedOperation|AutomationPublicComparativeDatePropertyOperation|AutomationPublicRollingDateRangePropertyOperation|AutomationPublicRollingPropertyUpdatedOperation|AutomationPublicEnumerationPropertyOperation|AutomationPublicAllPropertyTypesOperation|AutomationPublicRangedNumberPropertyOperation|AutomationPublicMultiStringPropertyOperation|AutomationPublicDatePropertyOperation|AutomationPublicCalendarDatePropertyOperation|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation,
 *   property: string,
 * }
 */
final class AutomationPublicEventFilterMetadata implements BaseModel
{
    /** @use SdkModel<automation_public_event_filter_metadata> */
    use SdkModel;

    #[Api]
    public AutomationPublicBoolPropertyOperation|AutomationPublicNumberPropertyOperation|AutomationPublicStringPropertyOperation|AutomationPublicDateTimePropertyOperation|AutomationPublicRangedDatePropertyOperation|AutomationPublicComparativePropertyUpdatedOperation|AutomationPublicComparativeDatePropertyOperation|AutomationPublicRollingDateRangePropertyOperation|AutomationPublicRollingPropertyUpdatedOperation|AutomationPublicEnumerationPropertyOperation|AutomationPublicAllPropertyTypesOperation|AutomationPublicRangedNumberPropertyOperation|AutomationPublicMultiStringPropertyOperation|AutomationPublicDatePropertyOperation|AutomationPublicCalendarDatePropertyOperation|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation $operation;

    #[Api]
    public string $property;

    /**
     * `new AutomationPublicEventFilterMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicEventFilterMetadata::with(operation: ..., property: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicEventFilterMetadata)->withOperation(...)->withProperty(...)
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
     */
    public static function with(
        AutomationPublicBoolPropertyOperation|AutomationPublicNumberPropertyOperation|AutomationPublicStringPropertyOperation|AutomationPublicDateTimePropertyOperation|AutomationPublicRangedDatePropertyOperation|AutomationPublicComparativePropertyUpdatedOperation|AutomationPublicComparativeDatePropertyOperation|AutomationPublicRollingDateRangePropertyOperation|AutomationPublicRollingPropertyUpdatedOperation|AutomationPublicEnumerationPropertyOperation|AutomationPublicAllPropertyTypesOperation|AutomationPublicRangedNumberPropertyOperation|AutomationPublicMultiStringPropertyOperation|AutomationPublicDatePropertyOperation|AutomationPublicCalendarDatePropertyOperation|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation $operation,
        string $property,
    ): self {
        $obj = new self;

        $obj->operation = $operation;
        $obj->property = $property;

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
