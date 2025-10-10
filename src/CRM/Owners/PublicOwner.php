<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Owners;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\CRM\Owners\PublicOwner\Type;
use HubspotSDK\Settings\Users\SettingsUsersPublicTeam;

/**
 * @phpstan-type public_owner = array{
 *   id: string,
 *   archived: bool,
 *   createdAt: \DateTimeInterface,
 *   type: value-of<Type>,
 *   updatedAt: \DateTimeInterface,
 *   email?: string,
 *   firstName?: string,
 *   lastName?: string,
 *   teams?: list<SettingsUsersPublicTeam>,
 *   userID?: int,
 *   userIDIncludingInactive?: int,
 * }
 */
final class PublicOwner implements BaseModel, ResponseConverter
{
    /** @use SdkModel<public_owner> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public bool $archived;

    #[Api]
    public \DateTimeInterface $createdAt;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?string $email;

    #[Api(optional: true)]
    public ?string $firstName;

    #[Api(optional: true)]
    public ?string $lastName;

    /** @var list<SettingsUsersPublicTeam>|null $teams */
    #[Api(list: SettingsUsersPublicTeam::class, optional: true)]
    public ?array $teams;

    #[Api('userId', optional: true)]
    public ?int $userID;

    #[Api('userIdIncludingInactive', optional: true)]
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
     * @param list<SettingsUsersPublicTeam> $teams
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
        $obj = new self;

        $obj->id = $id;
        $obj->archived = $archived;
        $obj->createdAt = $createdAt;
        $obj['type'] = $type;
        $obj->updatedAt = $updatedAt;

        null !== $email && $obj->email = $email;
        null !== $firstName && $obj->firstName = $firstName;
        null !== $lastName && $obj->lastName = $lastName;
        null !== $teams && $obj->teams = $teams;
        null !== $userID && $obj->userID = $userID;
        null !== $userIDIncludingInactive && $obj->userIDIncludingInactive = $userIDIncludingInactive;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }

    /**
     * @param list<SettingsUsersPublicTeam> $teams
     */
    public function withTeams(array $teams): self
    {
        $obj = clone $this;
        $obj->teams = $teams;

        return $obj;
    }

    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }

    public function withUserIDIncludingInactive(
        int $userIDIncludingInactive
    ): self {
        $obj = clone $this;
        $obj->userIDIncludingInactive = $userIDIncludingInactive;

        return $obj;
    }
}
