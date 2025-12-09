<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalEmailReminderScheduleShape = array{
 *   reminders: list<ExternalReminder>, shouldIncludeInviteDescription: bool
 * }
 */
final class ExternalEmailReminderSchedule implements BaseModel
{
    /** @use SdkModel<ExternalEmailReminderScheduleShape> */
    use SdkModel;

    /** @var list<ExternalReminder> $reminders */
    #[Required(list: ExternalReminder::class)]
    public array $reminders;

    #[Required]
    public bool $shouldIncludeInviteDescription;

    /**
     * `new ExternalEmailReminderSchedule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalEmailReminderSchedule::with(
     *   reminders: ..., shouldIncludeInviteDescription: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalEmailReminderSchedule)
     *   ->withReminders(...)
     *   ->withShouldIncludeInviteDescription(...)
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
     * @param list<ExternalReminder|array{
     *   numberOfTimeUnits: int, timeUnit: string
     * }> $reminders
     */
    public static function with(
        array $reminders,
        bool $shouldIncludeInviteDescription
    ): self {
        $obj = new self;

        $obj['reminders'] = $reminders;
        $obj['shouldIncludeInviteDescription'] = $shouldIncludeInviteDescription;

        return $obj;
    }

    /**
     * @param list<ExternalReminder|array{
     *   numberOfTimeUnits: int, timeUnit: string
     * }> $reminders
     */
    public function withReminders(array $reminders): self
    {
        $obj = clone $this;
        $obj['reminders'] = $reminders;

        return $obj;
    }

    public function withShouldIncludeInviteDescription(
        bool $shouldIncludeInviteDescription
    ): self {
        $obj = clone $this;
        $obj['shouldIncludeInviteDescription'] = $shouldIncludeInviteDescription;

        return $obj;
    }
}
