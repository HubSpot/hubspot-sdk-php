<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Required;
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
    #[Required]
    public string $id;

    /**
     * The role's name.
     */
    #[Required]
    public string $name;

    /**
     * Whether this role has a paid seat and requires the billing-write scope to assign/unassign to users.
     */
    #[Required]
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
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;
        $self['requiresBillingWrite'] = $requiresBillingWrite;

        return $self;
    }

    /**
     * The role's unique ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The role's name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Whether this role has a paid seat and requires the billing-write scope to assign/unassign to users.
     */
    public function withRequiresBillingWrite(bool $requiresBillingWrite): self
    {
        $self = clone $this;
        $self['requiresBillingWrite'] = $requiresBillingWrite;

        return $self;
    }
}
