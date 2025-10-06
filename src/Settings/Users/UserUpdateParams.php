<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Settings\Users\UserUpdateParams\IDProperty;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new UserUpdateParams); // set properties as needed
 * $client->settings.users->update(...$params->toArray());
 * ```
 * Modifies a user.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->settings.users->update(...$params->toArray());`
 *
 * @see HubspotSDK\Settings\Users->update
 *
 * @phpstan-type user_update_params = array{
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
    /** @use SdkModel<user_update_params> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<IDProperty>|null $idProperty */
    #[Api(enum: IDProperty::class, optional: true)]
    public ?string $idProperty;

    #[Api(optional: true)]
    public ?string $firstName;

    #[Api(optional: true)]
    public ?string $lastName;

    #[Api('primaryTeamId', optional: true)]
    public ?string $primaryTeamID;

    #[Api('roleId', optional: true)]
    public ?string $roleID;

    /** @var list<string>|null $secondaryTeamIDs */
    #[Api('secondaryTeamIds', list: 'string', optional: true)]
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
        null !== $firstName && $obj->firstName = $firstName;
        null !== $lastName && $obj->lastName = $lastName;
        null !== $primaryTeamID && $obj->primaryTeamID = $primaryTeamID;
        null !== $roleID && $obj->roleID = $roleID;
        null !== $secondaryTeamIDs && $obj->secondaryTeamIDs = $secondaryTeamIDs;

        return $obj;
    }

    /**
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

    public function withPrimaryTeamID(string $primaryTeamID): self
    {
        $obj = clone $this;
        $obj->primaryTeamID = $primaryTeamID;

        return $obj;
    }

    public function withRoleID(string $roleID): self
    {
        $obj = clone $this;
        $obj->roleID = $roleID;

        return $obj;
    }

    /**
     * @param list<string> $secondaryTeamIDs
     */
    public function withSecondaryTeamIDs(array $secondaryTeamIDs): self
    {
        $obj = clone $this;
        $obj->secondaryTeamIDs = $secondaryTeamIDs;

        return $obj;
    }
}
