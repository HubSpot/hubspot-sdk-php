<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-type PublicDefaultAssociationShape = array{
 *   associationSpec: AssociationSpec, from: PublicObjectID, to: PublicObjectID
 * }
 */
final class PublicDefaultAssociation implements BaseModel
{
    /** @use SdkModel<PublicDefaultAssociationShape> */
    use SdkModel;

    /**
     * Defines the type, direction, and details of the relationship between two CRM objects.
     */
    #[Api]
    public AssociationSpec $associationSpec;

    #[Api]
    public PublicObjectID $from;

    #[Api]
    public PublicObjectID $to;

    /**
     * `new PublicDefaultAssociation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicDefaultAssociation::with(associationSpec: ..., from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicDefaultAssociation)
     *   ->withAssociationSpec(...)
     *   ->withFrom(...)
     *   ->withTo(...)
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
        AssociationSpec $associationSpec,
        PublicObjectID $from,
        PublicObjectID $to
    ): self {
        $obj = new self;

        $obj->associationSpec = $associationSpec;
        $obj->from = $from;
        $obj->to = $to;

        return $obj;
    }

    /**
     * Defines the type, direction, and details of the relationship between two CRM objects.
     */
    public function withAssociationSpec(AssociationSpec $associationSpec): self
    {
        $obj = clone $this;
        $obj->associationSpec = $associationSpec;

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
