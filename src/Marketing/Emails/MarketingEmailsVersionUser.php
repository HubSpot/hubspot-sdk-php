<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_emails_version_user = array{
 *   id: string, email: string, fullName: string
 * }
 */
final class MarketingEmailsVersionUser implements BaseModel
{
    /** @use SdkModel<marketing_emails_version_user> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public string $email;

    #[Api]
    public string $fullName;

    /**
     * `new MarketingEmailsVersionUser()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEmailsVersionUser::with(id: ..., email: ..., fullName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEmailsVersionUser)->withID(...)->withEmail(...)->withFullName(...)
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
        string $email,
        string $fullName
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->email = $email;
        $obj->fullName = $fullName;

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

    public function withFullName(string $fullName): self
    {
        $obj = clone $this;
        $obj->fullName = $fullName;

        return $obj;
    }
}
