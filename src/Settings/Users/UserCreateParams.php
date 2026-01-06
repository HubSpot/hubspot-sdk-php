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
        $obj = new self;

        $obj['email'] = $email;

        null !== $firstName && $obj['firstName'] = $firstName;
        null !== $lastName && $obj['lastName'] = $lastName;
        null !== $primaryTeamID && $obj['primaryTeamID'] = $primaryTeamID;
        null !== $roleID && $obj['roleID'] = $roleID;
        null !== $secondaryTeamIDs && $obj['secondaryTeamIDs'] = $secondaryTeamIDs;
        null !== $sendWelcomeEmail && $obj['sendWelcomeEmail'] = $sendWelcomeEmail;

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
     * Whether to send a welcome email.
     */
    public function withSendWelcomeEmail(bool $sendWelcomeEmail): self
    {
        $obj = clone $this;
        $obj['sendWelcomeEmail'] = $sendWelcomeEmail;

        return $obj;
    }
}
