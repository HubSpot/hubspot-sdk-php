<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
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
 *   unenrollmentSettings?: UnenrollmentSettingsResponse|null,
 * }
 */
final class PublicSequenceSettingsResponse implements BaseModel
{
    /** @use SdkModel<PublicSequenceSettingsResponseShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $eligibleFollowUpDays;

    #[Api]
    public bool $individualTaskRemindersEnabled;

    #[Api]
    public string $sellingStrategy;

    #[Api]
    public int $sendWindowEndMinute;

    #[Api]
    public int $sendWindowStartMinute;

    #[Api]
    public int $taskReminderMinute;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
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
        ?UnenrollmentSettingsResponse $unenrollmentSettings = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->eligibleFollowUpDays = $eligibleFollowUpDays;
        $obj->individualTaskRemindersEnabled = $individualTaskRemindersEnabled;
        $obj->sellingStrategy = $sellingStrategy;
        $obj->sendWindowEndMinute = $sendWindowEndMinute;
        $obj->sendWindowStartMinute = $sendWindowStartMinute;
        $obj->taskReminderMinute = $taskReminderMinute;
        $obj->updatedAt = $updatedAt;

        null !== $unenrollmentSettings && $obj->unenrollmentSettings = $unenrollmentSettings;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withEligibleFollowUpDays(string $eligibleFollowUpDays): self
    {
        $obj = clone $this;
        $obj->eligibleFollowUpDays = $eligibleFollowUpDays;

        return $obj;
    }

    public function withIndividualTaskRemindersEnabled(
        bool $individualTaskRemindersEnabled
    ): self {
        $obj = clone $this;
        $obj->individualTaskRemindersEnabled = $individualTaskRemindersEnabled;

        return $obj;
    }

    public function withSellingStrategy(string $sellingStrategy): self
    {
        $obj = clone $this;
        $obj->sellingStrategy = $sellingStrategy;

        return $obj;
    }

    public function withSendWindowEndMinute(int $sendWindowEndMinute): self
    {
        $obj = clone $this;
        $obj->sendWindowEndMinute = $sendWindowEndMinute;

        return $obj;
    }

    public function withSendWindowStartMinute(int $sendWindowStartMinute): self
    {
        $obj = clone $this;
        $obj->sendWindowStartMinute = $sendWindowStartMinute;

        return $obj;
    }

    public function withTaskReminderMinute(int $taskReminderMinute): self
    {
        $obj = clone $this;
        $obj->taskReminderMinute = $taskReminderMinute;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withUnenrollmentSettings(
        UnenrollmentSettingsResponse $unenrollmentSettings
    ): self {
        $obj = clone $this;
        $obj->unenrollmentSettings = $unenrollmentSettings;

        return $obj;
    }
}
