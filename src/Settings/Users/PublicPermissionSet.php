<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_permission_set = array{
 *   id: string, name: string, requiresBillingWrite: bool
 * }
 */
final class PublicPermissionSet implements BaseModel
{
    /** @use SdkModel<public_permission_set> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public string $name;

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

        $obj->id = $id;
        $obj->name = $name;
        $obj->requiresBillingWrite = $requiresBillingWrite;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withRequiresBillingWrite(bool $requiresBillingWrite): self
    {
        $obj = clone $this;
        $obj->requiresBillingWrite = $requiresBillingWrite;

        return $obj;
    }
}
