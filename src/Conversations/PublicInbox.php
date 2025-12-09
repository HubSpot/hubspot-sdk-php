<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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

    #[Required]
    public string $id;

    #[Required]
    public bool $archived;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $name;

    #[Required]
    public string $type;

    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Optional]
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
        $self = new self;

        $self['id'] = $id;
        $self['archived'] = $archived;
        $self['createdAt'] = $createdAt;
        $self['name'] = $name;
        $self['type'] = $type;
        $self['updatedAt'] = $updatedAt;

        null !== $archivedAt && $self['archivedAt'] = $archivedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $self = clone $this;
        $self['archivedAt'] = $archivedAt;

        return $self;
    }
}
