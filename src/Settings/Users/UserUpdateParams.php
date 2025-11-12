<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Settings\Users\UserUpdateParams\IDProperty;

/**
 * Modifies a user identified by `userId`. `userId` refers to the user's ID by default, or optionally email as specified by the `IdProperty` query param.
 *
 * @see HubspotSDK\Settings\Users->update
 *
 * @phpstan-type UserUpdateParamsShape = array{
 *   idProperty?: IDProperty|value-of<IDProperty>,
 *   firstName?: string,
 *   lastName?: string,
 *   primaryTeamId?: string,
 *   roleId?: string,
 *   secondaryTeamIds?: list<string>,
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
    #[Api(enum: IDProperty::class, optional: true)]
    public ?string $idProperty;

    #[Api(optional: true)]
    public ?string $firstName;

    #[Api(optional: true)]
    public ?string $lastName;

    /**
     * The user's primary team.
     */
    #[Api(optional: true)]
    public ?string $primaryTeamId;

    /**
     * The user's role.
     */
    #[Api(optional: true)]
    public ?string $roleId;

    /**
     * The user's additional teams.
     *
     * @var list<string>|null $secondaryTeamIds
     */
    #[Api(list: 'string', optional: true)]
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
     * @param IDProperty|value-of<IDProperty> $idProperty
     * @param list<string> $secondaryTeamIds
     */
    public static function with(
        IDProperty|string|null $idProperty = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $primaryTeamId = null,
        ?string $roleId = null,
        ?array $secondaryTeamIds = null,
    ): self {
        $obj = new self;

        null !== $idProperty && $obj['idProperty'] = $idProperty;
        null !== $firstName && $obj->firstName = $firstName;
        null !== $lastName && $obj->lastName = $lastName;
        null !== $primaryTeamId && $obj->primaryTeamId = $primaryTeamId;
        null !== $roleId && $obj->roleId = $roleId;
        null !== $secondaryTeamIds && $obj->secondaryTeamIds = $secondaryTeamIds;

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
     * The user's primary team.
     */
    public function withPrimaryTeamID(string $primaryTeamID): self
    {
        $obj = clone $this;
        $obj->primaryTeamId = $primaryTeamID;

        return $obj;
    }

    /**
     * The user's role.
     */
    public function withRoleID(string $roleID): self
    {
        $obj = clone $this;
        $obj->roleId = $roleID;

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
        $obj->secondaryTeamIds = $secondaryTeamIDs;

        return $obj;
    }
}
