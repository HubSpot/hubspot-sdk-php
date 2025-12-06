<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SoftRequiredPropertiesExtensionDataShape = array{
 *   isSoftRequiredProperty: bool
 * }
 */
final class SoftRequiredPropertiesExtensionData implements BaseModel
{
    /** @use SdkModel<SoftRequiredPropertiesExtensionDataShape> */
    use SdkModel;

    #[Api]
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
        $obj = new self;

        $obj['isSoftRequiredProperty'] = $isSoftRequiredProperty;

        return $obj;
    }

    public function withIsSoftRequiredProperty(
        bool $isSoftRequiredProperty
    ): self {
        $obj = clone $this;
        $obj['isSoftRequiredProperty'] = $isSoftRequiredProperty;

        return $obj;
    }
}
