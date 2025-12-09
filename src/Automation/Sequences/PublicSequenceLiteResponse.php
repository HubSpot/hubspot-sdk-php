<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSequenceLiteResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   updatedAt: \DateTimeInterface,
 *   userId: string,
 *   folderId?: string|null,
 * }
 */
final class PublicSequenceLiteResponse implements BaseModel
{
    /** @use SdkModel<PublicSequenceLiteResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $name;

    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Required]
    public string $userId;

    #[Optional]
    public ?string $folderId;

    /**
     * `new PublicSequenceLiteResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSequenceLiteResponse::with(
     *   id: ..., createdAt: ..., name: ..., updatedAt: ..., userId: ...
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
        string $userId,
        ?string $folderId = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['name'] = $name;
        $obj['updatedAt'] = $updatedAt;
        $obj['userId'] = $userId;

        null !== $folderId && $obj['folderId'] = $folderId;

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

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

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
        $obj['userId'] = $userID;

        return $obj;
    }

    public function withFolderID(string $folderID): self
    {
        $obj = clone $this;
        $obj['folderId'] = $folderID;

        return $obj;
    }
}
