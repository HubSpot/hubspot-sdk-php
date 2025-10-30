<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Move an Object identified by `{objectId}` to the recycling bin.
 *
 * @see HubspotSDK\CRM\Objects\Objects->delete
 *
 * @phpstan-type ObjectDeleteParamsShape = array{objectType: string}
 */
final class ObjectDeleteParams implements BaseModel
{
    /** @use SdkModel<ObjectDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    /**
     * `new ObjectDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectDeleteParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectDeleteParams)->withObjectType(...)
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
        $obj = new self;

        $obj->objectType = $objectType;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }
}
