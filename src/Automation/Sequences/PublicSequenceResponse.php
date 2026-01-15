<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicSequenceStepDependencyResponseShape from \HubspotSDK\Automation\Sequences\PublicSequenceStepDependencyResponse
 * @phpstan-import-type PublicSequenceStepResponseShape from \HubspotSDK\Automation\Sequences\PublicSequenceStepResponse
 * @phpstan-import-type PublicSequenceSettingsResponseShape from \HubspotSDK\Automation\Sequences\PublicSequenceSettingsResponse
 *
 * @phpstan-type PublicSequenceResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   dependencies: list<PublicSequenceStepDependencyResponse|PublicSequenceStepDependencyResponseShape>,
 *   name: string,
 *   steps: list<PublicSequenceStepResponse|PublicSequenceStepResponseShape>,
 *   updatedAt: \DateTimeInterface,
 *   userID: string,
 *   folderID?: string|null,
 *   settings?: null|PublicSequenceSettingsResponse|PublicSequenceSettingsResponseShape,
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
     * @param list<PublicSequenceStepDependencyResponse|PublicSequenceStepDependencyResponseShape> $dependencies
     * @param list<PublicSequenceStepResponse|PublicSequenceStepResponseShape> $steps
     * @param PublicSequenceSettingsResponse|PublicSequenceSettingsResponseShape|null $settings
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
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['dependencies'] = $dependencies;
        $self['name'] = $name;
        $self['steps'] = $steps;
        $self['updatedAt'] = $updatedAt;
        $self['userID'] = $userID;

        null !== $folderID && $self['folderID'] = $folderID;
        null !== $settings && $self['settings'] = $settings;

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

    /**
     * @param list<PublicSequenceStepDependencyResponse|PublicSequenceStepDependencyResponseShape> $dependencies
     */
    public function withDependencies(array $dependencies): self
    {
        $self = clone $this;
        $self['dependencies'] = $dependencies;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<PublicSequenceStepResponse|PublicSequenceStepResponseShape> $steps
     */
    public function withSteps(array $steps): self
    {
        $self = clone $this;
        $self['steps'] = $steps;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    public function withFolderID(string $folderID): self
    {
        $self = clone $this;
        $self['folderID'] = $folderID;

        return $self;
    }

    /**
     * @param PublicSequenceSettingsResponse|PublicSequenceSettingsResponseShape $settings
     */
    public function withSettings(
        PublicSequenceSettingsResponse|array $settings
    ): self {
        $self = clone $this;
        $self['settings'] = $settings;

        return $self;
    }
}
