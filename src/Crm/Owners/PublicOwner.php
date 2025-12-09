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
 * @phpstan-type PublicOwnerShape = array{
 *   id: string,
 *   archived: bool,
 *   createdAt: \DateTimeInterface,
 *   type: value-of<Type>,
 *   updatedAt: \DateTimeInterface,
 *   email?: string|null,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   teams?: list<\HubspotSDK\Settings\Users\PublicTeam>|null,
 *   userId?: int|null,
 *   userIdIncludingInactive?: int|null,
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
    #[Optional]
    public ?int $userId;

    /**
     * The user ID of the owner, including inactive users.
     */
    #[Optional]
    public ?int $userIdIncludingInactive;

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
     * @param list<PublicTeam|array{
     *   id: string,
     *   name: string,
     *   secondaryUserIds: list<string>,
     *   userIds: list<string>,
     * }> $teams
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
        ?int $userId = null,
        ?int $userIdIncludingInactive = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['archived'] = $archived;
        $obj['createdAt'] = $createdAt;
        $obj['type'] = $type;
        $obj['updatedAt'] = $updatedAt;

        null !== $email && $obj['email'] = $email;
        null !== $firstName && $obj['firstName'] = $firstName;
        null !== $lastName && $obj['lastName'] = $lastName;
        null !== $teams && $obj['teams'] = $teams;
        null !== $userId && $obj['userId'] = $userId;
        null !== $userIdIncludingInactive && $obj['userIdIncludingInactive'] = $userIdIncludingInactive;

        return $obj;
    }

    /**
     * The unique identifier of the owner.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Indicates whether the owner is archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * The date and time when the owner was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The type of the owner, which can be either PERSON or QUEUE.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The date and time when the owner was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * The email address of the owner.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * The first name of the owner.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['firstName'] = $firstName;

        return $obj;
    }

    /**
     * The last name of the owner.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['lastName'] = $lastName;

        return $obj;
    }

    /**
     * @param list<PublicTeam|array{
     *   id: string,
     *   name: string,
     *   secondaryUserIds: list<string>,
     *   userIds: list<string>,
     * }> $teams
     */
    public function withTeams(array $teams): self
    {
        $obj = clone $this;
        $obj['teams'] = $teams;

        return $obj;
    }

    /**
     * The user ID of the owner.
     */
    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj['userId'] = $userID;

        return $obj;
    }

    /**
     * The user ID of the owner, including inactive users.
     */
    public function withUserIDIncludingInactive(
        int $userIDIncludingInactive
    ): self {
        $obj = clone $this;
        $obj['userIdIncludingInactive'] = $userIDIncludingInactive;

        return $obj;
    }
}
