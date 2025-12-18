<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Owners;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Owners\PublicOwner\Type;
use HubspotSDK\Settings\Users\PublicTeam;

/**
 * @phpstan-import-type PublicTeamShape from \HubspotSDK\Settings\Users\PublicTeam
 *
 * @phpstan-type PublicOwnerShape = array{
 *   id: string,
 *   archived: bool,
 *   createdAt: \DateTimeInterface,
 *   type: Type|value-of<Type>,
 *   updatedAt: \DateTimeInterface,
 *   email?: string|null,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   teams?: list<PublicTeamShape>|null,
 *   userID?: int|null,
 *   userIDIncludingInactive?: int|null,
 * }
 */
final class PublicOwner implements BaseModel
{
    /** @use SdkModel<PublicOwnerShape> */
    use SdkModel;

    /**
     * The unique identifier of the owner.
     */
    #[Required]
    public string $id;

    /**
     * Indicates whether the owner is archived.
     */
    #[Required]
    public bool $archived;

    /**
     * The date and time when the owner was created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * The type of the owner, which can be either PERSON or QUEUE.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The date and time when the owner was last updated.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * The email address of the owner.
     */
    #[Optional]
    public ?string $email;

    /**
     * The first name of the owner.
     */
    #[Optional]
    public ?string $firstName;

    /**
     * The last name of the owner.
     */
    #[Optional]
    public ?string $lastName;

    /** @var list<PublicTeam>|null $teams */
    #[Optional(list: PublicTeam::class)]
    public ?array $teams;

    /**
     * The user ID of the owner.
     */
    #[Optional('userId')]
    public ?int $userID;

    /**
     * The user ID of the owner, including inactive users.
     */
    #[Optional('userIdIncludingInactive')]
    public ?int $userIDIncludingInactive;

    /**
     * `new PublicOwner()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicOwner::with(
     *   id: ..., archived: ..., createdAt: ..., type: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicOwner)
     *   ->withID(...)
     *   ->withArchived(...)
     *   ->withCreatedAt(...)
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
     *
     * @param Type|value-of<Type> $type
     * @param list<PublicTeamShape>|null $teams
     */
    public static function with(
        string $id,
        bool $archived,
        \DateTimeInterface $createdAt,
        Type|string $type,
        \DateTimeInterface $updatedAt,
        ?string $email = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?array $teams = null,
        ?int $userID = null,
        ?int $userIDIncludingInactive = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['archived'] = $archived;
        $self['createdAt'] = $createdAt;
        $self['type'] = $type;
        $self['updatedAt'] = $updatedAt;

        null !== $email && $self['email'] = $email;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $teams && $self['teams'] = $teams;
        null !== $userID && $self['userID'] = $userID;
        null !== $userIDIncludingInactive && $self['userIDIncludingInactive'] = $userIDIncludingInactive;

        return $self;
    }

    /**
     * The unique identifier of the owner.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Indicates whether the owner is archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * The date and time when the owner was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The type of the owner, which can be either PERSON or QUEUE.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The date and time when the owner was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The email address of the owner.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The first name of the owner.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * The last name of the owner.
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * @param list<PublicTeamShape> $teams
     */
    public function withTeams(array $teams): self
    {
        $self = clone $this;
        $self['teams'] = $teams;

        return $self;
    }

    /**
     * The user ID of the owner.
     */
    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * The user ID of the owner, including inactive users.
     */
    public function withUserIDIncludingInactive(
        int $userIDIncludingInactive
    ): self {
        $self = clone $this;
        $self['userIDIncludingInactive'] = $userIDIncludingInactive;

        return $self;
    }
}
