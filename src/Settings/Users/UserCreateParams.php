<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * New users will only have minimal permissions, which is contacts-base. A welcome email will prompt them to set a password and log in to HubSpot.
 *
 * @see HubspotSDK\Services\Settings\UsersService::create()
 *
 * @phpstan-type UserCreateParamsShape = array{
 *   email: string,
 *   firstName?: string,
 *   lastName?: string,
 *   primaryTeamID?: string,
 *   roleID?: string,
 *   secondaryTeamIDs?: list<string>,
 *   sendWelcomeEmail?: bool,
 * }
 */
final class UserCreateParams implements BaseModel
{
    /** @use SdkModel<UserCreateParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * The user's additional teams.
     *
     * @var list<string>|null $secondaryTeamIDs
     */
    #[Optional('secondaryTeamIds', list: 'string')]
    public ?array $secondaryTeamIDs;

    /**
     * Whether to send a welcome email.
     */
    #[Optional]
    public ?bool $sendWelcomeEmail;

    /**
     * `new UserCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserCreateParams::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserCreateParams)->withEmail(...)
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
     * @param list<string> $secondaryTeamIDs
     */
    public static function with(
        string $email,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $primaryTeamID = null,
        ?string $roleID = null,
        ?array $secondaryTeamIDs = null,
        ?bool $sendWelcomeEmail = null,
    ): self {
        $self = new self;

        $self['email'] = $email;

        null !== $firstName && $self['firstName'] = $firstName;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $primaryTeamID && $self['primaryTeamID'] = $primaryTeamID;
        null !== $roleID && $self['roleID'] = $roleID;
        null !== $secondaryTeamIDs && $self['secondaryTeamIDs'] = $secondaryTeamIDs;
        null !== $sendWelcomeEmail && $self['sendWelcomeEmail'] = $sendWelcomeEmail;

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
     * Whether to send a welcome email.
     */
    public function withSendWelcomeEmail(bool $sendWelcomeEmail): self
    {
        $self = clone $this;
        $self['sendWelcomeEmail'] = $sendWelcomeEmail;

        return $self;
    }
}
