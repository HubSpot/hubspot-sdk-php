<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A user creation request.
 *
 * @phpstan-type UserProvisionRequestShape = array{
 *   email: string,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   primaryTeamId?: string|null,
 *   roleId?: string|null,
 *   secondaryTeamIds?: list<string>|null,
 *   sendWelcomeEmail?: bool|null,
 * }
 */
final class UserProvisionRequest implements BaseModel
{
    /** @use SdkModel<UserProvisionRequestShape> */
    use SdkModel;

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
    #[Optional]
    public ?string $primaryTeamId;

    /**
     * The user's role.
     */
    #[Optional]
    public ?string $roleId;

    /**
     * The user's additional teams.
     *
     * @var list<string>|null $secondaryTeamIds
     */
    #[Optional(list: 'string')]
    public ?array $secondaryTeamIds;

    /**
     * Whether to send a welcome email.
     */
    #[Optional]
    public ?bool $sendWelcomeEmail;

    /**
     * `new UserProvisionRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserProvisionRequest::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserProvisionRequest)->withEmail(...)
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
     * @param list<string> $secondaryTeamIds
     */
    public static function with(
        string $email,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $primaryTeamId = null,
        ?string $roleId = null,
        ?array $secondaryTeamIds = null,
        ?bool $sendWelcomeEmail = null,
    ): self {
        $obj = new self;

        $obj['email'] = $email;

        null !== $firstName && $obj['firstName'] = $firstName;
        null !== $lastName && $obj['lastName'] = $lastName;
        null !== $primaryTeamId && $obj['primaryTeamId'] = $primaryTeamId;
        null !== $roleId && $obj['roleId'] = $roleId;
        null !== $secondaryTeamIds && $obj['secondaryTeamIds'] = $secondaryTeamIds;
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
        $obj['primaryTeamId'] = $primaryTeamID;

        return $obj;
    }

    /**
     * The user's role.
     */
    public function withRoleID(string $roleID): self
    {
        $obj = clone $this;
        $obj['roleId'] = $roleID;

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
        $obj['secondaryTeamIds'] = $secondaryTeamIDs;

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
