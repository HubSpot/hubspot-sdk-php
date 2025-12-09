<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIPropertyBasedEnrollmentSchedule\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIPropertyBasedEnrollmentScheduleShape = array{
 *   dateProperty: string,
 *   daysDelta: int,
 *   timeOfDay: APITimeOfDay,
 *   type: value-of<Type>,
 *   yearly: bool,
 * }
 */
final class APIPropertyBasedEnrollmentSchedule implements BaseModel
{
    /** @use SdkModel<APIPropertyBasedEnrollmentScheduleShape> */
    use SdkModel;

    #[Required]
    public string $dateProperty;

    #[Required]
    public int $daysDelta;

    #[Required]
    public APITimeOfDay $timeOfDay;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Required]
    public bool $yearly;

    /**
     * `new APIPropertyBasedEnrollmentSchedule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIPropertyBasedEnrollmentSchedule::with(
     *   dateProperty: ..., daysDelta: ..., timeOfDay: ..., type: ..., yearly: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIPropertyBasedEnrollmentSchedule)
     *   ->withDateProperty(...)
     *   ->withDaysDelta(...)
     *   ->withTimeOfDay(...)
     *   ->withType(...)
     *   ->withYearly(...)
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
     * @param APITimeOfDay|array{hour: int, minute: int} $timeOfDay
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $dateProperty,
        int $daysDelta,
        APITimeOfDay|array $timeOfDay,
        bool $yearly,
        Type|string $type = 'PROPERTY_BASED',
    ): self {
        $self = new self;

        $self['dateProperty'] = $dateProperty;
        $self['daysDelta'] = $daysDelta;
        $self['timeOfDay'] = $timeOfDay;
        $self['type'] = $type;
        $self['yearly'] = $yearly;

        return $self;
    }

    public function withDateProperty(string $dateProperty): self
    {
        $self = clone $this;
        $self['dateProperty'] = $dateProperty;

        return $self;
    }

    public function withDaysDelta(int $daysDelta): self
    {
        $self = clone $this;
        $self['daysDelta'] = $daysDelta;

        return $self;
    }

    /**
     * @param APITimeOfDay|array{hour: int, minute: int} $timeOfDay
     */
    public function withTimeOfDay(APITimeOfDay|array $timeOfDay): self
    {
        $self = clone $this;
        $self['timeOfDay'] = $timeOfDay;

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

    public function withYearly(bool $yearly): self
    {
        $self = clone $this;
        $self['yearly'] = $yearly;

        return $self;
    }
}
