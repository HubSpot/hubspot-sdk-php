<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSequenceResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   dependencies: list<PublicSequenceStepDependencyResponse>,
 *   name: string,
 *   steps: list<PublicSequenceStepResponse>,
 *   updatedAt: \DateTimeInterface,
 *   userID: string,
 *   folderID?: string|null,
 *   settings?: PublicSequenceSettingsResponse|null,
 * }
 */
final class PublicSequenceResponse implements BaseModel
{
    /** @use SdkModel<PublicSequenceResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $createdAt;

    /** @var list<PublicSequenceStepDependencyResponse> $dependencies */
    #[Required(list: PublicSequenceStepDependencyResponse::class)]
    public array $dependencies;

    #[Required]
    public string $name;

    /** @var list<PublicSequenceStepResponse> $steps */
    #[Required(list: PublicSequenceStepResponse::class)]
    public array $steps;

    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Required('userId')]
    public string $userID;

    #[Optional('folderId')]
    public ?string $folderID;

    #[Optional]
    public ?PublicSequenceSettingsResponse $settings;

    /**
     * `new PublicSequenceResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSequenceResponse::with(
     *   id: ...,
     *   createdAt: ...,
     *   dependencies: ...,
     *   name: ...,
     *   steps: ...,
     *   updatedAt: ...,
     *   userID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSequenceResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withDependencies(...)
     *   ->withName(...)
     *   ->withSteps(...)
     *   ->withUpdatedAt(...)
     *   ->withUserID(...)
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
     * @param list<PublicSequenceStepDependencyResponse|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   dependencyType: string,
     *   reliesOnSequenceStepID: string,
     *   reliesOnStepOrder: int,
     *   requiredBySequenceStepID: string,
     *   requiredByStepOrder: int,
     *   updatedAt: \DateTimeInterface,
     * }> $dependencies
     * @param list<PublicSequenceStepResponse|array{
     *   id: string,
     *   actionType: string,
     *   createdAt: \DateTimeInterface,
     *   delayMillis: int,
     *   stepOrder: int,
     *   updatedAt: \DateTimeInterface,
     *   emailPattern?: PublicEmailPatternResponse|null,
     *   taskPattern?: PublicTaskPatternResponse|null,
     * }> $steps
     * @param PublicSequenceSettingsResponse|array{
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
     * } $settings
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        array $dependencies,
        string $name,
        array $steps,
        \DateTimeInterface $updatedAt,
        string $userID,
        ?string $folderID = null,
        PublicSequenceSettingsResponse|array|null $settings = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['dependencies'] = $dependencies;
        $obj['name'] = $name;
        $obj['steps'] = $steps;
        $obj['updatedAt'] = $updatedAt;
        $obj['userID'] = $userID;

        null !== $folderID && $obj['folderID'] = $folderID;
        null !== $settings && $obj['settings'] = $settings;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * @param list<PublicSequenceStepDependencyResponse|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   dependencyType: string,
     *   reliesOnSequenceStepID: string,
     *   reliesOnStepOrder: int,
     *   requiredBySequenceStepID: string,
     *   requiredByStepOrder: int,
     *   updatedAt: \DateTimeInterface,
     * }> $dependencies
     */
    public function withDependencies(array $dependencies): self
    {
        $obj = clone $this;
        $obj['dependencies'] = $dependencies;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * @param list<PublicSequenceStepResponse|array{
     *   id: string,
     *   actionType: string,
     *   createdAt: \DateTimeInterface,
     *   delayMillis: int,
     *   stepOrder: int,
     *   updatedAt: \DateTimeInterface,
     *   emailPattern?: PublicEmailPatternResponse|null,
     *   taskPattern?: PublicTaskPatternResponse|null,
     * }> $steps
     */
    public function withSteps(array $steps): self
    {
        $obj = clone $this;
        $obj['steps'] = $steps;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }

    public function withFolderID(string $folderID): self
    {
        $obj = clone $this;
        $obj['folderID'] = $folderID;

        return $obj;
    }

    /**
     * @param PublicSequenceSettingsResponse|array{
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
     * } $settings
     */
    public function withSettings(
        PublicSequenceSettingsResponse|array $settings
    ): self {
        $obj = clone $this;
        $obj['settings'] = $settings;

        return $obj;
    }
}
