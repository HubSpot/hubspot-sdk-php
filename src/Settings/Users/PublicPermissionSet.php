<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A role that can be assigned to a user.
 *
 * @phpstan-type PublicPermissionSetShape = array{
 *   id: string, name: string, requiresBillingWrite: bool
 * }
 */
final class PublicPermissionSet implements BaseModel
{
    /** @use SdkModel<PublicPermissionSetShape> */
    use SdkModel;

    /**
     * The role's unique ID.
     */
    #[Api]
    public string $id;

    /**
     * The role's name.
     */
    #[Api]
    public string $name;

    /**
     * Whether this role has a paid seat and requires the billing-write scope to assign/unassign to users.
     */
    #[Api]
    public bool $requiresBillingWrite;

    /**
     * `new PublicPermissionSet()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicPermissionSet::with(id: ..., name: ..., requiresBillingWrite: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicPermissionSet)
     *   ->withID(...)
     *   ->withName(...)
     *   ->withRequiresBillingWrite(...)
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
        string $name,
        bool $requiresBillingWrite
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['name'] = $name;
        $obj['requiresBillingWrite'] = $requiresBillingWrite;

        return $obj;
    }

    /**
     * The role's unique ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The role's name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Whether this role has a paid seat and requires the billing-write scope to assign/unassign to users.
     */
    public function withRequiresBillingWrite(bool $requiresBillingWrite): self
    {
        $obj = clone $this;
        $obj['requiresBillingWrite'] = $requiresBillingWrite;

        return $obj;
    }
}
