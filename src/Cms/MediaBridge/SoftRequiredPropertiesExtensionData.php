<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SoftRequiredPropertiesExtensionDataShape = array{
 *   isSoftRequiredProperty: bool
 * }
 */
final class SoftRequiredPropertiesExtensionData implements BaseModel
{
    /** @use SdkModel<SoftRequiredPropertiesExtensionDataShape> */
    use SdkModel;

    #[Required]
    public bool $isSoftRequiredProperty;

    /**
     * `new SoftRequiredPropertiesExtensionData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SoftRequiredPropertiesExtensionData::with(isSoftRequiredProperty: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SoftRequiredPropertiesExtensionData)->withIsSoftRequiredProperty(...)
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
    public static function with(bool $isSoftRequiredProperty): self
    {
        $self = new self;

        $self['isSoftRequiredProperty'] = $isSoftRequiredProperty;

        return $self;
    }

    public function withIsSoftRequiredProperty(
        bool $isSoftRequiredProperty
    ): self {
        $self = clone $this;
        $self['isSoftRequiredProperty'] = $isSoftRequiredProperty;

        return $self;
    }
}
