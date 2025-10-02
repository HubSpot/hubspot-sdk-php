<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIManualEnrollmentCriteria\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_manual_enrollment_criteria = array{
 *   shouldReEnroll: bool, type: value-of<Type>
 * }
 */
final class AutomationAPIManualEnrollmentCriteria implements BaseModel
{
    /** @use SdkModel<automation_api_manual_enrollment_criteria> */
    use SdkModel;

    #[Api]
    public bool $shouldReEnroll;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationAPIManualEnrollmentCriteria()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIManualEnrollmentCriteria::with(shouldReEnroll: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIManualEnrollmentCriteria)
     *   ->withShouldReEnroll(...)
     *   ->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        bool $shouldReEnroll,
        Type|string $type = 'MANUAL'
    ): self {
        $obj = new self;

        $obj->shouldReEnroll = $shouldReEnroll;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withShouldReEnroll(bool $shouldReEnroll): self
    {
        $obj = clone $this;
        $obj->shouldReEnroll = $shouldReEnroll;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }
}
