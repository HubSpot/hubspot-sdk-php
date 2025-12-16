<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type UnenrollmentSettingsResponseShape from \HubspotSDK\Automation\Sequences\UnenrollmentSettingsResponse
 *
 * @phpstan-type PublicSequenceSettingsResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   eligibleFollowUpDays: string,
 *   individualTaskRemindersEnabled: bool,
 *   sellingStrategy: string,
 *   sendWindowEndMinute: int,
 *   sendWindowStartMinute: int,
 *   taskReminderMinute: int,
 *   updatedAt: \DateTimeInterface,
 *   unenrollmentSettings?: null|UnenrollmentSettingsResponse|UnenrollmentSettingsResponseShape,
 * }
 */
final class PublicSequenceSettingsResponse implements BaseModel
{
    /** @use SdkModel<PublicSequenceSettingsResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $eligibleFollowUpDays;

    #[Required]
    public bool $individualTaskRemindersEnabled;

    #[Required]
    public string $sellingStrategy;

    #[Required]
    public int $sendWindowEndMinute;

    #[Required]
    public int $sendWindowStartMinute;

    #[Required]
    public int $taskReminderMinute;

    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Optional]
    public ?UnenrollmentSettingsResponse $unenrollmentSettings;

    /**
     * `new PublicSequenceSettingsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSequenceSettingsResponse::with(
     *   id: ...,
     *   createdAt: ...,
     *   eligibleFollowUpDays: ...,
     *   individualTaskRemindersEnabled: ...,
     *   sellingStrategy: ...,
     *   sendWindowEndMinute: ...,
     *   sendWindowStartMinute: ...,
     *   taskReminderMinute: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSequenceSettingsResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withEligibleFollowUpDays(...)
     *   ->withIndividualTaskRemindersEnabled(...)
     *   ->withSellingStrategy(...)
     *   ->withSendWindowEndMinute(...)
     *   ->withSendWindowStartMinute(...)
     *   ->withTaskReminderMinute(...)
     *   ->withUpdatedAt(...)
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
     * @param UnenrollmentSettingsResponseShape $unenrollmentSettings
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $eligibleFollowUpDays,
        bool $individualTaskRemindersEnabled,
        string $sellingStrategy,
        int $sendWindowEndMinute,
        int $sendWindowStartMinute,
        int $taskReminderMinute,
        \DateTimeInterface $updatedAt,
        UnenrollmentSettingsResponse|array|null $unenrollmentSettings = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['eligibleFollowUpDays'] = $eligibleFollowUpDays;
        $self['individualTaskRemindersEnabled'] = $individualTaskRemindersEnabled;
        $self['sellingStrategy'] = $sellingStrategy;
        $self['sendWindowEndMinute'] = $sendWindowEndMinute;
        $self['sendWindowStartMinute'] = $sendWindowStartMinute;
        $self['taskReminderMinute'] = $taskReminderMinute;
        $self['updatedAt'] = $updatedAt;

        null !== $unenrollmentSettings && $self['unenrollmentSettings'] = $unenrollmentSettings;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withEligibleFollowUpDays(string $eligibleFollowUpDays): self
    {
        $self = clone $this;
        $self['eligibleFollowUpDays'] = $eligibleFollowUpDays;

        return $self;
    }

    public function withIndividualTaskRemindersEnabled(
        bool $individualTaskRemindersEnabled
    ): self {
        $self = clone $this;
        $self['individualTaskRemindersEnabled'] = $individualTaskRemindersEnabled;

        return $self;
    }

    public function withSellingStrategy(string $sellingStrategy): self
    {
        $self = clone $this;
        $self['sellingStrategy'] = $sellingStrategy;

        return $self;
    }

    public function withSendWindowEndMinute(int $sendWindowEndMinute): self
    {
        $self = clone $this;
        $self['sendWindowEndMinute'] = $sendWindowEndMinute;

        return $self;
    }

    public function withSendWindowStartMinute(int $sendWindowStartMinute): self
    {
        $self = clone $this;
        $self['sendWindowStartMinute'] = $sendWindowStartMinute;

        return $self;
    }

    public function withTaskReminderMinute(int $taskReminderMinute): self
    {
        $self = clone $this;
        $self['taskReminderMinute'] = $taskReminderMinute;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param UnenrollmentSettingsResponseShape $unenrollmentSettings
     */
    public function withUnenrollmentSettings(
        UnenrollmentSettingsResponse|array $unenrollmentSettings
    ): self {
        $self = clone $this;
        $self['unenrollmentSettings'] = $unenrollmentSettings;

        return $self;
    }
}
