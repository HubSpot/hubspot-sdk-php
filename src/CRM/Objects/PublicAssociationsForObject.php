<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-type public_associations_for_object = array{
 *   to: PublicObjectID, types: list<AssociationSpec>
 * }
 */
final class PublicAssociationsForObject implements BaseModel
{
    /** @use SdkModel<public_associations_for_object> */
    use SdkModel;

    #[Api]
    public PublicObjectID $to;

    /** @var list<AssociationSpec> $types */
    #[Api(list: AssociationSpec::class)]
    public array $types;

    /**
     * `new PublicAssociationsForObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationsForObject::with(to: ..., types: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationsForObject)->withTo(...)->withTypes(...)
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
     * @param list<AssociationSpec> $types
     */
    public static function with(PublicObjectID $to, array $types): self
    {
        $obj = new self;

        $obj->to = $to;
        $obj->types = $types;

        return $obj;
    }

    public function withTo(PublicObjectID $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * @param list<AssociationSpec> $types
     */
    public function withTypes(array $types): self
    {
        $obj = clone $this;
        $obj->types = $types;

        return $obj;
    }
}
