<?php

declare(strict_types=1);

namespace HubSpotSDK\Settings\Users;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicUserShape = array{
 *   id: string,
 *   email: string,
 *   roleIDs: list<string>,
 *   superAdmin: bool,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   primaryTeamID?: string|null,
 *   roleID?: string|null,
 *   secondaryTeamIDs?: list<string>|null,
 *   sendWelcomeEmail?: bool|null,
 * }
 */
final class PublicUser implements BaseModel
{
    /** @use SdkModel<PublicUserShape> */
    use SdkModel;

    /**
     * The user's unique ID.
     */
    #[Required]
    public string $id;

    /**
     * The user's email.
     */
    #[Required]
    public string $email;

    /**
     * A list of role IDs assigned to the user.
     *
     * @var list<string> $roleIDs
     */
    #[Required('roleIds', list: 'string')]
    public array $roleIDs;

    /**
     * Whether the user has super admin privileges.
     */
    #[Required]
    public bool $superAdmin;

    /**
     * The user's first name.
     */
    #[Optional]
    public ?string $firstName;

    /**
     * The user's last name.
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

    /**
     * Whether a welcome email was sent to the user. This value will only be populated in response to a provisioning request. Subsequent queries will be false.
     */
    #[Optional]
    public ?bool $sendWelcomeEmail;

    /**
     * `new PublicUser()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicUser::with(id: ..., email: ..., roleIDs: ..., superAdmin: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicUser)
     *   ->withID(...)
     *   ->withEmail(...)
     *   ->withRoleIDs(...)
     *   ->withSuperAdmin(...)
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
     * @param list<string>|null $secondaryTeamIDs
     */
    public static function with(
        string $id,
        string $email,
        array $roleIDs,
        bool $superAdmin,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $primaryTeamID = null,
        ?string $roleID = null,
        ?array $secondaryTeamIDs = null,
        ?bool $sendWelcomeEmail = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['email'] = $email;
        $self['roleIDs'] = $roleIDs;
        $self['superAdmin'] = $superAdmin;

        null !== $firstName && $self['firstName'] = $firstName;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $primaryTeamID && $self['primaryTeamID'] = $primaryTeamID;
        null !== $roleID && $self['roleID'] = $roleID;
        null !== $secondaryTeamIDs && $self['secondaryTeamIDs'] = $secondaryTeamIDs;
        null !== $sendWelcomeEmail && $self['sendWelcomeEmail'] = $sendWelcomeEmail;

        return $self;
    }

    /**
     * The user's unique ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The user's email.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * A list of role IDs assigned to the user.
     *
     * @param list<string> $roleIDs
     */
    public function withRoleIDs(array $roleIDs): self
    {
        $self = clone $this;
        $self['roleIDs'] = $roleIDs;

        return $self;
    }

    /**
     * Whether the user has super admin privileges.
     */
    public function withSuperAdmin(bool $superAdmin): self
    {
        $self = clone $this;
        $self['superAdmin'] = $superAdmin;

        return $self;
    }

    /**
     * The user's first name.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * The user's last name.
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

    /**
     * Whether a welcome email was sent to the user. This value will only be populated in response to a provisioning request. Subsequent queries will be false.
     */
    public function withSendWelcomeEmail(bool $sendWelcomeEmail): self
    {
        $self = clone $this;
        $self['sendWelcomeEmail'] = $sendWelcomeEmail;

        return $self;
    }
}
