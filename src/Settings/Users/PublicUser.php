<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * A user.
 *
 * @phpstan-type PublicUserShape = array{
 *   id: string,
 *   email: string,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   primaryTeamId?: string|null,
 *   roleId?: string|null,
 *   roleIds?: list<string>|null,
 *   secondaryTeamIds?: list<string>|null,
 *   sendWelcomeEmail?: bool|null,
 *   superAdmin?: bool|null,
 * }
 */
final class PublicUser implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PublicUserShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The user's unique ID.
     */
    #[Api]
    public string $id;

    /**
     * The user's email.
     */
    #[Api]
    public string $email;

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

    /** @var list<string>|null $roleIds */
    #[Api(list: 'string', optional: true)]
    public ?array $roleIds;

    /**
     * The user's additional teams.
     *
     * @var list<string>|null $secondaryTeamIds
     */
    #[Api(list: 'string', optional: true)]
    public ?array $secondaryTeamIds;

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
     * @param list<string> $roleIds
     * @param list<string> $secondaryTeamIds
     */
    public static function with(
        string $id,
        string $email,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $primaryTeamId = null,
        ?string $roleId = null,
        ?array $roleIds = null,
        ?array $secondaryTeamIds = null,
        ?bool $sendWelcomeEmail = null,
        ?bool $superAdmin = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->email = $email;

        null !== $firstName && $obj->firstName = $firstName;
        null !== $lastName && $obj->lastName = $lastName;
        null !== $primaryTeamId && $obj->primaryTeamId = $primaryTeamId;
        null !== $roleId && $obj->roleId = $roleId;
        null !== $roleIds && $obj->roleIds = $roleIds;
        null !== $secondaryTeamIds && $obj->secondaryTeamIds = $secondaryTeamIds;
        null !== $sendWelcomeEmail && $obj->sendWelcomeEmail = $sendWelcomeEmail;
        null !== $superAdmin && $obj->superAdmin = $superAdmin;

        return $obj;
    }

    /**
     * The user's unique ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The user's email.
     */
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
     * @param list<string> $roleIDs
     */
    public function withRoleIDs(array $roleIDs): self
    {
        $obj = clone $this;
        $obj->roleIds = $roleIDs;

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
