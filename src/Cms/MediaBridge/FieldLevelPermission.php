<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

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
        $self = new self;

        $self['accessLevel'] = $accessLevel;

        return $self;
    }

    public function withAccessLevel(string $accessLevel): self
    {
        $self = clone $this;
        $self['accessLevel'] = $accessLevel;

        return $self;
    }
}
