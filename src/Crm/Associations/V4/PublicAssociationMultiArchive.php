<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-type PublicAssociationMultiArchiveShape = array{
 *   from: PublicObjectID, to: list<PublicObjectID>
 * }
 */
final class PublicAssociationMultiArchive implements BaseModel
{
    /** @use SdkModel<PublicAssociationMultiArchiveShape> */
    use SdkModel;

    #[Api]
    public PublicObjectID $from;

    /** @var list<PublicObjectID> $to */
    #[Api(list: PublicObjectID::class)]
    public array $to;

    /**
     * `new PublicAssociationMultiArchive()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationMultiArchive::with(from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationMultiArchive)->withFrom(...)->withTo(...)
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
     *
     * @param list<PublicObjectID> $to
     */
    public static function with(PublicObjectID $from, array $to): self
    {
        $obj = new self;

        $obj->from = $from;
        $obj->to = $to;

        return $obj;
    }

    public function withFrom(PublicObjectID $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * @param list<PublicObjectID> $to
     */
    public function withTo(array $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }
}
