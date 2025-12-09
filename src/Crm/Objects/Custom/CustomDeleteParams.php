<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Custom;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Move an Object identified by `{objectId}` to the recycling bin.
 *
 * @see HubspotSDK\Services\Crm\Objects\CustomService::delete()
 *
 * @phpstan-type CustomDeleteParamsShape = array{objectType: string}
 */
final class CustomDeleteParams implements BaseModel
{
    /** @use SdkModel<CustomDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    /**
     * `new CustomDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomDeleteParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomDeleteParams)->withObjectType(...)
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
    public static function with(string $objectType): self
    {
        $self = new self;

        $self['objectType'] = $objectType;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }
}
