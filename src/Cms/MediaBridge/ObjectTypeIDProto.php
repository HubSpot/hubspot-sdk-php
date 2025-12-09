<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObjectTypeIDProtoShape = array{innerID: int, metaTypeID: int}
 */
final class ObjectTypeIDProto implements BaseModel
{
    /** @use SdkModel<ObjectTypeIDProtoShape> */
    use SdkModel;

    #[Required('innerId')]
    public int $innerID;

    #[Required('metaTypeId')]
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
        $self = new self;

        $self['innerID'] = $innerID;
        $self['metaTypeID'] = $metaTypeID;

        return $self;
    }

    public function withInnerID(int $innerID): self
    {
        $self = clone $this;
        $self['innerID'] = $innerID;

        return $self;
    }

    public function withMetaTypeID(int $metaTypeID): self
    {
        $self = clone $this;
        $self['metaTypeID'] = $metaTypeID;

        return $self;
    }
}
