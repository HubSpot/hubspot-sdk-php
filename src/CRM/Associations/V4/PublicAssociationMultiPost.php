<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-type public_association_multi_post = array{
 *   from: PublicObjectID, to: PublicObjectID, types: list<AssociationSpec1>
 * }
 */
final class PublicAssociationMultiPost implements BaseModel
{
    /** @use SdkModel<public_association_multi_post> */
    use SdkModel;

    #[Api]
    public PublicObjectID $from;

    #[Api]
    public PublicObjectID $to;

    /** @var list<AssociationSpec1> $types */
    #[Api(list: AssociationSpec1::class)]
    public array $types;

    /**
     * `new PublicAssociationMultiPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationMultiPost::with(from: ..., to: ..., types: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationMultiPost)->withFrom(...)->withTo(...)->withTypes(...)
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
     * @param list<AssociationSpec1> $types
     */
    public static function with(
        PublicObjectID $from,
        PublicObjectID $to,
        array $types
    ): self {
        $obj = new self;

        $obj->from = $from;
        $obj->to = $to;
        $obj->types = $types;

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

    /**
     * @param list<AssociationSpec1> $types
     */
    public function withTypes(array $types): self
    {
        $obj = clone $this;
        $obj->types = $types;

        return $obj;
    }
}
