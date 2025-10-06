<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type public_user = array{
 *   id: string,
 *   email: string,
 *   firstName?: string,
 *   lastName?: string,
 *   primaryTeamID?: string,
 *   roleID?: string,
 *   roleIDs?: list<string>,
 *   secondaryTeamIDs?: list<string>,
 *   sendWelcomeEmail?: bool,
 *   superAdmin?: bool,
 * }
 */
final class PublicUser implements BaseModel, ResponseConverter
{
    /** @use SdkModel<public_user> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public string $email;

    #[Api(optional: true)]
    public ?string $firstName;

    #[Api(optional: true)]
    public ?string $lastName;

    #[Api('primaryTeamId', optional: true)]
    public ?string $primaryTeamID;

    #[Api('roleId', optional: true)]
    public ?string $roleID;

    /** @var list<string>|null $roleIDs */
    #[Api('roleIds', list: 'string', optional: true)]
    public ?array $roleIDs;

    /** @var list<string>|null $secondaryTeamIDs */
    #[Api('secondaryTeamIds', list: 'string', optional: true)]
    public ?array $secondaryTeamIDs;

    #[Api(optional: true)]
    public ?bool $sendWelcomeEmail;

    #[Api(optional: true)]
    public ?bool $superAdmin;

    /**
     * `new PublicUser()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicUser::with(id: ..., email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicUser)->withID(...)->withEmail(...)
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
     * @param list<string> $roleIDs
     * @param list<string> $secondaryTeamIDs
     */
    public static function with(
        string $id,
        string $email,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $primaryTeamID = null,
        ?string $roleID = null,
        ?array $roleIDs = null,
        ?array $secondaryTeamIDs = null,
        ?bool $sendWelcomeEmail = null,
        ?bool $superAdmin = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->email = $email;

        null !== $firstName && $obj->firstName = $firstName;
        null !== $lastName && $obj->lastName = $lastName;
        null !== $primaryTeamID && $obj->primaryTeamID = $primaryTeamID;
        null !== $roleID && $obj->roleID = $roleID;
        null !== $roleIDs && $obj->roleIDs = $roleIDs;
        null !== $secondaryTeamIDs && $obj->secondaryTeamIDs = $secondaryTeamIDs;
        null !== $sendWelcomeEmail && $obj->sendWelcomeEmail = $sendWelcomeEmail;
        null !== $superAdmin && $obj->superAdmin = $superAdmin;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

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
     * @param list<string> $roleIDs
     */
    public function withRoleIDs(array $roleIDs): self
    {
        $obj = clone $this;
        $obj->roleIDs = $roleIDs;

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

    public function withSendWelcomeEmail(bool $sendWelcomeEmail): self
    {
        $obj = clone $this;
        $obj->sendWelcomeEmail = $sendWelcomeEmail;

        return $obj;
    }

    public function withSuperAdmin(bool $superAdmin): self
    {
        $obj = clone $this;
        $obj->superAdmin = $superAdmin;

        return $obj;
    }
}
