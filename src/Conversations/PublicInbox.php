<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicInboxShape = array{
 *   archived: bool,
 *   type: string,
 *   id?: string|null,
 *   archivedAt?: \DateTimeInterface|null,
 *   createdAt?: \DateTimeInterface|null,
 *   name?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class PublicInbox implements BaseModel
{
    /** @use SdkModel<PublicInboxShape> */
    use SdkModel;

    #[Api]
    public bool $archived;

    /**
     * Specifies whether this refers to a Conversations Inbox or to the Help Desk. Valid values are INBOX or HELP_DESK.
     */
    #[Api]
    public string $type;

    /**
     * The ID of the inbox.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?\DateTimeInterface $archivedAt;

    /**
     * When the inbox was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * The name of the inbox.
     */
    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new PublicInbox()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicInbox::with(archived: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicInbox)->withArchived(...)->withType(...)
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
        bool $archived,
        string $type,
        ?string $id = null,
        ?\DateTimeInterface $archivedAt = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->archived = $archived;
        $obj->type = $type;

        null !== $id && $obj->id = $id;
        null !== $archivedAt && $obj->archivedAt = $archivedAt;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $name && $obj->name = $name;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * Specifies whether this refers to a Conversations Inbox or to the Help Desk. Valid values are INBOX or HELP_DESK.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * The ID of the inbox.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

        return $obj;
    }

    /**
     * When the inbox was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The name of the inbox.
     */
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
}
