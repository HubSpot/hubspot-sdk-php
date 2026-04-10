<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type RequiredPropertiesExtensionDataShape = array{
 *   isRequiredProperty: bool
 * }
 */
final class RequiredPropertiesExtensionData implements BaseModel
{
    /** @use SdkModel<RequiredPropertiesExtensionDataShape> */
    use SdkModel;

    #[Required]
    public bool $isRequiredProperty;

    /**
     * `new RequiredPropertiesExtensionData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RequiredPropertiesExtensionData::with(isRequiredProperty: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RequiredPropertiesExtensionData)->withIsRequiredProperty(...)
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
    public static function with(bool $isRequiredProperty): self
    {
        $self = new self;

        $self['isRequiredProperty'] = $isRequiredProperty;

        return $self;
    }

    public function withIsRequiredProperty(bool $isRequiredProperty): self
    {
        $self = clone $this;
        $self['isRequiredProperty'] = $isRequiredProperty;

        return $self;
    }
}
