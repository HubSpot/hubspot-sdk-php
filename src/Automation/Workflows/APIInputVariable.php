<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIActionDataValue\Type;
use HubspotSDK\Automation\Workflows\APITimestampValue\TimestampType;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIInputVariableShape = array{
 *   name: string,
 *   value: APIActionDataValue|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue,
 * }
 */
final class APIInputVariable implements BaseModel
{
    /** @use SdkModel<APIInputVariableShape> */
    use SdkModel;

    #[Required]
    public string $name;

    #[Required]
    public APIActionDataValue|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue $value;

    /**
     * `new APIInputVariable()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIInputVariable::with(name: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIInputVariable)->withName(...)->withValue(...)
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
     * @param APIActionDataValue|array{
     *   actionId: string, dataKey: string, type: value-of<Type>
     * }|APIObjectPropertyValue|array{
     *   propertyName: string,
     *   type: value-of<APIObjectPropertyValue\Type>,
     * }|APIStaticValue|array{
     *   staticValue: string,
     *   type: value-of<APIStaticValue\Type>,
     * }|APIRelativeDateTimeValue|array{
     *   timeDelay: APITimeDelay,
     *   type: value-of<APIRelativeDateTimeValue\Type>,
     * }|APITimestampValue|array{
     *   timestampType: value-of<TimestampType>,
     *   type: value-of<APITimestampValue\Type>,
     * }|APIIncrementValue|array{
     *   incrementAmount: float,
     *   type: value-of<APIIncrementValue\Type>,
     * }|APIFetchedObjectPropertyValue|array{
     *   propertyToken: string,
     *   type: value-of<APIFetchedObjectPropertyValue\Type>,
     * }|APIAppendObjectPropertyValue|array{
     *   appendPropertyName: string,
     *   type: value-of<APIAppendObjectPropertyValue\Type>,
     * }|APIStaticAppendValue|array{
     *   staticAppendValue: string,
     *   type: value-of<APIStaticAppendValue\Type>,
     * }|APIEnrollmentEventPropertyValue|array{
     *   enrollmentEventPropertyToken: string,
     *   type: value-of<APIEnrollmentEventPropertyValue\Type>,
     * } $value
     */
    public static function with(
        string $name,
        APIActionDataValue|array|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue $value,
    ): self {
        $obj = new self;

        $obj['name'] = $name;
        $obj['value'] = $value;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * @param APIActionDataValue|array{
     *   actionId: string, dataKey: string, type: value-of<Type>
     * }|APIObjectPropertyValue|array{
     *   propertyName: string,
     *   type: value-of<APIObjectPropertyValue\Type>,
     * }|APIStaticValue|array{
     *   staticValue: string,
     *   type: value-of<APIStaticValue\Type>,
     * }|APIRelativeDateTimeValue|array{
     *   timeDelay: APITimeDelay,
     *   type: value-of<APIRelativeDateTimeValue\Type>,
     * }|APITimestampValue|array{
     *   timestampType: value-of<TimestampType>,
     *   type: value-of<APITimestampValue\Type>,
     * }|APIIncrementValue|array{
     *   incrementAmount: float,
     *   type: value-of<APIIncrementValue\Type>,
     * }|APIFetchedObjectPropertyValue|array{
     *   propertyToken: string,
     *   type: value-of<APIFetchedObjectPropertyValue\Type>,
     * }|APIAppendObjectPropertyValue|array{
     *   appendPropertyName: string,
     *   type: value-of<APIAppendObjectPropertyValue\Type>,
     * }|APIStaticAppendValue|array{
     *   staticAppendValue: string,
     *   type: value-of<APIStaticAppendValue\Type>,
     * }|APIEnrollmentEventPropertyValue|array{
     *   enrollmentEventPropertyToken: string,
     *   type: value-of<APIEnrollmentEventPropertyValue\Type>,
     * } $value
     */
    public function withValue(
        APIActionDataValue|array|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue $value,
    ): self {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }
}
