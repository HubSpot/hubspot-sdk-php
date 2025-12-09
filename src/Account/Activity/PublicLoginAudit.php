<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Details about the a particular login activity for a HubSpot account.
 *
 * @phpstan-type PublicLoginAuditShape = array{
 *   id: string,
 *   loginAt: \DateTimeInterface,
 *   loginSucceeded: bool,
 *   countryCode?: string|null,
 *   email?: string|null,
 *   ipAddress?: string|null,
 *   location?: string|null,
 *   regionCode?: string|null,
 *   userAgent?: string|null,
 *   userID?: int|null,
 * }
 */
final class PublicLoginAudit implements BaseModel
{
    /** @use SdkModel<PublicLoginAuditShape> */
    use SdkModel;

    /**
     * The login activity's unique ID.
     */
    #[Required]
    public string $id;

    /**
     * The time the login took place.
     */
    #[Required]
    public \DateTimeInterface $loginAt;

    /**
     * Whether the login was successful or not.
     */
    #[Required]
    public bool $loginSucceeded;

    /**
     * The approximate country code of the login.
     */
    #[Optional]
    public ?string $countryCode;

    /**
     * Email address of the user associated with the login.
     */
    #[Optional]
    public ?string $email;

    /**
     * IP address where the activity originated.
     */
    #[Optional]
    public ?string $ipAddress;

    #[Optional]
    public ?string $location;

    /**
     * The approximate region code of the login.
     */
    #[Optional]
    public ?string $regionCode;

    /**
     * Information about the device used for logging in.
     */
    #[Optional]
    public ?string $userAgent;

    /**
     * The user's unique ID.
     */
    #[Optional('userId')]
    public ?int $userID;

    /**
     * `new PublicLoginAudit()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicLoginAudit::with(id: ..., loginAt: ..., loginSucceeded: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicLoginAudit)->withID(...)->withLoginAt(...)->withLoginSucceeded(...)
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
     */
    public static function with(
        string $id,
        \DateTimeInterface $loginAt,
        bool $loginSucceeded,
        ?string $countryCode = null,
        ?string $email = null,
        ?string $ipAddress = null,
        ?string $location = null,
        ?string $regionCode = null,
        ?string $userAgent = null,
        ?int $userID = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['loginAt'] = $loginAt;
        $self['loginSucceeded'] = $loginSucceeded;

        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $email && $self['email'] = $email;
        null !== $ipAddress && $self['ipAddress'] = $ipAddress;
        null !== $location && $self['location'] = $location;
        null !== $regionCode && $self['regionCode'] = $regionCode;
        null !== $userAgent && $self['userAgent'] = $userAgent;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    /**
     * The login activity's unique ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The time the login took place.
     */
    public function withLoginAt(\DateTimeInterface $loginAt): self
    {
        $self = clone $this;
        $self['loginAt'] = $loginAt;

        return $self;
    }

    /**
     * Whether the login was successful or not.
     */
    public function withLoginSucceeded(bool $loginSucceeded): self
    {
        $self = clone $this;
        $self['loginSucceeded'] = $loginSucceeded;

        return $self;
    }

    /**
     * The approximate country code of the login.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Email address of the user associated with the login.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * IP address where the activity originated.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $self = clone $this;
        $self['ipAddress'] = $ipAddress;

        return $self;
    }

    public function withLocation(string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    /**
     * The approximate region code of the login.
     */
    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }

    /**
     * Information about the device used for logging in.
     */
    public function withUserAgent(string $userAgent): self
    {
        $self = clone $this;
        $self['userAgent'] = $userAgent;

        return $self;
    }

    /**
     * The user's unique ID.
     */
    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
