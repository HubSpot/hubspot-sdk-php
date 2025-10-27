<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type object_type_id_proto = array{innerID: int, metaTypeID: int}
 */
final class ObjectTypeIDProto implements BaseModel
{
    /** @use SdkModel<object_type_id_proto> */
    use SdkModel;

    #[Api('innerId')]
    public int $innerID;

    #[Api('metaTypeId')]
    public int $metaTypeID;

    /**
     * `new ObjectTypeIDProto()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectTypeIDProto::with(innerID: ..., metaTypeID: ...)
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
    public static function with(int $innerID, int $metaTypeID): self
    {
        $obj = new self;

        $obj->innerID = $innerID;
        $obj->metaTypeID = $metaTypeID;

        return $obj;
    }

    public function withInnerID(int $innerID): self
    {
        $obj = clone $this;
        $obj->innerID = $innerID;

        return $obj;
    }

    public function withMetaTypeID(int $metaTypeID): self
    {
        $obj = clone $this;
        $obj->metaTypeID = $metaTypeID;

        return $obj;
    }
}
