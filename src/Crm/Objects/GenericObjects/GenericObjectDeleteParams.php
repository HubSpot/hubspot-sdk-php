<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects\GenericObjects;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Move an Object identified by `{objectId}` to the recycling bin.
 *
 * @see HubSpotSDK\Services\Crm\Objects\GenericObjectsService::delete()
 *
 * @phpstan-type GenericObjectDeleteParamsShape = array{objectType: string}
 */
final class GenericObjectDeleteParams implements BaseModel
{
    /** @use SdkModel<GenericObjectDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    /**
     * `new GenericObjectDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GenericObjectDeleteParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GenericObjectDeleteParams)->withObjectType(...)
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
