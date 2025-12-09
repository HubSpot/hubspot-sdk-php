<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type FieldLevelPermissionShape = array{accessLevel: string}
 */
final class FieldLevelPermission implements BaseModel
{
    /** @use SdkModel<FieldLevelPermissionShape> */
    use SdkModel;

    #[Required]
    public string $accessLevel;

    /**
     * `new FieldLevelPermission()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FieldLevelPermission::with(accessLevel: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FieldLevelPermission)->withAccessLevel(...)
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
    public static function with(string $accessLevel): self
    {
        $obj = new self;

        $obj['accessLevel'] = $accessLevel;

        return $obj;
    }

    public function withAccessLevel(string $accessLevel): self
    {
        $obj = clone $this;
        $obj['accessLevel'] = $accessLevel;

        return $obj;
    }
}
