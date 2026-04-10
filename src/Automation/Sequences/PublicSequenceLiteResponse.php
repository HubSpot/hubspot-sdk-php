<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Sequences;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSequenceLiteResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   updatedAt: \DateTimeInterface,
 *   userID: string,
 *   folderID?: string|null,
 * }
 */
final class PublicSequenceLiteResponse implements BaseModel
{
    /** @use SdkModel<PublicSequenceLiteResponseShape> */
    use SdkModel;

    /**
     * The unique identifier of the sequence.
     */
    #[Required]
    public string $id;

    /**
     * The date and time when the sequence was created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * The name of the sequence.
     */
    #[Required]
    public string $name;

    /**
     * The date and time when the sequence was last updated.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * The ID of the user associated with the sequence.
     */
    #[Required('userId')]
    public string $userID;

    /**
     * The ID of the folder containing the sequence.
     */
    #[Optional('folderId')]
    public ?string $folderID;

    /**
     * `new PublicSequenceLiteResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSequenceLiteResponse::with(
     *   id: ..., createdAt: ..., name: ..., updatedAt: ..., userID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSequenceLiteResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withName(...)
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
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $name,
        \DateTimeInterface $updatedAt,
        string $userID,
        ?string $folderID = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['name'] = $name;
        $self['updatedAt'] = $updatedAt;
        $self['userID'] = $userID;

        null !== $folderID && $self['folderID'] = $folderID;

        return $self;
    }

    /**
     * The unique identifier of the sequence.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The date and time when the sequence was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The name of the sequence.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The date and time when the sequence was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The ID of the user associated with the sequence.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * The ID of the folder containing the sequence.
     */
    public function withFolderID(string $folderID): self
    {
        $self = clone $this;
        $self['folderID'] = $folderID;

        return $self;
    }
}
