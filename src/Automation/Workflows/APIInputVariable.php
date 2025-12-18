<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ValueShape from \HubspotSDK\Automation\Workflows\APIInputVariable\Value
 *
 * @phpstan-type APIInputVariableShape = array{name: string, value: ValueShape}
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
     * @param ValueShape $value
     */
    public static function with(
        string $name,
        APIActionDataValue|array|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue $value,
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['value'] = $value;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param ValueShape $value
     */
    public function withValue(
        APIActionDataValue|array|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue $value,
    ): self {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
