<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type public_sequence_response = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   dependencies: list<PublicSequenceStepDependencyResponse>,
 *   name: string,
 *   steps: list<PublicSequenceStepResponse>,
 *   updatedAt: \DateTimeInterface,
 *   userID: string,
 *   folderID?: string,
 *   settings?: PublicSequenceSettingsResponse,
 * }
 */
final class PublicSequenceResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<public_sequence_response> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    /** @var list<PublicSequenceStepDependencyResponse> $dependencies */
    #[Api(list: PublicSequenceStepDependencyResponse::class)]
    public array $dependencies;

    #[Api]
    public string $name;

    /** @var list<PublicSequenceStepResponse> $steps */
    #[Api(list: PublicSequenceStepResponse::class)]
    public array $steps;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api('userId')]
    public string $userID;

    #[Api('folderId', optional: true)]
    public ?string $folderID;

    #[Api(optional: true)]
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
     * @param list<PublicSequenceStepDependencyResponse> $dependencies
     * @param list<PublicSequenceStepResponse> $steps
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
        ?PublicSequenceSettingsResponse $settings = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->dependencies = $dependencies;
        $obj->name = $name;
        $obj->steps = $steps;
        $obj->updatedAt = $updatedAt;
        $obj->userID = $userID;

        null !== $folderID && $obj->folderID = $folderID;
        null !== $settings && $obj->settings = $settings;

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

    /**
     * @param list<PublicSequenceStepDependencyResponse> $dependencies
     */
    public function withDependencies(array $dependencies): self
    {
        $obj = clone $this;
        $obj->dependencies = $dependencies;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param list<PublicSequenceStepResponse> $steps
     */
    public function withSteps(array $steps): self
    {
        $obj = clone $this;
        $obj->steps = $steps;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }

    public function withFolderID(string $folderID): self
    {
        $obj = clone $this;
        $obj->folderID = $folderID;

        return $obj;
    }

    public function withSettings(PublicSequenceSettingsResponse $settings): self
    {
        $obj = clone $this;
        $obj->settings = $settings;

        return $obj;
    }
}
