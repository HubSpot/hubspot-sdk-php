<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Model definition for a version user. Contains addition information about the user who created a version.
 *
 * @phpstan-type version_user = array{id: string, email: string, fullName: string}
 */
final class VersionUser implements BaseModel
{
    /** @use SdkModel<version_user> */
    use SdkModel;

    /**
     * The unique ID of the User.
     */
    #[Api]
    public string $id;

    /**
     * The email address of the user.
     */
    #[Api]
    public string $email;

    /**
     * The first and last name of the User.
     */
    #[Api]
    public string $fullName;

    /**
     * `new VersionUser()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionUser::with(id: ..., email: ..., fullName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VersionUser)->withID(...)->withEmail(...)->withFullName(...)
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

    /**
     * The unique ID of the User.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The email address of the user.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * The first and last name of the User.
     */
    public function withFullName(string $fullName): self
    {
        $obj = clone $this;
        $obj->fullName = $fullName;

        return $obj;
    }
}
