<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicInboxShape = array{
 *   id: string,
 *   archived: bool,
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   type: string,
 *   updatedAt: \DateTimeInterface,
 *   archivedAt?: \DateTimeInterface|null,
 * }
 */
final class PublicInbox implements BaseModel
{
    /** @use SdkModel<PublicInboxShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public bool $archived;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $name;

    #[Api]
    public string $type;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?\DateTimeInterface $archivedAt;

    /**
     * `new PublicInbox()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicInbox::with(
     *   id: ..., archived: ..., createdAt: ..., name: ..., type: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicInbox)
     *   ->withID(...)
     *   ->withArchived(...)
     *   ->withCreatedAt(...)
     *   ->withName(...)
     *   ->withType(...)
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
        bool $archived,
        \DateTimeInterface $createdAt,
        string $name,
        string $type,
        \DateTimeInterface $updatedAt,
        ?\DateTimeInterface $archivedAt = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['archived'] = $archived;
        $obj['createdAt'] = $createdAt;
        $obj['name'] = $name;
        $obj['type'] = $type;
        $obj['updatedAt'] = $updatedAt;

        null !== $archivedAt && $obj['archivedAt'] = $archivedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

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

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj['archivedAt'] = $archivedAt;

        return $obj;
    }
}
