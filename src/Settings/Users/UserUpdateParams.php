<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Settings\Users\UserUpdateParams\IDProperty;

/**
 * Modifies a user identified by `userId`. `userId` refers to the user's ID by default, or optionally email as specified by the `IdProperty` query param.
 *
 * @see HubspotSDK\Services\Settings\UsersService::update()
 *
 * @phpstan-type UserUpdateParamsShape = array{
 *   idProperty?: IDProperty|value-of<IDProperty>,
 *   firstName?: string,
 *   lastName?: string,
 *   primaryTeamID?: string,
 *   roleID?: string,
 *   secondaryTeamIDs?: list<string>,
 * }
 */
final class UserUpdateParams implements BaseModel
{
    /** @use SdkModel<UserUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of a property with unique user values. Valid values are `USER_ID`(default) or `EMAIL`.
     *
     * @var value-of<IDProperty>|null $idProperty
     */
    #[Optional(enum: IDProperty::class)]
    public ?string $idProperty;

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
     * @param IDProperty|value-of<IDProperty> $idProperty
     * @param list<string> $secondaryTeamIDs
     */
    public static function with(
        IDProperty|string|null $idProperty = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $primaryTeamID = null,
        ?string $roleID = null,
        ?array $secondaryTeamIDs = null,
    ): self {
        $obj = new self;

        null !== $idProperty && $obj['idProperty'] = $idProperty;
        null !== $firstName && $obj['firstName'] = $firstName;
        null !== $lastName && $obj['lastName'] = $lastName;
        null !== $primaryTeamID && $obj['primaryTeamID'] = $primaryTeamID;
        null !== $roleID && $obj['roleID'] = $roleID;
        null !== $secondaryTeamIDs && $obj['secondaryTeamIDs'] = $secondaryTeamIDs;

        return $obj;
    }

    /**
     * The name of a property with unique user values. Valid values are `USER_ID`(default) or `EMAIL`.
     *
     * @param IDProperty|value-of<IDProperty> $idProperty
     */
    public function withIDProperty(IDProperty|string $idProperty): self
    {
        $obj = clone $this;
        $obj['idProperty'] = $idProperty;

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
