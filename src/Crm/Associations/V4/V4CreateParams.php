<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create the default (most generic) association type between two object types.
 *
 * @see HubspotSDK\Crm\Associations\V4->create
 *
 * @phpstan-type V4CreateParamsShape = array{
 *   fromObjectType: string, fromObjectID: string, toObjectType: string
 * }
 */
final class V4CreateParams implements BaseModel
{
    /** @use SdkModel<V4CreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    #[Api]
    public string $fromObjectID;

    #[Api]
    public string $toObjectType;

    /**
     * `new V4CreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * V4CreateParams::with(fromObjectType: ..., fromObjectID: ..., toObjectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new V4CreateParams)
     *   ->withFromObjectType(...)
     *   ->withFromObjectID(...)
     *   ->withToObjectType(...)
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
        string $fromObjectType,
        string $fromObjectID,
        string $toObjectType
    ): self {
        $obj = new self;

        $obj->fromObjectType = $fromObjectType;
        $obj->fromObjectID = $fromObjectID;
        $obj->toObjectType = $toObjectType;

        return $obj;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $obj = clone $this;
        $obj->fromObjectType = $fromObjectType;

        return $obj;
    }

    public function withFromObjectID(string $fromObjectID): self
    {
        $obj = clone $this;
        $obj->fromObjectID = $fromObjectID;

        return $obj;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $obj = clone $this;
        $obj->toObjectType = $toObjectType;

        return $obj;
    }
}
