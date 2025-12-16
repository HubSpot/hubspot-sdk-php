<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIManualEnrollmentCriteria\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIManualEnrollmentCriteriaShape = array{
 *   shouldReEnroll: bool, type: Type|value-of<Type>
 * }
 */
final class APIManualEnrollmentCriteria implements BaseModel
{
    /** @use SdkModel<APIManualEnrollmentCriteriaShape> */
    use SdkModel;

    #[Required]
    public bool $shouldReEnroll;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new APIManualEnrollmentCriteria()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIManualEnrollmentCriteria::with(shouldReEnroll: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIManualEnrollmentCriteria)->withShouldReEnroll(...)->withType(...)
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
        $self = new self;

        $self['shouldReEnroll'] = $shouldReEnroll;
        $self['type'] = $type;

        return $self;
    }

    public function withShouldReEnroll(bool $shouldReEnroll): self
    {
        $self = clone $this;
        $self['shouldReEnroll'] = $shouldReEnroll;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
