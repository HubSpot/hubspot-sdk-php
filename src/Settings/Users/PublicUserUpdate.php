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
 *   primaryTeamID?: string|null,
 *   roleID?: string|null,
 *   secondaryTeamIDs?: list<string>|null,
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
    #[Optional('primaryTeamId')]
    public ?string $primaryTeamID;

    /**
     * The user's role.
     */
    #[Optional('roleId')]
    public ?string $roleID;

    /**
     * The user's additional teams.
     *
     * @var list<string>|null $secondaryTeamIDs
     */
    #[Optional('secondaryTeamIds', list: 'string')]
    public ?array $secondaryTeamIDs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $secondaryTeamIDs
     */
    public static function with(
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $primaryTeamID = null,
        ?string $roleID = null,
        ?array $secondaryTeamIDs = null,
    ): self {
        $obj = new self;

        null !== $firstName && $obj['firstName'] = $firstName;
        null !== $lastName && $obj['lastName'] = $lastName;
        null !== $primaryTeamID && $obj['primaryTeamID'] = $primaryTeamID;
        null !== $roleID && $obj['roleID'] = $roleID;
        null !== $secondaryTeamIDs && $obj['secondaryTeamIDs'] = $secondaryTeamIDs;

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
        $obj['primaryTeamID'] = $primaryTeamID;

        return $obj;
    }

    /**
     * The user's role.
     */
    public function withRoleID(string $roleID): self
    {
        $obj = clone $this;
        $obj['roleID'] = $roleID;

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
        $obj['secondaryTeamIDs'] = $secondaryTeamIDs;

        return $obj;
    }
}
