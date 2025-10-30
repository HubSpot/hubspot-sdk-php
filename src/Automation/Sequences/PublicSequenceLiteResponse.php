<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSequenceLiteResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   updatedAt: \DateTimeInterface,
 *   userID: string,
 *   folderID?: string,
 * }
 */
final class PublicSequenceLiteResponse implements BaseModel
{
    /** @use SdkModel<PublicSequenceLiteResponseShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $name;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api('userId')]
    public string $userID;

    #[Api('folderId', optional: true)]
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
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->name = $name;
        $obj->updatedAt = $updatedAt;
        $obj->userID = $userID;

        null !== $folderID && $obj->folderID = $folderID;

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

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

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
}
