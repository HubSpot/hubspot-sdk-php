<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A user to update.
 *
 * @phpstan-type PublicUserUpdateShape = array{
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   primaryTeamId?: string|null,
 *   roleId?: string|null,
 *   secondaryTeamIds?: list<string>|null,
 * }
 */
final class PublicUserUpdate implements BaseModel
{
    /** @use SdkModel<PublicUserUpdateShape> */
    use SdkModel;

    /**
     * The first name of the user.
     */
    #[Optional]
    public ?string $firstName;

    /**
     * The last name of the user.
     */
    #[Optional]
    public ?string $lastName;

    /**
     * The user's primary team.
     */
    #[Optional]
    public ?string $primaryTeamId;

    /**
     * The user's role.
     */
    #[Optional]
    public ?string $roleId;

    /**
     * The user's additional teams.
     *
     * @var list<string>|null $secondaryTeamIds
     */
    #[Optional(list: 'string')]
    public ?array $secondaryTeamIds;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $secondaryTeamIds
     */
    public static function with(
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $primaryTeamId = null,
        ?string $roleId = null,
        ?array $secondaryTeamIds = null,
    ): self {
        $obj = new self;

        null !== $firstName && $obj['firstName'] = $firstName;
        null !== $lastName && $obj['lastName'] = $lastName;
        null !== $primaryTeamId && $obj['primaryTeamId'] = $primaryTeamId;
        null !== $roleId && $obj['roleId'] = $roleId;
        null !== $secondaryTeamIds && $obj['secondaryTeamIds'] = $secondaryTeamIds;

        return $obj;
    }

    /**
     * The first name of the user.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['firstName'] = $firstName;

        return $obj;
    }

    /**
     * The last name of the user.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['lastName'] = $lastName;

        return $obj;
    }

    /**
     * The user's primary team.
     */
    public function withPrimaryTeamID(string $primaryTeamID): self
    {
        $obj = clone $this;
        $obj['primaryTeamId'] = $primaryTeamID;

        return $obj;
    }

    /**
     * The user's role.
     */
    public function withRoleID(string $roleID): self
    {
        $obj = clone $this;
        $obj['roleId'] = $roleID;

        return $obj;
    }

    /**
     * The user's additional teams.
     *
     * @param list<string> $secondaryTeamIDs
     */
    public function withSecondaryTeamIDs(array $secondaryTeamIDs): self
    {
        $obj = clone $this;
        $obj['secondaryTeamIds'] = $secondaryTeamIDs;

        return $obj;
    }
}
