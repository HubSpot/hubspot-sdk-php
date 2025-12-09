<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\AssociationSpec;
use HubspotSDK\AssociationSpec\AssociationCategory;
use HubspotSDK\Core\Attributes\Required;
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
    #[Required]
    public AssociationSpec $associationSpec;

    #[Required]
    public PublicObjectID $from;

    #[Required]
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
     *
     * @param AssociationSpec|array{
     *   associationCategory: value-of<AssociationCategory>, associationTypeID: int
     * } $associationSpec
     * @param PublicObjectID|array{id: string} $from
     * @param PublicObjectID|array{id: string} $to
     */
    public static function with(
        AssociationSpec|array $associationSpec,
        PublicObjectID|array $from,
        PublicObjectID|array $to,
    ): self {
        $self = new self;

        $self['associationSpec'] = $associationSpec;
        $self['from'] = $from;
        $self['to'] = $to;

        return $self;
    }

    /**
     * Defines the type, direction, and details of the relationship between two CRM objects.
     *
     * @param AssociationSpec|array{
     *   associationCategory: value-of<AssociationCategory>, associationTypeID: int
     * } $associationSpec
     */
    public function withAssociationSpec(
        AssociationSpec|array $associationSpec
    ): self {
        $self = clone $this;
        $self['associationSpec'] = $associationSpec;

        return $self;
    }

    /**
     * @param PublicObjectID|array{id: string} $from
     */
    public function withFrom(PublicObjectID|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * @param PublicObjectID|array{id: string} $to
     */
    public function withTo(PublicObjectID|array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
