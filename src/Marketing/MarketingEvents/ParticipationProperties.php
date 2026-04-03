<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\MarketingEvents\ParticipationProperties\AttendanceState;

/**
 * @phpstan-type ParticipationPropertiesShape = array{
 *   attendanceState: AttendanceState|value-of<AttendanceState>,
 *   occurredAt: int,
 *   attendanceDurationSeconds?: int|null,
 *   attendancePercentage?: string|null,
 * }
 */
final class ParticipationProperties implements BaseModel
{
    /** @use SdkModel<ParticipationPropertiesShape> */
    use SdkModel;

    /**
     * The state of the participation.
     *
     * @var value-of<AttendanceState> $attendanceState
     */
    #[Required(enum: AttendanceState::class)]
    public string $attendanceState;

    /**
     * Timestamp of when the participation occurred.
     */
    #[Required]
    public int $occurredAt;

    /**
     * The number of seconds the participation lasted.
     */
    #[Optional]
    public ?int $attendanceDurationSeconds;

    /**
     * Percentage of the participation duration relative to the event duration.
     */
    #[Optional]
    public ?string $attendancePercentage;

    /**
     * `new ParticipationProperties()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParticipationProperties::with(attendanceState: ..., occurredAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ParticipationProperties)->withAttendanceState(...)->withOccurredAt(...)
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
     * @param AttendanceState|value-of<AttendanceState> $attendanceState
     */
    public static function with(
        AttendanceState|string $attendanceState,
        int $occurredAt,
        ?int $attendanceDurationSeconds = null,
        ?string $attendancePercentage = null,
    ): self {
        $self = new self;

        $self['attendanceState'] = $attendanceState;
        $self['occurredAt'] = $occurredAt;

        null !== $attendanceDurationSeconds && $self['attendanceDurationSeconds'] = $attendanceDurationSeconds;
        null !== $attendancePercentage && $self['attendancePercentage'] = $attendancePercentage;

        return $self;
    }

    /**
     * The state of the participation.
     *
     * @param AttendanceState|value-of<AttendanceState> $attendanceState
     */
    public function withAttendanceState(
        AttendanceState|string $attendanceState
    ): self {
        $self = clone $this;
        $self['attendanceState'] = $attendanceState;

        return $self;
    }

    /**
     * Timestamp of when the participation occurred.
     */
    public function withOccurredAt(int $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * The number of seconds the participation lasted.
     */
    public function withAttendanceDurationSeconds(
        int $attendanceDurationSeconds
    ): self {
        $self = clone $this;
        $self['attendanceDurationSeconds'] = $attendanceDurationSeconds;

        return $self;
    }

    /**
     * Percentage of the participation duration relative to the event duration.
     */
    public function withAttendancePercentage(string $attendancePercentage): self
    {
        $self = clone $this;
        $self['attendancePercentage'] = $attendancePercentage;

        return $self;
    }
}
