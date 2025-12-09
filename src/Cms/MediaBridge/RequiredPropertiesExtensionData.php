<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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
        $obj = new self;

        $obj['isRequiredProperty'] = $isRequiredProperty;

        return $obj;
    }

    public function withIsRequiredProperty(bool $isRequiredProperty): self
    {
        $obj = clone $this;
        $obj['isRequiredProperty'] = $isRequiredProperty;

        return $obj;
    }
}
