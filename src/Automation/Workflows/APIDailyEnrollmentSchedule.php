<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIDailyEnrollmentSchedule\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type APITimeOfDayShape from \HubspotSDK\Automation\Workflows\APITimeOfDay
 *
 * @phpstan-type APIDailyEnrollmentScheduleShape = array{
 *   timeOfDay: APITimeOfDay|APITimeOfDayShape, type: Type|value-of<Type>
 * }
 */
final class APIDailyEnrollmentSchedule implements BaseModel
{
    /** @use SdkModel<APIDailyEnrollmentScheduleShape> */
    use SdkModel;

    #[Required]
    public APITimeOfDay $timeOfDay;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new APIDailyEnrollmentSchedule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIDailyEnrollmentSchedule::with(timeOfDay: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIDailyEnrollmentSchedule)->withTimeOfDay(...)->withType(...)
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
     * @param APITimeOfDay|APITimeOfDayShape $timeOfDay
     * @param Type|value-of<Type> $type
     */
    public static function with(
        APITimeOfDay|array $timeOfDay,
        Type|string $type = 'DAILY'
    ): self {
        $self = new self;

        $self['timeOfDay'] = $timeOfDay;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param APITimeOfDay|APITimeOfDayShape $timeOfDay
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
}
