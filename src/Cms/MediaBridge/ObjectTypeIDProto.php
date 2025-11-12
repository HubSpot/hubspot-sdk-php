<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObjectTypeIDProtoShape = array{innerId: int, metaTypeId: int}
 */
final class ObjectTypeIDProto implements BaseModel
{
    /** @use SdkModel<ObjectTypeIDProtoShape> */
    use SdkModel;

    #[Api]
    public int $innerId;

    #[Api]
    public int $metaTypeId;

    /**
     * `new ObjectTypeIDProto()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectTypeIDProto::with(innerId: ..., metaTypeId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectTypeIDProto)->withInnerID(...)->withMetaTypeID(...)
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
    public static function with(int $innerId, int $metaTypeId): self
    {
        $obj = new self;

        $obj->innerId = $innerId;
        $obj->metaTypeId = $metaTypeId;

        return $obj;
    }

    public function withInnerID(int $innerID): self
    {
        $obj = clone $this;
        $obj->innerId = $innerID;

        return $obj;
    }

    public function withMetaTypeID(int $metaTypeID): self
    {
        $obj = clone $this;
        $obj->metaTypeId = $metaTypeID;

        return $obj;
    }
}
