<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A user.
 *
 * @phpstan-type PublicUserShape = array{
 *   id: string,
 *   email: string,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   primaryTeamID?: string|null,
 *   roleID?: string|null,
 *   roleIDs?: list<string>|null,
 *   secondaryTeamIDs?: list<string>|null,
 *   sendWelcomeEmail?: bool|null,
 *   superAdmin?: bool|null,
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
     * A list of role IDs assigned to the user.
     *
     * @var list<string>|null $roleIDs
     */
    #[Optional('roleIds', list: 'string')]
    public ?array $roleIDs;

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
     * Whether the user has super admin privileges.
     */
    #[Optional]
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

        $obj['id'] = $id;
        $obj['email'] = $email;

        null !== $firstName && $obj['firstName'] = $firstName;
        null !== $lastName && $obj['lastName'] = $lastName;
        null !== $primaryTeamID && $obj['primaryTeamID'] = $primaryTeamID;
        null !== $roleID && $obj['roleID'] = $roleID;
        null !== $roleIDs && $obj['roleIDs'] = $roleIDs;
        null !== $secondaryTeamIDs && $obj['secondaryTeamIDs'] = $secondaryTeamIDs;
        null !== $sendWelcomeEmail && $obj['sendWelcomeEmail'] = $sendWelcomeEmail;
        null !== $superAdmin && $obj['superAdmin'] = $superAdmin;

        return $obj;
    }

    /**
     * The user's unique ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The user's email.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * The user's first name.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['firstName'] = $firstName;

        return $obj;
    }

    /**
     * The user's last name.
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
     * A list of role IDs assigned to the user.
     *
     * @param list<string> $roleIDs
     */
    public function withRoleIDs(array $roleIDs): self
    {
        $obj = clone $this;
        $obj['roleIDs'] = $roleIDs;

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

    /**
     * Whether a welcome email was sent to the user. This value will only be populated in response to a provisioning request. Subsequent queries will be false.
     */
    public function withSendWelcomeEmail(bool $sendWelcomeEmail): self
    {
        $obj = clone $this;
        $obj['sendWelcomeEmail'] = $sendWelcomeEmail;

        return $obj;
    }

    /**
     * Whether the user has super admin privileges.
     */
    public function withSuperAdmin(bool $superAdmin): self
    {
        $obj = clone $this;
        $obj['superAdmin'] = $superAdmin;

        return $obj;
    }
}
