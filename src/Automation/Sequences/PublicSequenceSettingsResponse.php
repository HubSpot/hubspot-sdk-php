<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Sequences;

use HubSpotSDK\Automation\Sequences\PublicSequenceSettingsResponse\EligibleFollowUpDays;
use HubSpotSDK\Automation\Sequences\PublicSequenceSettingsResponse\SellingStrategy;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSequenceSettingsResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   eligibleFollowUpDays: EligibleFollowUpDays|value-of<EligibleFollowUpDays>,
 *   individualTaskRemindersEnabled: bool,
 *   sellingStrategy: SellingStrategy|value-of<SellingStrategy>,
 *   sendWindowEndMinute: int,
 *   sendWindowStartMinute: int,
 *   taskReminderMinute: int,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class PublicSequenceSettingsResponse implements BaseModel
{
    /** @use SdkModel<PublicSequenceSettingsResponseShape> */
    use SdkModel;

    /**
     * The unique identifier for the sequence settings.
     */
    #[Required]
    public string $id;

    /**
     * The timestamp of when the sequence settings were created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * Specifies the days on which follow-up actions are allowed.
     *
     * @var value-of<EligibleFollowUpDays> $eligibleFollowUpDays
     */
    #[Required(enum: EligibleFollowUpDays::class)]
    public string $eligibleFollowUpDays;

    /**
     * Indicates whether individual task reminders are enabled.
     */
    #[Required]
    public bool $individualTaskRemindersEnabled;

    /**
     * (deprecated) Defines the unenrollment strategy, with accepted values being ACCOUNT_BASED or LEAD_BASED. If ACCOUNT_BASED is used, all contacts associated with the same company will be unenrolled if one contact meets any of the unenrollment criteria.
     *
     * @var value-of<SellingStrategy> $sellingStrategy
     */
    #[Required(enum: SellingStrategy::class)]
    public string $sellingStrategy;

    /**
     * Indicates the end minute of the time window during which automated emails can be sent.
     */
    #[Required]
    public int $sendWindowEndMinute;

    /**
     * Indicates the start minute of the time window during which automated emails can be sent.
     */
    #[Required]
    public int $sendWindowStartMinute;

    /**
     * Specifies the minute of day at which task reminders are triggered.
     */
    #[Required]
    public int $taskReminderMinute;

    /**
     * The timestamp of when the sequence settings were last updated.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

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
     * @param EligibleFollowUpDays|value-of<EligibleFollowUpDays> $eligibleFollowUpDays
     * @param SellingStrategy|value-of<SellingStrategy> $sellingStrategy
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        EligibleFollowUpDays|string $eligibleFollowUpDays,
        bool $individualTaskRemindersEnabled,
        SellingStrategy|string $sellingStrategy,
        int $sendWindowEndMinute,
        int $sendWindowStartMinute,
        int $taskReminderMinute,
        \DateTimeInterface $updatedAt,
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

        return $self;
    }

    /**
     * The unique identifier for the sequence settings.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The timestamp of when the sequence settings were created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Specifies the days on which follow-up actions are allowed.
     *
     * @param EligibleFollowUpDays|value-of<EligibleFollowUpDays> $eligibleFollowUpDays
     */
    public function withEligibleFollowUpDays(
        EligibleFollowUpDays|string $eligibleFollowUpDays
    ): self {
        $self = clone $this;
        $self['eligibleFollowUpDays'] = $eligibleFollowUpDays;

        return $self;
    }

    /**
     * Indicates whether individual task reminders are enabled.
     */
    public function withIndividualTaskRemindersEnabled(
        bool $individualTaskRemindersEnabled
    ): self {
        $self = clone $this;
        $self['individualTaskRemindersEnabled'] = $individualTaskRemindersEnabled;

        return $self;
    }

    /**
     * (deprecated) Defines the unenrollment strategy, with accepted values being ACCOUNT_BASED or LEAD_BASED. If ACCOUNT_BASED is used, all contacts associated with the same company will be unenrolled if one contact meets any of the unenrollment criteria.
     *
     * @param SellingStrategy|value-of<SellingStrategy> $sellingStrategy
     */
    public function withSellingStrategy(
        SellingStrategy|string $sellingStrategy
    ): self {
        $self = clone $this;
        $self['sellingStrategy'] = $sellingStrategy;

        return $self;
    }

    /**
     * Indicates the end minute of the time window during which automated emails can be sent.
     */
    public function withSendWindowEndMinute(int $sendWindowEndMinute): self
    {
        $self = clone $this;
        $self['sendWindowEndMinute'] = $sendWindowEndMinute;

        return $self;
    }

    /**
     * Indicates the start minute of the time window during which automated emails can be sent.
     */
    public function withSendWindowStartMinute(int $sendWindowStartMinute): self
    {
        $self = clone $this;
        $self['sendWindowStartMinute'] = $sendWindowStartMinute;

        return $self;
    }

    /**
     * Specifies the minute of day at which task reminders are triggered.
     */
    public function withTaskReminderMinute(int $taskReminderMinute): self
    {
        $self = clone $this;
        $self['taskReminderMinute'] = $taskReminderMinute;

        return $self;
    }

    /**
     * The timestamp of when the sequence settings were last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
