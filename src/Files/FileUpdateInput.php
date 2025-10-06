<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\FileUpdateInput\Access;

/**
 * @phpstan-type file_update_input = array{
 *   access?: value-of<Access>,
 *   clearExpires?: bool,
 *   expiresAt?: \DateTimeInterface,
 *   isUsableInContent?: bool,
 *   name?: string,
 *   parentFolderID?: string,
 *   parentFolderPath?: string,
 * }
 */
final class FileUpdateInput implements BaseModel
{
    /** @use SdkModel<file_update_input> */
    use SdkModel;

    /** @var value-of<Access>|null $access */
    #[Api(enum: Access::class, optional: true)]
    public ?string $access;

    #[Api(optional: true)]
    public ?bool $clearExpires;

    #[Api(optional: true)]
    public ?\DateTimeInterface $expiresAt;

    #[Api(optional: true)]
    public ?bool $isUsableInContent;

    #[Api(optional: true)]
    public ?string $name;

    #[Api('parentFolderId', optional: true)]
    public ?string $parentFolderID;

    #[Api(optional: true)]
    public ?string $parentFolderPath;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Access|value-of<Access> $access
     */
    public static function with(
        Access|string|null $access = null,
        ?bool $clearExpires = null,
        ?\DateTimeInterface $expiresAt = null,
        ?bool $isUsableInContent = null,
        ?string $name = null,
        ?string $parentFolderID = null,
        ?string $parentFolderPath = null,
    ): self {
        $obj = new self;

        null !== $access && $obj['access'] = $access;
        null !== $clearExpires && $obj->clearExpires = $clearExpires;
        null !== $expiresAt && $obj->expiresAt = $expiresAt;
        null !== $isUsableInContent && $obj->isUsableInContent = $isUsableInContent;
        null !== $name && $obj->name = $name;
        null !== $parentFolderID && $obj->parentFolderID = $parentFolderID;
        null !== $parentFolderPath && $obj->parentFolderPath = $parentFolderPath;

        return $obj;
    }

    /**
     * @param Access|value-of<Access> $access
     */
    public function withAccess(Access|string $access): self
    {
        $obj = clone $this;
        $obj['access'] = $access;

        return $obj;
    }

    public function withClearExpires(bool $clearExpires): self
    {
        $obj = clone $this;
        $obj->clearExpires = $clearExpires;

        return $obj;
    }

    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    public function withIsUsableInContent(bool $isUsableInContent): self
    {
        $obj = clone $this;
        $obj->isUsableInContent = $isUsableInContent;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withParentFolderID(string $parentFolderID): self
    {
        $obj = clone $this;
        $obj->parentFolderID = $parentFolderID;

        return $obj;
    }

    public function withParentFolderPath(string $parentFolderPath): self
    {
        $obj = clone $this;
        $obj->parentFolderPath = $parentFolderPath;

        return $obj;
    }
}
