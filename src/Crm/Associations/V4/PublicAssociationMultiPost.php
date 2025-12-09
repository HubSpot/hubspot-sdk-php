<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\AssociationSpec;
use HubspotSDK\AssociationSpec\AssociationCategory;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-type PublicAssociationMultiPostShape = array{
 *   from: PublicObjectID, to: PublicObjectID, types: list<AssociationSpec>
 * }
 */
final class PublicAssociationMultiPost implements BaseModel
{
    /** @use SdkModel<PublicAssociationMultiPostShape> */
    use SdkModel;

    #[Required]
    public PublicObjectID $from;

    #[Required]
    public PublicObjectID $to;

    /** @var list<AssociationSpec> $types */
    #[Required(list: AssociationSpec::class)]
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
     * @param PublicObjectID|array{id: string} $from
     * @param PublicObjectID|array{id: string} $to
     * @param list<AssociationSpec|array{
     *   associationCategory: value-of<AssociationCategory>, associationTypeId: int
     * }> $types
     */
    public static function with(
        PublicObjectID|array $from,
        PublicObjectID|array $to,
        array $types
    ): self {
        $obj = new self;

        $obj['from'] = $from;
        $obj['to'] = $to;
        $obj['types'] = $types;

        return $obj;
    }

    /**
     * @param PublicObjectID|array{id: string} $from
     */
    public function withFrom(PublicObjectID|array $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * @param PublicObjectID|array{id: string} $to
     */
    public function withTo(PublicObjectID|array $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * @param list<AssociationSpec|array{
     *   associationCategory: value-of<AssociationCategory>, associationTypeId: int
     * }> $types
     */
    public function withTypes(array $types): self
    {
        $obj = clone $this;
        $obj['types'] = $types;

        return $obj;
    }
}
