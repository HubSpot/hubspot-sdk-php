<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
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
     * @param list<string>|null $secondaryTeamIDs
     */
    public static function with(
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $primaryTeamID = null,
        ?string $roleID = null,
        ?array $secondaryTeamIDs = null,
    ): self {
        $self = new self;

        null !== $firstName && $self['firstName'] = $firstName;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $primaryTeamID && $self['primaryTeamID'] = $primaryTeamID;
        null !== $roleID && $self['roleID'] = $roleID;
        null !== $secondaryTeamIDs && $self['secondaryTeamIDs'] = $secondaryTeamIDs;

        return $self;
    }

    /**
     * The first name of the user.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * The last name of the user.
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * The user's primary team.
     */
    public function withPrimaryTeamID(string $primaryTeamID): self
    {
        $self = clone $this;
        $self['primaryTeamID'] = $primaryTeamID;

        return $self;
    }

    /**
     * The user's role.
     */
    public function withRoleID(string $roleID): self
    {
        $self = clone $this;
        $self['roleID'] = $roleID;

        return $self;
    }

    /**
     * The user's additional teams.
     *
     * @param list<string> $secondaryTeamIDs
     */
    public function withSecondaryTeamIDs(array $secondaryTeamIDs): self
    {
        $self = clone $this;
        $self['secondaryTeamIDs'] = $secondaryTeamIDs;

        return $self;
    }
}
