<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-type PublicDefaultAssociationMultiPostShape = array{
 *   from: PublicObjectID, to: PublicObjectID
 * }
 */
final class PublicDefaultAssociationMultiPost implements BaseModel
{
    /** @use SdkModel<PublicDefaultAssociationMultiPostShape> */
    use SdkModel;

    #[Api]
    public PublicObjectID $from;

    #[Api]
    public PublicObjectID $to;

    /**
     * `new PublicDefaultAssociationMultiPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicDefaultAssociationMultiPost::with(from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicDefaultAssociationMultiPost)->withFrom(...)->withTo(...)
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
    public static function with(PublicObjectID $from, PublicObjectID $to): self
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

    public function withTo(PublicObjectID $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }
}
