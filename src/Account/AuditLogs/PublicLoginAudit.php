<?php

declare(strict_types=1);

namespace HubspotSDK\Account\AuditLogs;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_login_audit = array{
 *   id: string,
 *   loginAt: \DateTimeInterface,
 *   loginSucceeded: bool,
 *   countryCode?: string,
 *   email?: string,
 *   ipAddress?: string,
 *   location?: string,
 *   regionCode?: string,
 *   userAgent?: string,
 *   userID?: int,
 * }
 */
final class PublicLoginAudit implements BaseModel
{
    /** @use SdkModel<public_login_audit> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $loginAt;

    #[Api]
    public bool $loginSucceeded;

    #[Api(optional: true)]
    public ?string $countryCode;

    #[Api(optional: true)]
    public ?string $email;

    #[Api(optional: true)]
    public ?string $ipAddress;

    #[Api(optional: true)]
    public ?string $location;

    #[Api(optional: true)]
    public ?string $regionCode;

    #[Api(optional: true)]
    public ?string $userAgent;

    #[Api('userId', optional: true)]
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
        null !== $userID && $obj->userID = $userID;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withLoginAt(\DateTimeInterface $loginAt): self
    {
        $obj = clone $this;
        $obj->loginAt = $loginAt;

        return $obj;
    }

    public function withLoginSucceeded(bool $loginSucceeded): self
    {
        $obj = clone $this;
        $obj->loginSucceeded = $loginSucceeded;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

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

    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->regionCode = $regionCode;

        return $obj;
    }

    public function withUserAgent(string $userAgent): self
    {
        $obj = clone $this;
        $obj->userAgent = $userAgent;

        return $obj;
    }

    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }
}
