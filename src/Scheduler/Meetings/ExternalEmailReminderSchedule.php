<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalReminderShape from \HubspotSDK\Scheduler\Meetings\ExternalReminder
 *
 * @phpstan-type ExternalEmailReminderScheduleShape = array{
 *   reminders: list<ExternalReminderShape>, shouldIncludeInviteDescription: bool
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
     * @param list<ExternalReminderShape> $reminders
     */
    public static function with(
        array $reminders,
        bool $shouldIncludeInviteDescription
    ): self {
        $self = new self;

        $self['reminders'] = $reminders;
        $self['shouldIncludeInviteDescription'] = $shouldIncludeInviteDescription;

        return $self;
    }

    /**
     * @param list<ExternalReminderShape> $reminders
     */
    public function withReminders(array $reminders): self
    {
        $self = clone $this;
        $self['reminders'] = $reminders;

        return $self;
    }

    public function withShouldIncludeInviteDescription(
        bool $shouldIncludeInviteDescription
    ): self {
        $self = clone $this;
        $self['shouldIncludeInviteDescription'] = $shouldIncludeInviteDescription;

        return $self;
    }
}
