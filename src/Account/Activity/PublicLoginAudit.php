<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

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
 *   userId?: int|null,
 * }
 */
final class PublicLoginAudit implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PublicLoginAuditShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The login activity's unique ID.
     */
    #[Api]
    public string $id;

    /**
     * The time the login took place.
     */
    #[Api]
    public \DateTimeInterface $loginAt;

    /**
     * Whether the login was successful or not.
     */
    #[Api]
    public bool $loginSucceeded;

    /**
     * The approximate country code of the login.
     */
    #[Api(optional: true)]
    public ?string $countryCode;

    /**
     * Email address of the user associated with the login.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * IP address where the activity originated.
     */
    #[Api(optional: true)]
    public ?string $ipAddress;

    #[Api(optional: true)]
    public ?string $location;

    /**
     * The approximate region code of the login.
     */
    #[Api(optional: true)]
    public ?string $regionCode;

    /**
     * Information about the device used for logging in.
     */
    #[Api(optional: true)]
    public ?string $userAgent;

    /**
     * The user's unique ID.
     */
    #[Api(optional: true)]
    public ?int $userId;

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
        ?int $userId = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->loginAt = $loginAt;
        $obj->loginSucceeded = $loginSucceeded;

        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $email && $obj->email = $email;
        null !== $ipAddress && $obj->ipAddress = $ipAddress;
        null !== $location && $obj->location = $location;
        null !== $regionCode && $obj->regionCode = $regionCode;
        null !== $userAgent && $obj->userAgent = $userAgent;
        null !== $userId && $obj->userId = $userId;

        return $obj;
    }

    /**
     * The login activity's unique ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The time the login took place.
     */
    public function withLoginAt(\DateTimeInterface $loginAt): self
    {
        $obj = clone $this;
        $obj->loginAt = $loginAt;

        return $obj;
    }

    /**
     * Whether the login was successful or not.
     */
    public function withLoginSucceeded(bool $loginSucceeded): self
    {
        $obj = clone $this;
        $obj->loginSucceeded = $loginSucceeded;

        return $obj;
    }

    /**
     * The approximate country code of the login.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * Email address of the user associated with the login.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * IP address where the activity originated.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj->ipAddress = $ipAddress;

        return $obj;
    }

    public function withLocation(string $location): self
    {
        $obj = clone $this;
        $obj->location = $location;

        return $obj;
    }

    /**
     * The approximate region code of the login.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->regionCode = $regionCode;

        return $obj;
    }

    /**
     * Information about the device used for logging in.
     */
    public function withUserAgent(string $userAgent): self
    {
        $obj = clone $this;
        $obj->userAgent = $userAgent;

        return $obj;
    }

    /**
     * The user's unique ID.
     */
    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj->userId = $userID;

        return $obj;
    }
}
