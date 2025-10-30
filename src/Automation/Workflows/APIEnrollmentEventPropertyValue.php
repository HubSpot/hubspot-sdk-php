<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIEnrollmentEventPropertyValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIEnrollmentEventPropertyValueShape = array{
 *   enrollmentEventPropertyToken: string, type: value-of<Type>
 * }
 */
final class APIEnrollmentEventPropertyValue implements BaseModel
{
    /** @use SdkModel<APIEnrollmentEventPropertyValueShape> */
    use SdkModel;

    #[Api]
    public string $enrollmentEventPropertyToken;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIEnrollmentEventPropertyValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIEnrollmentEventPropertyValue::with(
     *   enrollmentEventPropertyToken: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIEnrollmentEventPropertyValue)
     *   ->withEnrollmentEventPropertyToken(...)
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
        string $enrollmentEventPropertyToken,
        Type|string $type = 'ENROLLMENT_EVENT_PROPERTY',
    ): self {
        $obj = new self;

        $obj->enrollmentEventPropertyToken = $enrollmentEventPropertyToken;
        $obj['type'] = $type;

        return $obj;
    }

    public function withEnrollmentEventPropertyToken(
        string $enrollmentEventPropertyToken
    ): self {
        $obj = clone $this;
        $obj->enrollmentEventPropertyToken = $enrollmentEventPropertyToken;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
